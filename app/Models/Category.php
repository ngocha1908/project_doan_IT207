<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $table = "categories";
    protected $fillable = [
        'name',
        'slug',
        'parent',
    ];
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function subcategory()
    {
        return $this->hasMany(Category::class, 'parent', 'id');
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent', 'id');
    }
}
