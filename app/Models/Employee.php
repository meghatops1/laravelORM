<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table="employees";
    protected $primaryKey = "emp_id";
    protected $fillable=['email','emp_name','password'];

    public function images(){
        return $this->morphOne(Image::class,"imageable");
    }
}
