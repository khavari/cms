<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoleRequest;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Request('search')) {
            $search = Request('search');
            $roles = Role::where('name', 'like', '%' . $search . '%')
                ->orWhere('slug', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->latest()->get();
        } else {
            $roles = Role::latest()->get();
        }

        return view('admin.users.roles', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        Role::create([
            'name'        => $request->name,
            'slug'        => $request->slug,
            'description' => $request->description,
        ]);
        session()->flash('success', __('messages.created_success'));

        return back();
    }

    public function show(Role $role)
    {

    }


    public function edit(Role $role)
    {
        $keys = collect($role->permissions)->pluck('id')->toArray();

        $permissions = Permission::latest()->get();

        return view('admin.users.permissions', compact('role', 'permissions', 'keys'));
    }


    public function update(Request $request, Role $role)
    {

        if($request->permissions){
           $role->permissions()->sync($request->permissions);
            session()->flash('success', __('messages.updated_success'));

            return back();
        }



        $role->update([
            'name'        => $request->name,
            'slug'        => $request->slug,
            'description' => $request->description,
        ]);
        session()->flash('success', __('messages.updated_success'));

        return back();
    }


    public function destroy(Role $role)
    {
        $role->users()->count();

        if ($role->users()->count() === 0) {
            session()->flash('success', __('messages.deleted_success'));
            $role->delete();
        } else {
            session()->flash('error', __('messages.notAlloweDeleteActive'));
        }

        return back();
    }
}
