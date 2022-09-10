<?php

namespace App\Services;

use App\Models\RoleUser;

class RoleUserService
{
    private $RoleUser;

    public function __construct(RoleUser $RoleUser)
    {
        $this->RoleUser = $RoleUser;
    }

    public function all()
	{
		return $this->RoleUser->query();
	}

    public function sync($data)
    {
        return $this->RoleUser->updateOrCreate($data);
    }

    public function store($data){
        return $this->Permission->create($data);
    }

    public function update($data, $id)
    {
        return $this->RoleUser->where('user_id', $id)->update($data);
    }

    public function getRoleFromUserId($user_id)
    {
        return $this->RoleUser->where('user_id', $user_id);
    }

    public function delete($data, $id)
    {
         return $this->RoleUser->where('id', $id)->delete($data);
    }

}
