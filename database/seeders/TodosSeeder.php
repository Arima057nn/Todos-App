<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(\App\Models\Todo::class, 10)->create();
        \App\Models\Todo::factory()->count(10)->create(); 
    }
}