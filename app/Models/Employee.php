<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 

class Employee extends Model
{
    use HasFactory;
  
    public function departments()
    {
        return $this->belongsTo(Department::class);
    }
    public function designations()
    {
        return $this->belongsTo(Designation::class);
    }
}
                                                                      