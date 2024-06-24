<?php

namespace Database\Seeders;

use App\Models\Construction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConstructionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Construction::factory()->count(3)->create();
    }
}
