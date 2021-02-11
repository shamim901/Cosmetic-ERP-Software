<?php

namespace App\Http\Responses\Backend\Access\User;

use App\Models\Access\User\User;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;

class EditResponse implements Responsable
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var \App\Models\Access\Permission\Permission
     */
    protected $permissions;

    /**
     * @var \App\Models\Access\Role\Role
     */
    protected $roles;

    /**
     * @param User $user
     * @param $roles
     * @param $permissions
     */
    public function __construct($user, $roles, $permissions)
    {
        $this->user = $user;
        $this->roles = $roles;
        $this->permissions = $permissions;
    }

    /**
     * toReponse.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        $permissions = $this->permissions;
        $userPermissions = $this->user->permissions()->get()->pluck('id')->toArray();
        $divisions = DB::table('divisions')->get();
        $districts = DB::table('districts')->where(['division_id' => $this->user->division])->get();
        $upazilas = DB::table('upazilas')->where(['district_id' => $this->user->district])->get();
        $unions = DB::table('unions')->where(['upazilla_id' => $this->user->upazila])->get();

        return view('backend.access.users.edit')->with([
            'user'            => $this->user,
            'userRoles'       => $this->user->roles->pluck('id')->all(),
            'roles'           => $this->roles,
            'userPermissions' => $userPermissions,
            'permissions'     => $permissions,
            'divisions'       => $divisions,
            'districts'       => $districts,
            'upazilas'       => $upazilas,
            'unions'       => $unions,
        ]);
    }
}
