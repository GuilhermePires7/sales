<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id', 'product_id', 'amount', 'unitary_value', 'subtotal',
        'payment_method', 'installments', 'expiration_date', 'installment_value', 'payment_subtotal'
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Relacionamento: uma venda pertence a um produto
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
