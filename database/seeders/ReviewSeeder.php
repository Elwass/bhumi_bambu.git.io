<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $reviews = [
            [
                'name' => 'Andi & Sinta',
                'role' => 'Tamu Gathering',
                'rating' => 5,
                'message' => 'Tempatnya adem, bambunya cantik, staf ramah dan sangat membantu acara keluarga kami.',
            ],
            [
                'name' => 'Dewi Pratiwi',
                'role' => 'Koordinator Outbound',
                'rating' => 5,
                'message' => 'Area lapang, banyak spot aktivitas, dan koordinasi booking mudah. Peserta puas.',
            ],
            [
                'name' => 'Rudi Santosa',
                'role' => 'Guru Pendamping',
                'rating' => 4,
                'message' => 'Workshop edukasi bambu menarik untuk siswa. Fasilitas cukup lengkap dan aman.',
            ],
            [
                'name' => 'Lisa Marcellina',
                'role' => 'Event Planner',
                'rating' => 5,
                'message' => 'Venue instagramable, ambience alami, lighting malam hari bagus. Klien senang.',
            ],
        ];

        foreach ($reviews as $review) {
            Review::firstOrCreate(['name' => $review['name'], 'message' => $review['message']], $review);
        }
    }
}
