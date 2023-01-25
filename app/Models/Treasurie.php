<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treasurie extends Model
{
    use HasFactory;

    protected $table = 'treasuries';
    protected $fillable = [
        'name',
        'is_master',
        'last_receipt_number_exchange',
        'last_receipt_number_collection',
        'added_by',
        'updated_by',
        'active',
        'company_code',
        'date',

    ];
}
