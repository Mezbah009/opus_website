<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductFirstSection;
use App\Models\ProductSecondSection;
use App\Models\ProductThirdSection;



class Product extends Model
{
    use HasFactory;

    public function sections()
    {
        return $this->hasMany(ProductFirstSection::class);
    }

    public function secondSections()
    {
        return $this->hasMany(ProductSecondSection::class);
    }
    public function thirdSections()
    {
        return $this->hasMany(ProductThirdSection::class);
    }
}
