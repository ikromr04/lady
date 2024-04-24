<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Prescription;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

  public function ae(Request $request)
  {
    Mail::send('emails.ae-send', [
      'initials' => $request->inititals,
      'age' => $request->age,
      'weight' => $request->weight,
      'hight' => $request->hight,
      'event' => $request->event,
      'suspect' => $request->suspect,
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
    ], function ($message) {
      $message->to('drugsafety@evolet.co.uk');
      $message->subject('Сообщение о жалобе на продукт');
    });

    return back();
  }
}
