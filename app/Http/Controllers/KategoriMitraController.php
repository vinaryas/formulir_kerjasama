<?php

namespace App\Http\Controllers;

use App\Services\Support\KategoriMitraService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriMitraController extends Controller
{
    public function index(){
        $kategoriMitra = KategoriMitraService::all()->get();

        return view('kategoriMitra.index', compact('kategoriMitra'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        try{
            $data = [
                'kategori'=>$request->kategori,
                'created_at'=>now(),
                'updated_at'=>now(),
            ];
            $store = KategoriMitraService::store($data);
            DB::commit();
            return redirect()->route('kategoriMitra.index');
        }catch(\Throwable $th){
            dd($th);
        }
    }

    public function detail($id){
        $kategoriMitra = KategoriMitraService::getById($id)->first();

        return view('kategoriMitra.detail', compact('kategoriMitra'));
    }

    public function update(Request $request){
        DB::beginTransaction();
        if (isset($_POST["update"])){
            try{
                $data = [
                    'kategori'=>$request->kategori,
                    'updated_at'=>now(),
                ];
                $update = KategoriMitraService::update($data, $request->id);
                DB::commit();
                return redirect()->route('kategoriMitra.index');
            }catch(\Throwable $th){
                dd($th);
            }
        }elseif (isset($_POST["delete"])){
            try{
                $data = [
                    'kategori'=>$request->kategori,
                ];
                $delete = KategoriMitraService::delete($data, $request->id);
                DB::commit();
                return redirect()->route('kategoriMitra.index');
            }catch(\Throwable $th){
                dd($th);
            }
        }
    }
}
