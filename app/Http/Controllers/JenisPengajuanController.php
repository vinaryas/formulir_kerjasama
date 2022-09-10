<?php

namespace App\Http\Controllers;

use App\Services\support\JenisPengajuanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisPengajuanController extends Controller
{
    public function index(){
        $jenisPengajuan = JenisPengajuanService::all()->get();

        return view('jenisPengajuan.index', compact('jenisPengajuan'));
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
            return redirect()->route('jenisPengajuan.index');
        }catch(\Throwable $th){
            dd($th);
        }

    }
}
