<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','date','time','description','image','link','mode','societies'
    ];

    public function societies()
    {
        return $this->belongsToMany(Society::class);
    }

}
