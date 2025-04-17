<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'invoice_number',
        'title',
        'description',
        'amount',
        'status',
        'due_date',
        'notes',
        'sent_at',
    ];

    protected $casts = [
        'due_date' => 'datetime',
        'sent_at' => 'datetime',
        'amount' => 'decimal:2',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
} 