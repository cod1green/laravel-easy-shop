<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;

    protected $table = 'sub_sub_categories';

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'subsubcategory_name_en',
        'subsubcategory_name_pt',
        'subsubcategory_slug_en',
        'subsubcategory_slug_pt',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }
}
