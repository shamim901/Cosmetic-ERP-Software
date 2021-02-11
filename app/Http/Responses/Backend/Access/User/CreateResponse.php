<?php

namespace App\Http\Responses\Backend\Access\User;

use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    /**
     * @var \App\Models\Access\Role\Role
     */
    protected $roles;
    protected $divisions;
    protected $emp_role;
    protected $book_sellers;

    /**
     * @param \Illuminate\Database\Eloquent\Collection $roles
     */
    public function __construct($roles, $divisions,$emp_role,$book_sellers)
    {
        $this->roles = $roles;
        $this->divisions = $divisions;
        $this->emp_role = $emp_role;
        $this->book_sellers = $book_sellers;
    }

    /**
     * In Response.
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.access.users.create')->with([
            'roles' => $this->roles,
            'divisions' => $this->divisions,
            'emp_role' => $this->emp_role,
            'book_sellers' => $this->book_sellers,
        ]);
    }
}
