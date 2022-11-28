<?php

namespace App\Http\Controllers;

use App\Services\Support\LingkupKerjasamaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LingkupKerjasamaController extends Controller
{
    public function index(){
        $lingkupKerjasama = LingkupKerjasamaService::all()->get();

        return view('LingkupKerjasama.index', compact('lingkupKerjasama'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        try{
            $data = [
                'nama'=>$request->nama,
                'created_at'=>now(),
                'updated_at'=>now(),
            ];
            $store = LingkupKerjasamaService::store($data);
            DB::commit();
            return redirect()->route('lingkupKerjasama.index');
        }catch(\Throwable $th){
            dd($th);
        }
    }

    public function detail($id){
        $lingkupKerjasama = LingkupKerjasamaService::getById($id)->first();

        return view('LingkupKerjasama.detail', compact('lingkupKerjasama'));
    }

    public function update(Request $request){
        DB::beginTransaction();
        if (isset($_POST["update"])){
            try{
                $data = [
                    'nama'=>$request->nama,
                    'updated_at'=>now(),
                ];
                $update = LingkupKerjasamaService::update($data, $request->id);
                DB::commit();
                return redirect()->route('lingkupKerjasama.index');
            }catch(\Throwable $th){
                dd($th);
            }
        }elseif (isset($_POST["delete"])){
            try{
                $data = [
                    'nama'=>$request->nama,
                ];
                $delete = LingkupKerjasamaService::delete($data, $request->id);
                DB::commit();
                return redirect()->route('lingkupKerjasama.index');
            }catch(\Throwable $th){
                dd($th);
            }
        }
    }
}
