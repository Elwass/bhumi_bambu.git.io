<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\PackageSlot;
use App\Models\User;
use Database\Seeders\ReviewSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@bhumibambu.test'],
            [
                'name' => 'Admin Bhumi Bambu',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        $packages = collect([
            ['title' => 'Berkemah Ceria', 'category' => 'camping'],
            ['title' => 'Outbound Petualang', 'category' => 'outbound'],
            ['title' => 'Gathering Alam', 'category' => 'event'],
            ['title' => 'Edukasi Bambu', 'category' => 'bamboo_education'],
            ['title' => 'Jelajah Alam', 'category' => 'nature_tour'],
        ])->map(function ($data, $index) {
            return Package::create([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'category' => $data['category'],
                'description' => 'Nikmati pengalaman ' . strtolower($data['title']) . ' di Bhumi Bambu Baturaden.',
                'price' => 250000 + ($index * 50000),
                'duration' => '1 Hari',
                'location' => 'Bhumi Bambu Baturaden',
                'facilities' => 'Tiket masuk, pemandu, area parkir, spot foto',
                'is_active' => true,
            ]);
        });

        $packages->each(function (Package $package) {
            PackageSlot::create([
                'package_id' => $package->id,
                'date' => now()->addDays(3)->toDateString(),
                'quota' => 20,
                'booked_count' => 0,
                'is_open' => true,
            ]);
            PackageSlot::create([
                'package_id' => $package->id,
                'date' => now()->addDays(10)->toDateString(),
                'quota' => 15,
                'booked_count' => 0,
                'is_open' => true,
            ]);
        });

        $this->call(ReviewSeeder::class);
    }
}
