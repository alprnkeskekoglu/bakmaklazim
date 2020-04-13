<?php
namespace Dawnstar\Database\seeds;

use Dawnstar\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database Seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => "Alperen",
            'email' => "alperen@gmail.com",
            "password" => \Illuminate\Support\Facades\Hash::make(123123)
        ]);
    }
}
