<?php

namespace App\Http\Controllers;

use App\Services\support\LingkupKerjasamaService;
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
                'lingkup'=>$request->lingkup,
                'created_at'=>now(),
                'updated_at'=>now(),
            ];
            $store = LingkupKerjasamaService::store($data);
            DB::commit();
            return redirect()->route('lingkup.index');
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
                    'lingkup'=>$request->lingkup,
                    'updated_at'=>now(),
                ];
                $update = LingkupKerjasamaService::update($data, $request->id);
                DB::commit();
                return redirect()->route('lingkup.index');
            }catch(\Throwable $th){
                dd($th);
            }
        }elseif (isset($_POST["delete"])){
            try{
                $data = [
                    'lingkup'=>$request->lingkup,
                ];
                $delete = LingkupKerjasamaService::delete($data, $request->id);
                DB::commit();
                return redirect()->route('lingkup.index');
            }catch(\Throwable $th){
                dd($th);
            }
        }
    }
}
