<?php

namespace App\Modules\Products\Models;

use App\Modules\ModelBase;
use App\Modules\Products\Product;

class ProductModel extends ModelBase
{
    protected $fillable = [
        
        'title',
        'thumbnail',
        'view',
        'status',
        'product_id'
    ];
    
    public function layers()
    {
        return $this->hasMany(ProductLayer::class);
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function filterAndPaginate($productModelDescription, $category_id, $paginate)
    {
        return $this->query()
            ->productPublish()
            ->productCategory($category_id)
            ->productModelDescription($productModelDescription)
            ->where('status', 'publish')
            ->paginate($paginate);
    }
    
    public function scopeProductPublish($query)
    {
        return $query->whereHas('product', function ($query) {

            $query->where('status', 'publish');
        });
    }

    public function scopeProductCategory($query, $category_id)
    {
        if (trim($category_id) != "") {

            return $query->whereHas('product', function ($query) use ($category_id) {

                $query->productCategory($category_id);
            });
        }

        return null;
    }
    
    public function scopeProductModelDescription($query, $description)
    {
        if (trim($description) != "") {

            return $query->where("title", "LIKE", "%$description%");
        }

        return null;
    }

}
