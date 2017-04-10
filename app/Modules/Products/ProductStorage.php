<?php

namespace App\Modules\Products;

use App\Modules\Products\Designs\ProductDesign;
use App\Modules\Products\Models\ProductModel;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductStorage
{
    private $storage;

    public function __construct()
    {
        $this->storage = Storage::disk(env('STORAGE_DISK'));
    }


    public function thumbnail(ProductModel $productModel, $thumbnail)
    {
        // delete thumbnail
        $this->remove_thumbnail_storage($productModel);

        // save new thumbnail
        $resize = Image::make($thumbnail)->resize(300, 300)->encode('png');

        //$resize = Image::make($thumbnail)->encode('png');

        $hash = md5($resize->__toString());

        $path = trans('files.products.view', ['product' => $productModel->id, 'file' => $hash.".png"]);

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

    public function remove_thumbnail_storage(ProductModel $productModel)
    {
        $this->storage->delete($productModel->thumbnail);
    }
}