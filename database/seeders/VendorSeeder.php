<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendors = [
            ['name' => 'SecureServe', 'offer' => 'FastSOC Servers'],
            ['name' => 'USBProtector', 'offer' => 'FastSOC USB'],
            ['name' => 'FranceProtection', 'offer' => 'FastSOC Servers'],
            ['name' => 'MyDatas', 'offer' => 'FastSOC Data'],
            ['name' => 'ServerStrike', 'offer' => 'FastSOC Servers'],
        ];

        // Insérez les données dans la table vendors
        foreach ($vendors as $vendor) {
            Vendor::create($vendor);
        }
    }
}
