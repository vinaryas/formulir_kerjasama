<?php

namespace App\Http\Controllers;

use App\Services\support\KategoriMitraService;
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
}
