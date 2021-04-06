<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('users')->truncate();

        $admin = User::firstOrCreate([
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'password'=> Hash::make('admin123')
        ]);

        factory(User::class,4)->firstOrCreate();
    }
}
