<?php

namespace App\Http\Controllers\Admin;

use App\UserLogin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserLoginController extends Controller
{
    private $per_page = 25;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Request('search')) {
            $search = Request('search');

            if (is_numeric($search)) {
                $logins = UserLogin::where('user_id', $search)->latest()->paginate($this->per_page);
            } else {
                $logins = UserLogin::where('ip', 'like', '%' . $search . '%')->orWhere('created_at', 'like', '%' . $search . '%')->latest()->paginate($this->per_page);
            }
        } else {
            $logins = UserLogin::latest()->paginate($this->per_page);
        }

        return view('admin.users.logins', compact('logins'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserLogin $userLogin
     *
     * @return \Illuminate\Http\Response
     */
    public function show(UserLogin $userLogin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserLogin $userLogin
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(UserLogin $userLogin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\UserLogin           $userLogin
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserLogin $userLogin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserLogin $userLogin
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserLogin $userLogin)
    {
        //
    }
}
