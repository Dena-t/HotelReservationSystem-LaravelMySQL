<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Room;

class customers extends Model
{
    use HasFactory;
    public function room(){
        return $this->belongsTo(Room::class,'room_id','number');
      }


}