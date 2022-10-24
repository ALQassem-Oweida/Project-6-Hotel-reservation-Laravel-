<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'cat_name',
        'cat_img',
        
    ];
    public function rooms(){
        return $this->hasMany(room::class);
    }
}
