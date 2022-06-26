<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
    use HasFactory;

    public function simcards(){
        return $this->hasMany(Sim::class,'distribution_id','id'); // distribution_is foreign key of distribution table
    }

    public function units(){
        return $this->belongsTo(Unit::class,'unit_id','id');
    }
    public function ranks()
    {
        return $this->belongsTo(Rank::class,'rank_id' , 'id');
    }
}
