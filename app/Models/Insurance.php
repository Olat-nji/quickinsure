<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    public function info()
    {
        $info=null;
        if ($this->type == 'life') {
            $info = $this->belongsTo('App\Models\LifeInsurance', 'insurance_id')->first();
            
        }

        if ($this->type == 'medical') {
            $info = $this->belongsTo('App\Models\MedicalInsurance', 'insurance_id')->first();
            
        }

        if ($this->type == 'property') {
            $info= $this->belongsTo('App\Models\PropertyInsurance', 'insurance_id')->first();
            
        }

        if ($this->type == 'car') {
            $info = $this->belongsTo('App\Models\CarInsurance', 'insurance_id')->first();
            
        }
        return $info;
    }
}
