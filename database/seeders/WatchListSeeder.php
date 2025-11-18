<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WatchList;

class WatchListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Owned by test user and admin
        WatchList::insert([
            ['user_id' => 1, 'name' => 'Really Good Movies', 'image' => '1.jpg', 'description' => 'I sure do love movies'],
            ['user_id' => 2, 'name' => 'Movies that are just okay', 'image' => '3.jpg', 'description' => 'They\'re fine.'],
            ['user_id' => 2, 'name' => 'Really Bad Movies', 'image' => '2.jpg', 'description' => 'I simply hate movies'],
        ]);
    }
}
