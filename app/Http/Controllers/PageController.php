<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Prescription;
use App\Models\Product;
use App\Models\Tag;

class PageController extends Controller
{
  public function home()
  {
    return view('pages.home');
  }

  public function about()
  {
    return view('pages.about');
  }

  public function career()
  {
    return view('pages.career');
  }

  public function products()
  {
    $data['tags'] = Tag::where('shown', true)->get();
    $data['prescriptions'] = Prescription::orderBy('title')->get();
    $data['categories'] = Category::orderBy('title')->get();

    return view('pages.products', compact('data'));
  }

  public function productsSelected($slug)
  {
    $product = Product::where('slug', $slug)->first();
    $product->views++;
    $product->update();

    return view('pages.products-selected', compact('product'));
  }

  public function contacts()
  {
    return view('pages.contacts');
  }

  public function admin()
  {
    return view('admin');
  }
}
