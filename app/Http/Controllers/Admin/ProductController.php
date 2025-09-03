<?php

namespace App\Http\Controllers\Admin;

use App\Enums\isDefault;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductStoreRequest;
use App\Http\Requests\Admin\ProductUpdateRequest;
use App\Models\Category;
use App\Models\File;
use App\Models\Product;
use App\Models\ProductImage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $title = 'لیست محصولات';

        $products = Product::query()
            ->with([
                'category',
                'defaultImage'
            ])
            ->orderByDesc('created_at')
            ->applySearch()
            ->applySort()
            ->paginate()
            ->withQueryString();

        return view('admin.products.index',compact('title','products'));
    }

    public function create()
    {
        $title = 'ایجاد محصول';

        $categories = Category::query()
            ->select([
                'id',
                'name'
            ])
            ->get();

        return view('admin.products.create' , compact('title','categories'));
    }

    public function store(ProductStoreRequest $request)
    {
        $inputs = $request->only([
            'name',
            'name_en',
            'price',
            'category_id',
            'discount',
            'qty',
            'description',
        ]);

        try {
            $products = Product::create($inputs);

            if($request->hasFile('images')){
                $defaultUsed = false;
                foreach ($request->file('images') as $image){
                    //save to desk
                    $fileName = $products->id.'_'. strtotime('now').' . '. $image->extension();
                    $path = 'product_images';
                    $updatePath = $image->storeAs($path,$fileName);

                    //store file image table
                    $file = File::create([
                        'name'=>$fileName,
                        'extension'=>$image->extension(),
                        'size' => $image->getSize(),
                        'path' => $updatePath
                    ]);

                    $default = !$defaultUsed;

                    ProductImage::create([
                        'product_id' => $products->id,
                        'file_id' => $file->id,
                        'is_default' => $default
                    ]);

                    if ($default){
                        $defaultUsed = true;
                    }

                }
            }


        }catch (Exception $exception){
            Log::error($exception);

            return backWithError();
        }

        return redirect()->route('admin.products.index');
    }

    public function edit(int $productId)
    {
        $title = 'ویرایش محصولات';

        $products =  Product::findOrFail($productId);

        $products->load('images');

        $categories = Category::query()
            ->select([
                'id',
                'name'
            ])
            ->get();

        return view('admin.products.edit',compact('title','products','categories'));
    }

    public function update(ProductUpdateRequest $request, int $productId)
    {
        $products =  Product::findOrFail($productId);

        $inputs = $request->only([
            'name',
            'name_en',
            'price',
            'category_id',
            'discount',
            'qty',
            'description',
        ]);

        try {
            $products->update($inputs);

            if($request->hasFile('images')){
                $defaultUsed = ProductImage::query()
                    ->where('product_id',$products->id)
                    ->where('is_default',isDefault::YES)
                    ->exists();

                foreach ($request->file('images') as $image){
                    //save to desk
                    $fileName = $products->id.'_'. strtotime('now').' . '. $image->extension();
                    $path = 'product_images';
                    $updatePath = $image->storeAs($path,$fileName);

                    //store file image table
                    $file = File::create([
                        'name'=>$fileName,
                        'extension'=>$image->extension(),
                        'size' => $image->getSize(),
                        'path' => $updatePath
                    ]);

                    $default = !$defaultUsed;

                    ProductImage::create([
                        'product_id' => $products->id,
                        'file_id' => $file->id,
                        'is_default' => $default
                    ]);

                    if ($default){
                        $defaultUsed = true;
                    }

                }
            }


        }catch (Exception $exception){
            Log::error($exception);

            return backWithError();
        }

        return redirect()->route('admin.products.index');
    }

    public function removeImage(int $productId, int $imageId)
    {
        $product = Product::findOrFail($productId);

        $image = ProductImage::findOrFail($imageId);

        $file = File::find($image->file_id);

        $image->delete();

        Storage::delete($file->path);

        $file->delete();

        return redirect()->route('admin.products.edit',$product->id);
    }

    public function delete(int $productId)
    {
        $product = Product::findOrFail($productId);

        try {
            $product->delete();
        }catch (Exception $exception){
            Log::error($exception);

            return backWithError();
        }

        return redirect()->route('admin.products.index');
    }


}
