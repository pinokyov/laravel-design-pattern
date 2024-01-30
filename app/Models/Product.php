<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "category_id",
        "brand_id",
        "supplier_id",
        "name",
        "slug",
        "code",
        "barcode",
        "properties",
        "status",
        "volume"
    ];

    protected $casts = [
        "properties" => "object"
    ];
}
