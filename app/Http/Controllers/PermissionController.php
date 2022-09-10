<?php

namespace App\Http\Controllers;

use App\Services\Support\PermissionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    public function index(){
        $permissions = PermissionService::all()->get();

        return view('permission.index', compact('permissions'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        try{
            $data = [
                'parent_id'=>$request->parent_id,
                'name'=>$request->name,
                'display_name'=>$request->display_name,
                'description'=>$request->description,
            ];
            $store = PermissionService::store($data);
            DB::commit();
            return redirect()->route('permission.index');
        }catch(\Throwable $th){
            dd($th);
        }
    }
}
