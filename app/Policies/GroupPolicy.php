<?php

namespace App\Policies;

use App\Models\Group;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class GroupPolicy
{

    public $role;

    public $module = 'groups';

    public function __construct()
    {
        $this->role = json_decode(Auth::user()->group->permissions, true);
    }
    public function viewAny()
    {
        return isRole($this->role, $this->module, 'view');
    }
    public function create(User $user)
    {
        return isRole($this->role, $this->module, 'add');
    }
    public function update()
    {
        return isRole($this->role, $this->module, 'edit');
    }
    public function delete()
    {
        return isRole($this->role, $this->module, 'delete');
    }
    public function permission()
    {
        return isRole($this->role, $this->module, 'permission');
    }
}
