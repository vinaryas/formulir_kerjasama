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

    public function detail($id){
        $rencanaFormalisasi = RencanaFormalisasiService::getById($id)->first();

        return view('rencanaFormalisasi.detail', compact('rencanaFormalisasi'));
    }

    public function update(Request $request){
        DB::beginTransaction();
        if (isset($_POST["update"])){
            try{
                $data = [
                    'rencana'=>$request->rencana,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ];
                $update = RencanaFormalisasiService::update($data, $request->id);
                DB::commit();
                return redirect()->route('rencanaFormalisasi.index');
            }catch(\Throwable $th){
                dd($th);
            }
        }elseif (isset($_POST["delete"])){
            try{
                $data = [
                    'rencana'=>$request->rencana,
                ];
                $delete = RencanaFormalisasiService::delete($data, $request->id);
                DB::commit();
                return redirect()->route('rencanaFormalisasi.index');
            }catch(\Throwable $th){
                dd($th);
            }
        }
    }
}
