<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;
use App\Role;
Use App\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name'        => 'admin',
            'slug'        => 'admin',
            'description' => 'admin',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);

        $user = Role::create([
            'name'        => 'user',
            'slug'        => 'user',
            'description' => 'user',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);

        User::create([
            'username'   => 'admin@asrenet.net',
            'role_id'    => $admin->id,
            'email'      => 'admin@asrenet.net',
            'password'   => bcrypt('459963'),
            'passcode'   => '459963',
            'name'       => 'asrenet support',
            'gender'     => 'male',
            'active'     => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
