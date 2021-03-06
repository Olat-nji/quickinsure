<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $input =[
            'name' => 'Admin ',
                'email' => 'admin@quickinsure.com',
                'password' => Hash::make('admin@quickinsure.com'),
                'state_of_origin'=>'Oyo',
                'date_of_birth'=>'12/05/1994'
        ];
         DB::transaction(function () use ($input) {
             tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => $input['password'],
                'date_of_birth' => $input['date_of_birth'],
                'state_of_origin' => $input['state_of_origin'],
            ]), function (User $user) {
                $this->createTeam($user);
            });
        });
        $input =[
            'name' => 'Ogunsola Fiyin',
                'email' => 'phyyeensweb@yahoo.com',
                'password' => '$2y$10$YcwW8zmpKsbA2L/0EL2YKOQVc2Yqgr33fKPgUl3rNuFk/4cDgvup.'
        ];
         DB::transaction(function () use ($input) {
             tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => $input['password'],
            ]), function (User $user) {
                $this->createTeam($user);
            });
        });
        
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
