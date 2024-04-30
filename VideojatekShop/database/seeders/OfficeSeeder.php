<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // this file is used to declare the sql db records for the offices,
        //  until we are able to use ERP1's db
        Office::create([
            "name"=> "aevum_dembinszky",
            "zip_code" => "1071",
            "city" => "Budapest",
            "street" => "Dembinszky u.",
            "house_number" => "44",
            "number_of_workers" => "2",
            "lat" => 47.50755608897227,
            "lng" => 19.082259008592498
        ]);
        Office::create([
            "name"=> "aevum_izabella",
            "zip_code" => "1064",
            "city" => "Budapest",
            "street" => "Izabella u.",
            "house_number" => "65",
            "number_of_workers" => "2",
            "lat" => 47.50884478894911,
            "lng" => 19.066047925940623
        ]);
        Office::create([
            "name"=> "aevum_pesti",
            "zip_code" => "1173",
            "city" => "Budapest",
            "street" => "Pesti út",
            "house_number" => "41/A",
            "number_of_workers" => "2",
            "lat" => 47.48312983311757,
            "lng" => 19.238884639430985
        ]);
        Office::create([
            "name"=> "aevum_lenhossék",
            "zip_code" => "1096",
            "city" => "Budapest",
            "street" => "Lenhossék u.",
            "house_number" => "33",
            "number_of_workers" => "2",
            "lat" => 47.48072524137717,
            "lng" => 19.080378810594798

        ]);
        Office::create([
            "name"=> "aevum_villányi",
            "zip_code" => "1114",
            "city" => "Budapest",
            "street" => "Villányi út",
            "house_number" => "6",
            "number_of_workers" => "2",
            "lat" => 47.477960838544284,
            "lng" => 19.04509812593893
        ]);
        Office::create([
            "name"=> "aevum_ernő",
            "zip_code" => "1096",
            "city" => "Budapest",
            "street" => "Ernő u.",
            "house_number" => "30-34",
            "number_of_workers" => "2",
            "lat" => 47.47958894467054,
            "lng" => 19.085216554775098
        ]);
        Office::create([
            "name"=> "aevum_nagyenyed",
            "zip_code" => "1123",
            "city" => "Budapest",
            "street" => "Nagyenyed u.",
            "house_number" => "1",
            "number_of_workers" => "2",
            "lat" => 47.498757248209564,
            "lng" => 19.02339759688433
        ]);
        Office::create([
            "name"=> "aevum_thököly",
            "zip_code" => "1147",
            "city" => "Budapest",
            "street" => "Thököly út",
            "house_number" => "167",
            "number_of_workers" => "2",
            "lat" => 47.518008662227416,
            "lng" =>  19.110125808598365
        ]);
        Office::create([
            "name"=> "aevum_szivacs",
            "zip_code" => "1204",
            "city" => "Budapest",
            "street" => "Szivacs utca",
            "house_number" => "5",
            "number_of_workers" => "2",
            "lat" => 47.44273647035911,
            "lng" => 19.112461183609113
        ]);
        Office::create([
            "name"=> "aevum_árpád",
            "zip_code" => "1042",
            "city" => "Budapest",
            "street" => "Árpád út",
            "house_number" => "88",
            "number_of_workers" => "2",
            "lat" => 47.56040351030403,
            "lng" => 19.0923153971074
        ]);
        Office::create([
            "name"=> "aevum_papkároly",
            "zip_code" => "1139",
            "city" => "Budapest",
            "street" => "Pap Károly u.",
            "house_number" => "12",
            "number_of_workers" => "2",
            "lat" => 47.53233069175092,
            "lng" =>  19.07150345292552
        ]);
        Office::create([
            "name"=> "aevum_bécsi",
            "zip_code" => "1032",
            "city" => "Budapest",
            "street" => "Bécsi út",
            "house_number" => "143",
            "number_of_workers" => "2",
            "lat" => 47.53656095256181,
            "lng" =>  19.03342072594215
        ]);
        Office::create([
            "name"=> "aevum_debrecen_csapó",
            "zip_code" => "4029",
            "city" => "Debrecen",
            "street" => "Csapó u.",
            "house_number" => "53",
            "number_of_workers" => "2",
            "lat" => 47.53354311350078,
            "lng" =>  21.631736710597696
        ]);
        Office::create([
            "name"=> "aevum_salgótarján_füleki",
            "zip_code" => "3100",
            "city" => "Salgótarján",
            "street" => "Füleki út",
            "house_number" => "12",
            "number_of_workers" => "2",
            "lat" => 48.11014806271663,
            "lng" => 19.811604520154262
        ]);
        Office::create([
            "name"=> "szomorúfűz_nyíregyháza_dózsa",
            "zip_code" => "4400",
            "city" => "Nyíregyháza",
            "street" => "Dózsa György u.",
            "house_number" => "70",
            "number_of_workers" => "2",
            "lat" => 47.96327969938218,
            "lng" => 21.720807950572443
        ]);
        Office::create([
            "name"=> "aevum_békéscsaba_munkácsy",
            "zip_code" => "5600",
            "city" => "Békéscsaba",
            "street" => "Munkácsy utca",
            "house_number" => "9",
            "number_of_workers" => "2",
            "lat" => 46.67829646726883,
            "lng" => 21.096902959533715
        ]);
    }
}
