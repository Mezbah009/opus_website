<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFirstSection extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'logo', 'brochure', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
