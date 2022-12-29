<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class admins extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newAdmin = new \App\Models\admins();
        $newAdmin->email = 'demo@demo.com';
        $newAdmin->password = md5(md5('demo'));
        $newAdmin->save();
    }
}
