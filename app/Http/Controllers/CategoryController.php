<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    try {
      return Category::latest()->get();
    } catch (\Throwable $th) {
      return response([
        'message' => 'Не удалось найти данные',
        'error' => $th,
      ]);
    }
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    try {
      $category = Category::create(['title' => $request->title]);

      return response([
        'category' => $category,
        'message' => 'Категория успешно добавлена'
      ], 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function show(Category $category)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function edit(Category $category)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Category $category)
  {
    $category = Category::find(request('id'));
    $category->title = request('title');

    try {
      $category->update();

      return response([
        'category' => $category,
        'message' => 'Категория успешно сохранена',
      ], 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function destroy(Category $category)
  {
    try {
      $products = Product::where('category_id', request('id'))->get();

      foreach ($products as $product) {
        $product->category_id = '';
        $product->update();
      }

      Category::find(request('id'))->delete();

      return response(['message' => 'Категория удалена'], 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }
}
