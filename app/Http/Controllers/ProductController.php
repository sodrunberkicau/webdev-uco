<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->validate([
                'name' => ['required'],
                'description' => [],
                'price' => ['required', 'numeric', 'min:0'],
                'images' => ['required'],
                'images.*' => [File::image()->max(5 * 1024)]
            ]);

            $product = new Product();
            $product->name = $data['name'];
            $product->description = $data['description'];
            $product->price = $data['price'];
            $product->image = $data['images'];
            $product->save();

            if ($request->hasFile('images')) {
                $imageName = $product->id . "." . $request->file('images')->extension();
                $request->file('images')->move('storage/product', $imageName);

                        
                $product->image = $imageName;
                $product->save();

                return redirect()->route('catalog', ['id' => $product->id]);
            }


            return back()->withInput();
        }

        return view('product.form');
    }

    function edit(string $id, Request $request)
    {

        $product = Product::where('id', $id)->first();

        // Gate::authorize('edit_product', $product);

        if ($request->isMethod('post')) {
            $data = $request->validate([
                'name' => ['required'],
                'description' => [],
                'price' => ['required', 'numeric', 'min:0'],
            ]);

            if ($product->update($data)) {
                if ($request->has('images')) {
                    foreach ($request->file('images') as $file) {
                        $extension = $file->getClientOriginalExtension();
                        $filename = uniqid() . '.' . $extension;

                        $file->move('storage/product', $filename);

                        ProductImage::create([
                            'product_id' => $product->id,
                            'name' => $filename
                        ]);
                    }
                }

                return redirect()->route('route:catalog', ['id' => $product->id]);
            }

            return back()->withInput();
        }

        return view('product.form', [
            'product' => $product
        ]);
    }

    public function index()
    {

        $viewData = [];

        $products = Product::get();
        $products->each(function($data) {            
            $data->image = "https://dummyimage.com/600x400/000/fff";
        });

        $viewData["products"] = $products;


        // dd($viewData[0]);
        
        return view('product.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData["title"] = $product['name'] . " - Online Store";
        $viewData["subtitle"] = $product['name'] . " - Product information";
        $viewData["product"] = $product;
        return view('product.show')->with("viewData", $viewData);
    }
}
