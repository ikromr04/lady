<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return Product::with(['tags', 'category', 'prescription'])->latest()->get();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $slug = SlugService::createSlug(Product::class, 'slug', $request->title);

    $image = '';
    if ($request->has('image')) {
      $file = $request->file('image');
      $fileName = $slug . '.' . $file->extension();
      $file->move(public_path('images/products/'), $fileName);
      $image = 'images/products/' . $fileName;
    }

    $instruction = '';
    if ($request->has('file')) {
      $file = $request->file('file');
      $fileName = $slug . '.' . $file->extension();
      $file->move(public_path('files/products/'), $fileName);
      $instruction = 'files/products/' . $fileName;
    }

    try {
      $product = Product::create([
        'title' => $request->title,
        'slug' => $slug,
        'description' => $request->description,
        'category_id' => $request->category_id,
        'prescription_id' => $request->prescription_id,
        'image' => $image,
        'image_thumb' => $image,
        'file' => $instruction,
        'url' => $request->url,
        'body' => $request->body,
      ]);

      $product->tags()->attach(array_map('intval', explode(',', $request->tags)));

      return response([
        'product' => $product,
        'tags' => $product->tags,
        'message' => 'Препарат успешно добавлен'
      ], 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function show(Product $product)
  {
    return Product::with(['tags', 'category', 'prescription'])->find($product->id);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function edit(Product $product)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Product $product)
  {
    $product = Product::find($request->id);

    if ($request->has('image')) {
      $product->image && file_exists($product->image)
        ? unlink($product->image)
        : '';
      $file = $request->file('image');
      $fileName = $product->slug . '.' . $file->extension();
      $file->move(public_path('images/products/'), $fileName);
      $product->image = 'images/products/' . $fileName;
      $product->image_thumb = 'images/products/' . $fileName;
    }

    if ($request->has('file')) {
      $product->file && file_exists($product->file)
        ? unlink($product->file)
        : '';
      $file = $request->file('file');
      $fileName = $product->slug . '.' . $file->extension();
      $file->move(public_path('files/products/'), $fileName);
      $product->file = 'files/products/' . $fileName;
    }

    $product->title = request('title');
    $product->description = request('description');
    $product->category_id = request('category_id');
    $product->prescription_id = request('prescription_id');
    $product->url = request('url');
    $product->body = request('body');

    $product->tags()->sync(array_map('intval', explode(',', $request->tags)));

    try {
      $product->update();

      return response([
        'product' => $product,
        'tags' => $product->tags,
        'message' => 'Препарат успешно сохранен'
      ], 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function destroy()
  {
    try {
      foreach ((array) request('IDs') as $id) {
        $product = Product::find($id);
        $product->image && file_exists($product->image)
          ? unlink($product->image)
          : '';
        $product->file && file_exists($product->file)
          ? unlink($product->file)
          : '';

        $product->delete();

        $product->tags()->detach();
      }

      return response(['message' => 'Операция прошла успешно.'], 200);
    } catch (\Throwable $th) {
      return response([
        'message' => 'Что то пошло не так попробуйте позже.',
        'error' => $th,
      ], 400);
    }
  }
}
