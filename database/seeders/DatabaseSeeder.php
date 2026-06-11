<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categoryNames = [
            'Kesehatan',
            'Bencana Alam',
            'Pendidikan',
            'Panti Asuhan',
        ];

        $categories = collect($categoryNames)->mapWithKeys(function (string $name) {
            $category = Category::firstOrCreate(['name' => $name]);

            return [$name => $category];
        });

        $campaign = Campaign::firstOrCreate(
            ['title' => 'Bantuan Kesehatan untuk Masyarakat'],
            [
                'description' => 'Program donasi untuk membantu biaya pengobatan dan kebutuhan kesehatan masyarakat yang membutuhkan.',
                'target_donation' => 10000000,
                'collected_donation' => 1250000,
                'deadline' => now()->addMonth()->toDateString(),
            ]
        );

        $campaign->account()->updateOrCreate(
            ['campaign_id' => $campaign->id],
            [
                'bank_name' => 'BSI',
                'account_number' => '1234567890',
                'account_holder' => 'Yayasan DonasiKu',
            ]
        );

        $campaign->categories()->syncWithoutDetaching([
            $categories['Kesehatan']->id,
            $categories['Pendidikan']->id,
        ]);
    }
}
