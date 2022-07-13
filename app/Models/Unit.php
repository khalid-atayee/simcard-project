<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $fillable =['name'];

    public function simcards()
    {
        return $this->hasManyThrough(Sim::class,Distribution::class,'unit_id','distribution_id','id','id');

    }
    public function distribution()
    {
        return $this->hasMany(Distribution::class);
    }

    public function company()
    {
        return $this->hasMany(Company::class)->withPivot($this->simcards());
    }
}
