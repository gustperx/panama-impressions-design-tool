<?php

namespace App\Modules\Products;

use App\Modules\Products\Designs\ProductDesign;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductStorage
{
    private $storage;

    public function __construct()
    {
        $this->storage = Storage::disk(env('STORAGE_DISK'));
    }


    public function thumbnail(Product $product, $thumbnail)
    {
        // delete avatar
        $this->storage->delete($product->thumbnail);

        // save new avatar
        //$resize = Image::make($thumbnail)->resize(300, 300)->encode('jpg');

        $resize = Image::make($thumbnail)->encode('png');

        $hash = md5($resize->__toString());

        $path = trans('files.products.view', ['product' => $product->id, 'file' => $hash.".png"]);

        // Storage::put($path, $contents, $visibility = null)
        $this->storage->put($path, $resize->__toString());

        return $path;
    }
    
    public function source(ProductDesign $productDesign, $source)
    {
        // remove file
        $this->remove_design_storage($productDesign);

        // save new avatar
        //$resize = Image::make($thumbnail)->resize(300, 300)->encode('jpg');

        $resize = Image::make($source)->encode('png');

        $hash = md5($resize->__toString());

        $path = trans('files.products.designSource', ['design' => $productDesign->id, 'file' => $hash.".png"]);

        // Storage::put($path, $contents, $visibility = null)
        $this->storage->put($path, $resize->__toString());

        return $path;
    }
    
    public function remove_design_storage(ProductDesign $productDesign)
    {
        // remove storage
        $this->storage->delete($productDesign->source);
    }
}