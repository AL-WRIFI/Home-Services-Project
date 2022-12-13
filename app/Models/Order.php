<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id' ,	'category_id ' ,'provider_id' , 'note' , 'address' , 'service_address_id' ,	'service_schedule' ,
        'order_status'
    ];

    public function user(){
        return $this->belongsTo(User::Class , 'user_id' , 'id');
    }

    public function provider(){
        return $this->belongsTo(Provider::Class, 'category_id' , 'id');
    }
    public function category(){
        return $this->belongsTo(Category::class , 'category_id' , 'id');
    }
    public function detail(){
        return $this->hasMany(Order_detail::Class,'order_id' ,'id');
    }
    
    // public function payment_method(){
    //     return $this->hasMany(Order_detail::Class,'order_id');
    // }

    // public function payment(){
    //     return $this->hasMany(Order_detail::Class,'order_id');
    // }

    // public function orders_status_id(){
    //     return $this->hasMany(Order_detail::Class,'order_id');
    // }
    public function scopeOrder_status($query ,$status){
        $query->where('order_status', '=', $status);
    }
}
