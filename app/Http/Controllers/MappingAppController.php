<?php

namespace App\Http\Controllers;

use App\Services\Support\MappingAppService;
use App\Services\Support\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MappingAppController extends Controller
{
    public function index(){
        $role = RoleService::all()->get();
        $mappingApps = MappingAppService::all()->get();

        return view('mappingApp.index', compact('mappingApps', 'role'));
    }

    public function store(Request $request){
        DB::beginTransaction();
        try{
            $data = [
                'role_id'=>$request->role_id,
                'position'=>$request->position,
                'created_at'=>now(),
                'updated_at'=>now(),
            ];
            $store = MappingAppService::store($data);
            DB::commit();
            return redirect()->route('mapping.index');
        }catch(\Throwable $th){
            dd($th);
        }
    }

    public function detail($id){
        $mappingApps = MappingAppService::getById($id)->first();
        $role = RoleService::all()->get();

        return view('mappingApp.detail', compact('mappingApps', 'role'));
    }

    public function update(Request $request){
        DB::beginTransaction();
        if (isset($_POST["update"])){
            try{
                $data = [
                    'role_id'=>$request->role_id,
                    'position'=>$request->position,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ];
                $update = MappingAppService::update($data, $request->id);
                DB::commit();
                return redirect()->route('mapping.index');
            }catch(\Throwable $th){
                dd($th);
            }
        }elseif (isset($_POST["delete"])){
            try{
                $data = [
                    'role_id'=>$request->role_id,
                    'position'=>$request->position,
                ];
                $delete = MappingAppService::delete($data, $request->id);
                DB::commit();
                return redirect()->route('mapping.index');
            }catch(\Throwable $th){
                dd($th);
            }
        }
    }
}
