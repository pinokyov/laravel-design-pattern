<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['parent_id','name','slug','status'];

    public function subs()
    {
        return $this->hasMany(Category::class,'parent_id','id')->with('subs');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'category_product');
    }
}
