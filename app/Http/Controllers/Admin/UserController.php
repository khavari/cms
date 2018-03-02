<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    private $per_page = 20;

    public function index()
    {
        if (Request('search')) {
            $search = Request('search');
            $users = User::where('id', 'like', '%' . $search . '%')
                ->orWhere('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('username', 'like', '%' . $search . '%')
                ->paginate($this->per_page);
        } elseif (Request('role_id')) {
            $role_id = Request('role_id');
            $users = User::Where('level', $role_id)->latest()->paginate(15);
        } else {
            $users = User::latest()->paginate($this->per_page);
        }

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();

        return view('admin.users.create', compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $username = strtolower($request->username);
        $email = strtolower($request->email);
        $password = bcrypt($request->password);
        $passcode = $request->password;

        $all_request = $request
            ->merge(['username' => $username, 'email' => $email, 'password' => $password, 'passcode' => $passcode,])
            ->except(['_token', 'password_confirmation']);

        $user = User::create($all_request);

        session()->flash('success', __('messages.created_success'));

        return redirect()->route('admin.users.show', ['id' => $user->id]);

    }

    public function show(User $user)
    {
        $columns = Schema::getColumnListing('users');
        $columns = collect($columns)->filter(function ($column) {
            return ! in_array($column, ['password', 'passcode', 'remember_token']);
        });

        return view('admin.users.show', compact('columns', 'user'));
    }

    public function edit(User $user)
    {
        // toggle user 0 or 1
        if (request('active') && request('active') === 'toggle') {
            if ($user->active === 1) {
                $user->update(['active' => 0]);
            } else {
                $user->update(['active' => 1]);
            }

            return back()->with('success', __('messages.toggled_success'));
        }

        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UserRequest $request, User $user)
    {
        $avatar = $user->image;
        if ($request->hasFile('image')) {
            $file = $request->file("image");
            $directory = 'uploads/users/' . date('Y') . '/' . date('m') . '/';
            $file_name = time();
            $extension = strtolower($file->getClientOriginalExtension());
            $avatar = $directory . $file_name . '.' . $extension;
            Storage::makeDirectory($directory);
            $file->storeAs($directory, $file_name . '.' . $extension, 'public');
        }

        $user->update([
            'image'    => $avatar,
            'role_id'  => $request->role_id,
            'username' => strtolower($request->username),
            'email'    => strtolower($request->email),
            'password' => bcrypt($request->password),
            'passcode' => $request->password,
            'name'     => $request->name,
            'company'  => $request->company,
            'phone'    => $request->phone,
            'mobile'   => $request->mobile,
            'address'  => $request->address,
            'amount'   => (int)$request->amount,
            'gender'   => $request->gender,
            'postal'   => $request->postal,
            'bio'      => $request->bio,
            'options'  => $request->national_id,
        ]);
        session()->flash('success', __('messages.updated_success'));

        return back();
    }

    public function destroy(User $user)
    {
        $user->deleteAssets();
        $user->delete();
        return back()->with('success', __('messages.deleted_success'));
    }

}
