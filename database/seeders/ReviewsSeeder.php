<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
{
Review::factory(20)->create();
}
}
