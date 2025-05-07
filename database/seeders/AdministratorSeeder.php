<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new User;
        $administrator->name = "Administrator";
        $administrator->email = "danyadhi4149@gmail.com";
        $administrator->password = Hash::make("password");
        $administrator->role = 'admin'; // Menambahkan role admin
        $administrator->save();

        $this->command->info("User Admin berhasil diinsert");
    }
}
