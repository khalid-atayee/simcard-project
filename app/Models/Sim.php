<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sim extends Model
{
    use HasFactory;

    public function distribution(){
        return $this->belongsTo(Distribution::class,'distribution_id','id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class,'company_id','id');
    }
    
}
