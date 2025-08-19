<?php

namespace Database\Seeders;

use App\Models\ApbDesa;
use App\Models\User;
use App\Models\VisionMission;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            HeroSectionSeeder::class,
            ContentSeeder::class,
            ApbDesaSeeder::class,
            KiaServiceSeeder::class,
            KkServiceSeeder::class,
            KtpServiceSeeder::class,
            LembagaDesaSeeder::class,
            MapSeeder::class,
            OrganizationPositionSeeder::class,
            PerangkatDesaSeeder::class,
            PeristiwaPentingServiceSeeder::class,
            PindahDatangServiceSeeder::class,
            PotensiDesaSeeder::class,
            UserSeeder::class,
            VillageDemographicSeeder::class,
            VillageGeographySeeder::class,
            VillageHistorySeeder::class,
            VisionMissionSeeder::class
        ]);
    }
}
