<?php

use Illuminate\Database\Seeder;
use App\Data\Models\ZipCode;

class ZipCodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        ZipCode::insertOnDuplicateKey(array (
            array (
                'zip_code' => '0001',
                'latitude' => '59.9133301',
                'longitude' => '10.7389701',
            ), 
            array (
                'zip_code' => '0010',
                'latitude' => '59.9133301',
                'longitude' => '10.7389701',
            ), 
            array (
                'zip_code' => '0015',
                'latitude' => '59.9133301',
                'longitude' => '10.7389701',
            ),               
            
        ));        
            
           
    }
}
