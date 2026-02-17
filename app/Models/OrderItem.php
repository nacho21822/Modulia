<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'container_id',
        'quantity',
        'price',
    ];

    /**
     * Una línea de pedido pertenece a un pedido.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Una línea de pedido referencia a un contenedor (producto).
     */
    public function container()
    {
        return $this->belongsTo(Container::class);
    }
}