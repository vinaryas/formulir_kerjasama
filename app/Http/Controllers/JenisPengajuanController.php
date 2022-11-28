<?php

namespace App\Http\Controllers;

use App\Services\Support\JenisPengajuanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisPengajuanController extends Controller
{
    public function index(){
        $jenisPengajuan = JenisPengajuanService::all()->get();

        return view('JenisPengajuan.index', compact('jenisPengajuan'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        try{
            $data = [
                'pengajuan'=>$request->pengajuan,
                'created_at'=>now(),
                'updated_at'=>now(),
            ];
            $store = JenisPengajuanService::store($data);
            DB::commit();
            return redirect()->route('JenisPengajuan.index');
        }catch(\Throwable $th){
            dd($th);
        }
    }

    public function detail($id){
        $jenisPengajuan = JenisPengajuanService::getById($id)->first();

        return view('JenisPengajuan.detail', compact('jenisPengajuan'));
    }

    public function update(Request $request){
        DB::beginTransaction();
        if (isset($_POST["update"])){
            try{
                $data = [
                    'pengajuan'=>$request->pengajuan,
                    'updated_at'=>now(),
                ];
                $update = JenisPengajuanService::update($data, $request->id);
                DB::commit();
                return redirect()->route('JenisPengajuan.index');
            }catch(\Throwable $th){
                dd($th);
            }
        }elseif (isset($_POST["delete"])){
            try{
                $data = [
                    'pengajuan'=>$request->pengajuan,
                ];
                $delete = JenisPengajuanService::delete($data, $request->id);
                DB::commit();
                return redirect()->route('JenisPengajuan.index');
            }catch(\Throwable $th){
                dd($th);
            }
        }
    }
}
