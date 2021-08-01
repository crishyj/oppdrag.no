<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Data\Models\Job;
use App\Data\Models\JobBid;
use App\Data\Models\ZipCode;
use App\Data\Models\User;
use App\Data\Models\ServiceProviderService;
use App\Data\Models\ServiceProviderProfileRequest;
use App\Data\Repositories\JobRepository;
use App\Helper\Helper;
use App\Events\UrgentJobCreated;
use App\Data\Models\ServiceProviderProfile;
use App\Notifications\CustomerBannedNotification;

class CustomerBanned implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
       $this->data = $data;
   }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {       
        $jobs = Job::where('user_id','=',$this->data->id)->whereNotIn('status',[Job::COMPLETED,Job::CANCELLED])->get();
        foreach ($jobs as $job) {
            $jobBids = JobBid::where('job_id', '=', $job->id)->whereNotIn('status',[JobBid::COMPLETED,JobBid::CANCELLED])->get();
            foreach ($jobBids as $jobBid) {

                $tempData = [];
                $tempData['id'] = $jobBid->id;
                $tempData['job_id'] = $job->id;
                $tempData['status'] = JobBid::CANCELLED;
                $tempData['updateJob'] = false;

                $event = new \StdClass();
                $event->id = $job->id;
                $event->to = User::find($jobBid->user_id);
                $event->title = 'User has been banned.';

                if($jobBid->is_awarded == 1 || ($jobBid->status == JobBid::PENDING || $jobBid->status == JobBid::ONTHEWAY || $jobBid->status == JobBid::VISITALLOWED)){
                  $event->message =  'We apologize you may not perform this <strong>'.$job->title.'</strong> job as the user has been banned.';  
                }else if($jobBid->status == JobBid::INVITED && $jobBid->is_invited == 1) {
                    $event->message =  'We apologize you may not place a bid on this <strong>'.$job->title.'</strong> job as the user has been banned.';
                }


              if($event->to){
                $event->type = 'customer_banned';
                $event->to->notify(new CustomerBannedNotification($event));
            }
        }

    }

}
}
