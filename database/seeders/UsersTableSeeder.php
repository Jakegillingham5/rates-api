<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $studentRole = config('roles.models.role')::where('name', '=', 'Student')->first();
        $lecturerRole = config('roles.models.role')::where('name', '=', 'Lecturer')->first();
        $permissions = config('roles.models.permission')::all();

        /*
         * Add Users
         *
         */
        if (config('roles.models.defaultUser')::where('email', '=', 'wilk0001@flinders.edu.au')->first() === null) {
            $newUser = User::create([
                'name'     => 'Brett Wilkinson',
                'email'    => 'wilk0001@flinders.edu.au',
                'fan' => 'wilk0001',
                'password' => bcrypt('Qwerty1'),
            ]);

            $newUser->attachRole($lecturerRole);
            foreach ($permissions as $permission) {
                $newUser->attachPermission($permission);
            }
        }

        if (config('roles.models.defaultUser')::where('email', '=', 'gill0331@flinders.edu.au')->first() === null) {
            $newUser = User::create([
                'name'     => 'Jake Gillingham',
                'email'    => 'gill0331@flinders.edu.au',
                'student_id' => '2140080',
                'fan' => 'gill0331',
                'password' => bcrypt('Qwerty1'),
            ]);

            $newUser->attachRole($studentRole);
        }

        if (config('roles.models.defaultUser')::where('email', '=', 'fern0001@flinders.edu.au')->first() === null) {
            $newUser = User::create([
                'name'     => 'Pablo Fernandez',
                'email'    => 'fern0001@flinders.edu.au',
                'student_id' => '1242003',
                'fan' => 'fern0001',
                'password' => bcrypt('Qwerty1'),
            ]);

            $newUser->attachRole($studentRole);
        }
    }
}
