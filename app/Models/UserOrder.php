<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Order;
use App\Models\Payment;
use App\models\OrderDiscount;
use App\Models\User;

class UserOrder extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'user_orders';

    protected $fillable = [
        'user_id',
        'amount',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class,'order_id', 'id');
    }

    public function users()
    {
        return $this->hasOne(User::class,'id', 'user_id');
    }


    public function payment()
    {
        return $this->hasOne(Payment::class,'order_id','id');
    }

    public function order_discount()
    {
        return $this->hasOne(OrderDiscount::class,'order_id','id');
    }
}
