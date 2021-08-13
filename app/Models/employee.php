<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 

class employee extends Model
{
    use HasFactory;
  
    public function departments()
    {
        return $this->belongsTo(department::class);
    }
    public function designations()
    {
        return $this->belongsTo(designation::class);
    }
}
