<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\File;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function logins()
{
    return $this->hasMany(UserLogin::class);
}

    public function role(){
        return $this->belongsTo(Role::class);
    }

//    public function roles()
//    {
//        return $this->belongsToMany(Role::class);
//    }

    public function deleteAssets(){
         File::delete($this->image);
         return true;
    }

    public function avatar(){

        if(strlen($this->image) > 5){
            return 'media/'.$this->image;
        }else{
            if($this->gender === 'male'){
                return '/assets/admin/img/male.jpg';
            }else{
                return '/assets/admin/img/female.jpg';
            }
        }

    }

    public function hasRole($role)
    {
        if(is_string($role)) {
            return $this->role->slug === $role;
            // after has many role for ane user
            //return $this->roles->contains('name' , $role);
        }
        return false;

        //return !! $role->intersect($this->roles)->count();
    }


    public function findByEmailOrCreate($user)
    {
        if ($returningUser = $this->getUserByEmailOrFail($user->email)) {
            return $returningUser;
        }

        return $this->model->firstOrCreate([
            'name'     => $user->name,
            'email'    => $user->email,
            'password' => Hash::make($user->email),
        ]);
    }



}
