<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events;
use App\Patients;
use App\Interventions;


class Visit_interven extends Model
{
    protected $fillable = [
        'id','patient_id','interven_id','event_id','remarks','child_interven_id', 'created_by', 'date'
    ];

     public function patient()
    {
       return $this->belongsTo('App\Patients','patient_id');
    }

      public function intervention()
    {
       return $this->belongsTo('App\Interventions','interven_id');
    }

      public function childintervention()
    {
       return $this->belongsTo('App\Interventions','child_interven_id');
    }


     public function events()
    {
       return $this->belongsTo('App\Events','event_id');
    }
}
