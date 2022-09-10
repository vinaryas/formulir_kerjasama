<?php

namespace App\Http\Controllers;

use App\Services\support\JenisKerjasamaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisKerjasamaController extends Controller
{
    public function index(){
        $jenisKerjasama = JenisKerjasamaService::all()->get();

        return view('jenisKerjasama.index', compact('jenisKerjasama'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        try{
            $data = [
                'kerjasama'=>$request->kerjasama,
                'created_at'=>now(),
                'updated_at'=>now(),
            ];
            $store = JenisKerjasamaService::store($data);
            DB::commit();
            return redirect()->route('jenisKerjasama.index');
        }catch(\Throwable $th){
            dd($th);
        }

    }
}
