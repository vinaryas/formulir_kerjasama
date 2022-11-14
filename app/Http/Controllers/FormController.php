<?php

namespace App\Http\Controllers;

use App\Helper\StoreFile;
use App\Http\Requests\SubmissionStoreRequest;
use App\Http\Requests\UploadFinalRequest;
use App\Services\Support\ApprovalService;
use App\Services\Support\FormService;
use App\Services\Support\JenisKerjasamaService;
use App\Services\Support\JenisPengajuanService;
use App\Services\Support\KategoriMitraService;
use App\Services\Support\LingkupKerjasamaService;
use App\Services\Support\RencanaFormalisasiService;
use App\Services\Support\RoleUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
use RealRashid\SweetAlert\Facades\Alert;

class FormController extends Controller
{
    public function index(){
        if(Auth::user()->hasRole('user')){
			$submissions = FormService::all()->where('created_by', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
		}else{
			$submissions = FormService::all()->orderBy('created_at', 'desc')->paginate(5);
		}

        return view('Form.index', compact('submissions'));
    }

	public function show($id){
		$submission = FormService::getById($id)->first();
		
		return $submission;
	}

	public function detail($id)
	{
		$submission = FormService::getById($id)->first();

		return view('Form.detail', compact('submission'));
	}

	public function done($id)
	{
		$data = [
			'status' => config('kerjasama.code_detail.status_pengajuan.selesai'),
		];

		$res = FormService::update($data, $id);

		Alert::success('succes', 'Form sudah dikirimkan ke pemohon');
		return redirect()->route('form.index');
	}

    public function create(){
        $user = Auth::user();
        $jenisKerjasama = JenisKerjasamaService::all()->get();
        $lingkupKerjasama = LingkupKerjasamaService::all()->get();
        $jenisPengajuan = JenisPengajuanService::all()->get();
        $kategoriMitra = KategoriMitraService::all()->get();
        $rencanaFormalisasi = RencanaFormalisasiService::all()->get();

        return view('Form.create', compact('user', 'jenisKerjasama', 'jenisPengajuan', 'lingkupKerjasama', 'kategoriMitra', 'rencanaFormalisasi'));
    }

    public function store(SubmissionStoreRequest $request){
        DB::beginTransaction();

        try{
			$allowedfileExtension = ['pdf', 'doc', 'docx'];
			$file = StoreFile::storeFile($request->file_kerjasama, config('kerjasama.file_path'), $allowedfileExtension);
			$filePerjanjian = StoreFile::storeFile($request->file_perjanjian_kerjasama, config('kerjasama.file_path'), $allowedfileExtension);

			$request->request->add([
				'file' => $file['name'],
				'file_perjanjian' => $filePerjanjian['name'],
				'status' => config('kerjasama.code_detail.status_pengajuan.pengecekan_awal'),
				'created_by' => Auth::user()->id
			]);

            $storeData = FormService::store($request->except('_token', 'file_kerjasama', 'file_perjanjian_kerjasama'));

			$details = [
				'title' => 'Pengajuan Kerjasama',
				'body' => 'Haloo.. ada email terkait pengajuan Kerjasama'
			];
		   
			// \Mail::to('susilaandika@gmail.com')->send(new \App\Mail\NotificationMail($details));

            DB::commit();

            Alert::success('succes', 'form berhasil disimpan');
            return redirect()->route('form.index');

        }catch (\Throwable $th){
            dd($th);
            // Alert::alert('warning!!', 'form gagal disimpan');
            return redirect()->route('form.index');
        }
    }

	public function uploadFinal(Request $request, $id)
	{
		try {
			$checkData = Validator::make($request->all(), [
				'file_final' => 'required|file|mimes:doc,docx|max:1024',
			], [
				'file_final.required' => 'Dokumen final wajib diisi',
				'file_final.file' => 'Dokumen yang diupload harus berupa file',
				'file_final.mimes' => 'Dokumen yang diijinkan adalah doc/docx',
				'file_final.max' => 'Dokumen yang diunggah terlalu besar. Maksimal 1MB',
			]);

			if($checkData->fails()){
				return [
					'success' => false,
					'message' => 'Inputan belum sesuai',
					'data' => $checkData->errors()
				];
			}

			$allowedfileExtension = ['doc', 'docx'];
			$fileFinal = StoreFile::storeFile($request->file_final, config('kerjasama.file_path'), $allowedfileExtension);

			$data = [
				'file_final' => $fileFinal['name'],
			];
	
			$res = FormService::update($data, $id);

			return [
				'success' => true
			];
		} catch (\Throwable $th) {
			return [
				'success' => false,
				'message' => $th->getMessage(),
				'trace' => $th->getTrace()
			];
		}
	}
}
