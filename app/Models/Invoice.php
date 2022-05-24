<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'customer_name',
        'total_amount',
        'discount_amount',
        'paid_amount',
        'due_amount',


    ];


}
