<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();
        
        $data = [];


        $now = Carbon::now()->toDateTimeString();

        $services = [
            'Montering',
            'Elektrisk' ,
            'Alt-mulig mann',
            'Hjem Rengjøring',
            'Flytte',
            'Utendørs',
            'Maleri',
            'Rørleggerarbeid',
            'Smart hjem',
            'Oppbevaring',
            'Tv og elektronikk',
            'Vindusbehandlinger',
        ];


        $subServices = [
         'Rengjøring av hjemmet' => [
             'Rengjøring av leilighet',
             'Hushjelp',
             'Rengjøring',
             'Utflyttingsvask',
             'Vacation Rental Cleaning',
             'Vaskehjelp',
             'Kontorrengjøring',
             'Innflyttings Vask ',
             'Rengjøring av rommet'
         ],
         'Tv og elektronikk' => [
             'Skjule TV-ledninger',
             'Hjemmekino AV-oppsett',
             'Lydplanke installasjon',
             'TV-montering'
         ],
         'montering' => [
             'Sengemontering',
             'Montering av treningsutstyr',
             'Utemøbler montering',
             'Bordmontering',
               //'Furniture Assembly',
             'Kommodemontering',
             'Kontormøbelmontering',
         ],
         'alt-mulig mann' => [
             'Air Condition-installasjon',
             'Handy Helper',
             'Interior Painting',
             //  'TV Mounting',
             'Avinstaller Air condition',
             'Alt mulig-hjelp',
               //'Knobs Installation',
             'Møbelmontering',
             'Hanging Pictures & Shelves',
             'Locks Installation',
         ],
         'Rørleggerarbeid' => [
             'Avløpsreparasjon',
             'Faucet Replacement',
             'Toilet Trouble',
             'Kraninstallasjon',
             'Plumbing Service',
             'Unclog Toilet',
             'Kranreparasjon',
             'Toilet Repair',
         ],
         'Elektrisk'  => [
             'Ceiling & Bath Fans',
               //'Light Fixtures',
             'Smart Security Cam Installation',
             'Elektrisk service',
             'Installasjon av lysbryter',
             //  'Smart Thermostat Installation',
             'Søppeltømming',
             'Outlet Installation',
         ],
         'Maling' => [
             'Accent Wall Painting',
             'Crown Molding Painting',
              // 'Interior Painting',
             'Listmaling',
             'Door Painting',
             'Soveromsmaling',
             'DoorFrame Painting',
         ],
         'Moving' => [
              // 'Hanging Pictures & Shelves',
             'Lysarmaturer',
             'Flyttehjelp',
             'Vindusbehandlinger',
               //'Interior Painting',
              // 'Move in Cleaning',
             'Knotte-installasjon',
               //'Move Out Cleaning',
               //'TV Mounting',
         ],
         'Smart hjem' => [
             'Installering av smartenhet',
              // 'Smart Security Cam Installation',
             'Wi-fi Router Setup',
             'Oppsett av Smarthjem',
              // 'Smart Thermostat Installation',
             'Smartlås installasjon',
             'Videodørklokke-installasjon',
         ],
         'Vindusbehandlinger' => [
             'Persiennebehandling',
             'Persienne-installasjon',
             'Installering av gardin',
             'Vindusbehandlinger',
             'Installasjon av gardiner',
         ],
         'Outdoor' => [
             'Gressklipp og trimming',
              //    co99 'Outdoor Furniture Assembly',
             'Hagerydding',
         ],
         'Lagring'   => [
             'Langtidslagring',
             'Flytting og lager',
             'Korttidslagring',
         ],
     ];

     $isFeatured = [0, 0, 1];
        // reduce the probabiltiy of 1 occuring 

     $serviceRandomImages = [
        'images/dummy/carpenter1.jpg',
        'images/dummy/carpenter2.jpg',
        'images/dummy/carpenter3.jpg',
        'images/dummy/cleaning1.jpg',
        'images/dummy/cleaning2.jpg',
        'images/dummy/cleaning3.jpg',
        'images/dummy/concret.png',
        'images/dummy/electrician1.jpg',
        'images/dummy/electrician2.jpg',
        'images/dummy/electrician3.jpg',
        'images/dummy/mover1.jpeg',
        'images/dummy/mover2.jpg',
        'images/dummy/mover3.jpg',
        'images/dummy/painter1.jpg',
        'images/dummy/painter2.jpg',
        'images/dummy/painter3.jpg',
    ];

    foreach ($services as $key => $service) {

        $imageObject = [];

        $imageObject[]['name'] = url($serviceRandomImages[array_rand($serviceRandomImages)]);

        $data [] = [
            'id' => (int) $key+1,
            'title' => $service,
            'description' => $faker->Text,
            'url_suffix' =>  strtolower(str_replace(' ', '-', $service)),
            'parent_id' => null,
            'images' => json_encode($imageObject),
            'is_featured' => $isFeatured[array_rand($isFeatured)],
            'created_at' => $now,
            'updated_at' => $now
        ];
    }
    app("ServiceRepository")->model->insertOnDuplicateKey($data);

    $key = 13;


    foreach ($subServices as $parentServiceKey => $subService) {


        $data = [];
        $parentService = app('ServiceRepository')->findByAttribute('title' , $parentServiceKey);

        if(empty($parentService)){
            continue;
        }


        foreach ($subService as $value) {
            $imageObject = [];

            $imageObject[]['name'] = url($serviceRandomImages[array_rand($serviceRandomImages)]);


            $data [] = [
                'id' => (int) $key,
                'title' => $value,
                'url_suffix' =>  strtolower(str_replace(' ', '-', $value)),
                'description' => $faker->Text,
                'parent_id' => $parentService->id,
                'images' => json_encode($imageObject),
                'is_featured' => $isFeatured[array_rand($isFeatured)],
                'is_display_banner' => 1,
                'is_display_service_nav' => 1,
                'is_display_footer_nav' => 1,
                'created_at' => $now,
                'updated_at' => $now
            ];
            $key += 1;
        }
        app("ServiceRepository")->model->insertOnDuplicateKey($data);
    }


}
}
