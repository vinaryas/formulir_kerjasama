<?php

namespace App\Http\Controllers;

use App\Helper\StoreFile;
use App\Services\Support\ApprovalService;
use App\Services\Support\FormService;
use App\Services\Support\JenisKerjasamaService;
use App\Services\Support\JenisPengajuanService;
use App\Services\Support\KategoriMitraService;
use App\Services\Support\RencanaFormalisasiService;
use App\Services\Support\RoleUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $jenisPengajuan = JenisPengajuanService::all()->get();
        $kategoriMitra = KategoriMitraService::all()->get();
        $rencanaFormalisasi = RencanaFormalisasiService::all()->get();

        return view('Form.create', compact('user', 'jenisKerjasama', 'jenisPengajuan', 'kategoriMitra', 'rencanaFormalisasi'));
    }

    public function store(Request $request){
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
}
