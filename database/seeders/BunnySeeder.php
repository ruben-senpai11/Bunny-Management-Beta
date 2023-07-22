<?php

namespace Database\Seeders;

use App\Models\Bunny;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BunnySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bunny::factory()->count(100)->create();;
    }
}
