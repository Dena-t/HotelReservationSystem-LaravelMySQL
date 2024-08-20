<?php

namespace App\Models;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Room extends Model
{
   
        
            protected $fillable = ['number', 'capacity', 'rate', 'facilities'];
        
    
}
