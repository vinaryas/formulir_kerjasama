<?php

namespace App\Http\Controllers;

use App\Services\support\FormHeadService;
use App\Services\support\JenisKerjasamaService;
use App\Services\support\JenisPengajuanService;
use App\Services\support\KategoriMitraService;
use App\Services\support\RencanaFormalisasiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    public function index(){
        $form = FormHeadService::all()->get();

        return view('', compact('form'));
    }

    public function create(){
        $user = Auth::user();
        $jenisKerjasama = JenisKerjasamaService::all()->get();
        $jenisPengajuan = JenisPengajuanService::all()->get();
        $kategoriMitra = KategoriMitraService::all()->get();
        $rencanaFormalisasi = RencanaFormalisasiService::all()->get();

        return view('', compact('user', 'jenisKerjasama', 'jenisPengajuan', 'kategoriMitra', 'rencanaFormalisasi'));
    }

    public function store(Request $request){
        DB::beginTransaction();

        try{
            $form = [
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
                'rencana_kegiatan'=> $request->rencanaKerjasama,
                'rencana_formalisasi'=> $request->rencanaFormalisasi,
                'tgl'=> $request->tgl,
                'tempat'=> $request->tempat,
                'uuid'=> $request->uuid,
                'file'=> $request->file,
                'path'=> $request->path,
            ];

            $storeForm = FormHeadService::store($form);

        }catch (\Throwable $th){
            dd($th);
            return redirect()->route('');
        }
    }
}
