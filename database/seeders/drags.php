<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class drags extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newDrag = new \App\Models\drags();
        $newDrag->name = 'Drag 1';
        $newDrag->stock = 10;
        $newDrag->price = 100;
        $newDrag->save();
        $newDrag = new \App\Models\drags();
        $newDrag->name = 'Drag 2';
        $newDrag->stock = 20;
        $newDrag->price = 200;
        $newDrag->save();
        $newDrag = new \App\Models\drags();
        $newDrag->name = 'Drag 3';
        $newDrag->stock = 0;
        $newDrag->price = 300;
        $newDrag->save();
    }
}
