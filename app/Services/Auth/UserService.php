<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Carbon\Carbon;

class UserService{

    public function data($data)
    {
        return [
                'name' => $data['name'],
                'username' => $data['username'],
                'jabatan_id' => $data['jabatan_id'],
                'password' => Hash::make($data['password'])
        ];
    }

    public function all()
    {
        return User::query()->with('roleUser.role');
    }

    public function saveData($data)
    {
        $user = User::create($this->data($data));

        return $user;
    }

	public function update($data, $id)
    {
        $user = User::where('id', '=', $id)->update($data);
    }

    public function updateData($data, $id)
    {
        return User::where('id', '=', $id)->update([
                            'name' => $data['name'],
                            'username' => $data['username'],
                            'jabatan_id' => $data['jabatan_id'],
                    ]);
    }

	public function updatePassword($password, $id)
	{
		return User::where('id', $id)->update([
			'password' => Hash::make($password),
			'password_reset_at'=> Carbon::now()
		]);
	}

    public function editData($id)
    {
        return redirect()->route('user_store.edit');
    }

    public function deleteData($id)
    {
        $user = User::where('id', '=', $id)->delete();

        return $user;
    }

    public function isAdministrator()
    {
        return Auth::user()->hasRole('administrator');
    }

    public function find($id)
    {
        return $this->all()->where('id', $id);
    }

    public function userAllStoreByRoleId($roleId)
    {
        return $this->all()->whereHas('RoleUser', function($query) use($roleId){
            return $query->where('jabatan_id', $roleId);
        })->where('all_store', 'y');
    }

    public function userStoreByRoleId($roleId, $store)
    {
        return $this->all()->whereHas('RoleUser', function($query) use($roleId){
            return $query->where('jabatan_id', $roleId);
        })->whereHas('stores', function($query) use($store){
            return $query->where('stores.id', $store);
        })->where('all_store', 'n');
    }

    public function authStoreArray()
    {
        $stores = [];
        foreach (Auth::user()->stores as $store) {
            $stores[] = $store->id;
        }

        return $stores;
    }

    public function getById($id)
    {
        return User::all()->where('id', $id);
    }

	public function getByUsername($username)
	{
		return $this->all()->where('username', $username);
	}

}
