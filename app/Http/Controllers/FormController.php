<?php

namespace App\Http\Controllers;

use App\Helper\StoreFile;
use App\Services\support\ApprovalService;
use App\Services\support\FormService;
use App\Services\support\JenisKerjasamaService;
use App\Services\support\JenisPengajuanService;
use App\Services\support\KategoriMitraService;
use App\Services\support\RencanaFormalisasiService;
use App\Services\Support\RoleUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use RealRashid\SweetAlert\Facades\Alert;

class FormController extends Controller
{
    public function index(){
        $forms = FormService::all()->get();

        return view('Form.index', compact('forms'));
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
        $roleUsers = RoleUserService::getRoleFromUserId(Auth::user()->id)->first();
        $nextApp = ApprovalService::getNextApp($roleUsers->role_id, Auth::user()->region_id);

        try{
			$allowedfileExtension = ['pdf', 'doc', 'docx'];
			$file = StoreFile::storeFile($request->file_kerjasama, config('kerjasama.file_path'), $allowedfileExtension);

			$request->request->add([
				'file' => $file['name']
			]);

            $storeData = FormService::store($request->except('_token', 'file_kerjasama'));

            $dataApp = [
                'form_id' => $storeData->id,
                'created_by' => Auth::user()->id,
                'role_last_app' => $roleUsers->role_id,
                'role_next_app' => $nextApp,
                'status'=>0
            ];

            $updateStatus = ApprovalService::store($dataApp);

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
