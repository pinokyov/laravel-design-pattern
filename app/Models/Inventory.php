<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = ["product_id","shelf_id","receipt","remain","buying","selling"];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function shelf()
    {
        return $this->belongsTo(Shelf::class);
    }
}
