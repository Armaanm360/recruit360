<?php

namespace App\Models\Configuration;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    protected $table = "job_types";
    protected $primaryKey = 'jobtype_id';


    public static function jobName($client_job_type){
           $job = JobType::where('job_type_has_deleted','NO')->where('jobtype_id',$client_job_type)->get();
           if (isset($job[0])) {
            return $job[0]->jobtype;
           }

           
    }
}
