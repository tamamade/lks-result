<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AllowedDomains;
use App\Models\Questions;

class Forms extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];


    public function allowedDomains()
    {
        return $this->hasMany(AllowedDomains::class, 'id');
    }

    public function questions()
    {
        return $this->hasMany(Questions::class, 'id');
    }
}
