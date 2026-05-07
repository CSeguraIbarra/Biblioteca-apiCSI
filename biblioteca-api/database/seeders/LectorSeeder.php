<?php

namespace Database\Seeders;

use App\Models\Lector;
use Illuminate\Database\Seeder;

class LectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lector::factory(5)->create();
    }
}