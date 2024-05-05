<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductFirstSection;
use App\Models\ProductSecondSection;
use App\Models\ProductThirdSection;
use App\Models\ProductFourthSection;
use App\Models\ProductFifthSection;




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

    public function fourthSections()
    {
        return $this->hasMany(ProductFourthSection::class);
    }

    public function fifthSections()
    {
        return $this->hasMany(ProductFifthSection::class);
    }
}
