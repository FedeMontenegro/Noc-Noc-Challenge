<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Status::create([
            'name' => 'Pendiente'
        ]);
        
        Status::create([
            'name' => 'En proceso'
        ]);

        Status::create([
            'name' => 'Bloqueado'
        ]);

        Status::create([
            'name' => 'Completado'
        ]);

    }
}
