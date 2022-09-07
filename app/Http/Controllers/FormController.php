<?php

namespace App\Http\Controllers;

use App\Services\support\ApprovalService;
use App\Services\support\FormService;
use App\Services\support\JenisKerjasamaService;
use App\Services\support\JenisPengajuanService;
use App\Services\support\KategoriMitraService;
use App\Services\support\RencanaFormalisasiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Webpatser\Uuid\Uuid;

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
        $nextApp = ApprovalService::getNextApp(Auth::user()->roles->first()->id);

        try{
            $data = [
                'jenis_kerjasama'=> $request->jenisKerjasama,
                'jenis_pengajuan'=> $request->jenisPengajuan,
                'nama_mitra_kerjasama'=> $request->namaMitraKerjasama,
                'alamat_mitra_kerjasama'=> $request->alamatMitraKerjasama,
                'kategori_mitra'=> $request->kategoriMitra,
                'pic_mitra'=> $request->picMitra,
                'nama'=> $request->nama,
                'nama_unit'=> $request->namaUnit,
                'jabatan'=> $request->jabatan,
                'no_telp'=> $request->noTelp,
                'email'=> $request->email,
                'lingkup_kerjasama'=> $request->lingkupKerjasama,
                'rencana_kegiatan'=> $request->rencanaKegiatan,
                'rencana_formalisasi'=> $request->rencanaFormalisasi,
                'tgl'=> $request->tgl,
                'tempat'=> $request->tempat,
                'file'=> $request->file,
                'path'=> 'xampp/htdocs/formulir_pengajuan/storage/app/file/',
            ];

            $data['uuid'] = (string)Uuid::generate();
            if ($request->hasFile('file')) {
                $data['file'] = $request->file->getClientOriginalName();
                $request->file->storeAs('file', $data['file']);
            }

            $storeData = FormService::store($data);

            $dataApp = [
                'formulir_id' => $storeData->id,
                'created_by' => Auth::user()->id,
                'role_last_app' => Auth::user()->roles->id,
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
