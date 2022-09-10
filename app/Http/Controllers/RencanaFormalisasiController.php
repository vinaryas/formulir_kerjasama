<?php

namespace App\Http\Controllers;

use App\Services\support\RencanaFormalisasiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RencanaFormalisasiController extends Controller
{
    public function index(){
        $rencanaFormalisasi = RencanaFormalisasiService::all()->get();

        return view('rencanaFormalisasi.index', compact('rencanaFormalisasi'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        try{
            $data = [
                'rencana'=>$request->rencana,
                'created_at'=>now(),
                'updated_at'=>now(),
            ];
            $store = RencanaFormalisasiService::store($data);
            DB::commit();
            return redirect()->route('jenisKerjasama.index');
        }catch(\Throwable $th){
            dd($th);
        }

    }
}
