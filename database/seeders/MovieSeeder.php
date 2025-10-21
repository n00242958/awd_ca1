<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

// The movie seeder is ran after initial DB migrations and
// populates the Movie model with example data.
class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert example movies
        DB::table('movies')->insert([
            [
                'title' => 'The Great Gatsby',
                'image' => '1.jpg',
                'description' => 'A story about American socialites and decadence.',
                'release_date' => Carbon::parse('2013-01-05'),
                'review_score' => '3',
                'age_rating' => '12'
            ],
            [
                'title' => 'The Wolf of Wall Street',
                'image' => '2.jpg',
                'description' => 'The comical retelling of criminal stockbroker Jordan Belfort\'s autobiography.',
                'release_date' => Carbon::parse('2013-12-25'),
                'review_score' => '4',
                'age_rating' => '18'
            ],
            [
                'title' => 'John Wick',
                'image' => '3.jpg',
                'description' => 'An action movie about getting revenge.',
                'release_date' => Carbon::parse('2014-10-24'),
                'review_score' => '4',
                'age_rating' => '16'
            ],
            [
                'title' => 'Falling Down',
                'image' => '4.jpg',
                'description' => 'The emotional rampage and downfall of an ordinary man.',
                'release_date' => Carbon::parse('1993-02-26'),
                'review_score' => '3',
                'age_rating' => '18'
            ],
            [
                'title' => 'Barry Lyndon',
                'image' => '5.jpg',
                'description' => 'The life and misadventures of a young Irish man in the 1700s.',
                'release_date' => Carbon::parse('1975-12-18'),
                'review_score' => '4',
                'age_rating' => '15'
            ],
            [
                'title' => 'Dr. Strangelove',
                'image' => '6.jpg',
                'description' => 'A comedy about the Cold War and the end of the world.',
                'release_date' => Carbon::parse('1964-01-29'),
                'review_score' => '5',
                'age_rating' => '12'
            ]
        ]);
    }
}
