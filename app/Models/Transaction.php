<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table='bank_transactions';
    protected $fillable = [
        'product_type',
        'terminal_id',
        'reg_number',
        'amount',   
        'student_name',
        'acquirer_remote_reference',
        'status',
        'payment_channel',
        'currency',
        'imei',
        'pan',
        'code',
        'description',
        'branch',
        'teller',
        'rrn',
        'reference'
    ];
}
