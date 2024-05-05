<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $offers = [
            ['name' => 'FastSOC Servers', 'description' => 'Permet de protéger les serveurs quantiques de nos clients.'],
            ['name' => 'FastSOC USB', 'description' => 'Permet le contrôle des ports USB et des accès aux fichiers via USB'],
            ['name' => 'FastSOC Data', 'description' => 'Permet de controller les données entrantes et sortantes de l’entreprise grâce a des modules novateurs d’intelligence artificielle basé sur le protocole CarotteDeux'],
        ];

        // Insérez les données dans la table offers
        foreach ($offers as $offer) {
            Offer::create($offer);
        }
    }
}
