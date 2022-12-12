<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','description','image','slug','status'
    ];

    protected $hidden = ['slug', 'created_at', 'updated_at'];
       
    
    public function services(){
        return $this->hasMany(Service::class, 'category_id','id');
    }
    public function provider(){
        return $this->hasMany(Provider::class, 'category_id','id');
    }
}
