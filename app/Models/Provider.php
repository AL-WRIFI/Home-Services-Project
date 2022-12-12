<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','name','image','phone','email','password','address',
        'category_id','description','identity_type','identity_Number','identification_Image','status'
    ];
}
