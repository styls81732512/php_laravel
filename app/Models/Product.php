<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'subTitle',
        'type',
        'photoSid',
        'description',
        'price',
        'finalPrice',
    ];

    protected $hidden = [
        'created_at',
        'deleted_at',
    ];
}
