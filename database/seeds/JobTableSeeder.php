<?php

use Illuminate\Database\Seeder;
use App\Data\Models\Role;
use Faker\Factory;
use Carbon\Carbon;

class JobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $now = Carbon::now()->toDateTimeString();
        
        $faker = Faker\Factory::create();
        
        $numberOfJobs = 20;

        $data = [];

        $jobType = ['normal' , 'urgent'];

        $randomValues = [0, 0, 0, 0, 0, 1];

        $jobBiddingStatuses = ['in_bidding', 'in_bidding', 'in_bidding', 'in_bidding', 'in_bidding', 'cancelled'];
        

        $zipCodes = app('ZipCodeRepository')->model->inRandomOrder()->pluck('zip_code')->toArray();
        $zipCodes = [1001];

        for ($i=1; $i < $numberOfJobs; $i++) { 


            $isArchived = $randomValues[array_rand($randomValues)];

            $user = app('UserRepository')->model->where('role_id' , Role::CUSTOMER)->inRandomOrder()->first();
            $service = app('ServiceRepository')->model->inRandomOrder()->first();
            $country_id = 164; // Norway 
            
            $state = app('StateRepository')->model->inRandomOrder()->first();
            
            $city = app('CityRepository')->model->where('state_id' , $state->id)->inRandomOrder()->first();

            $preferences = ['choose_date', 'any_time', 'few_days', 'with_in_a_week'];

            if($user && $service){

                $preference = $preferences[array_rand($preferences)];

                $scheduled_at = $preference == 'choose_date' ? Carbon::now()->toDateString() : null;

                $data[] = [
                    'id' => $i,
                    'user_id' => $user->id,
                    'service_id' => $service->id,
                    'title' => $faker->Company,
                    'description' => $faker->Text,
                    'address' => $faker->Address,
                    'zip_code' => $zipCodes[array_rand($zipCodes)],
                    'country_id' => $country_id,
                    'state_id' => $state->id,
                    'city_id' => $city ? $city->id : null,
                    'schedule_at' => $scheduled_at,
                    'preference' => $preference, 
                    'job_type' => $jobType[array_rand($jobType)],
                    'status' => $jobBiddingStatuses[array_rand($jobBiddingStatuses)],
                    'is_archived' => $isArchived,
                    'created_at' => $now,
                    'updated_at' => $now

                ];

            }

        }

        app("JobRepository")->model->insertOnDuplicateKey($data);

    }   
}
