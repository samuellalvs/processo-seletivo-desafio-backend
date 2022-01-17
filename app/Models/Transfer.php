<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $table = 'transfers';

    protected $fillable = [
        'id',
        'user_payer_id',
        'user_payee_id',
        'amount'
    ];
}
