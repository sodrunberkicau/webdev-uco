<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
   function index() 
   {
    $viewData = [];

    $products = Product::get();
    $products->each(function($data) {            
        $data->image = "https://dummyimage.com/600x400/000/fff";
    });

    $viewData["products"] = $products;
     return view ('home.index');
   }
}
