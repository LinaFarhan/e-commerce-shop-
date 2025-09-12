<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. إنشاء مستخدمين
        User::factory(5)->create();

        // مستخدم ثابت للتجارب
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // 2. إنشاء فئات + منتجات
        Category::factory(3)->create()->each(function ($category) {
            Product::factory(5)->create([
                'category_id' => $category->id,
            ]);
        });

        //   ReviewsSeeder
        $this->call(ReviewsSeeder::class);
    }
}
