<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    try {
      return Tag::latest()->get();
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
      $tag = Tag::create(['title' => $request->title]);

      return response([
        'tag' => $tag,
        'message' => 'Тег успешно добавлен',
      ], 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Tag  $tag
   * @return \Illuminate\Http\Response
   */
  public function show(Tag $tag)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Tag  $tag
   * @return \Illuminate\Http\Response
   */
  public function edit(Tag $tag)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Tag  $tag
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Tag $tag)
  {
    $tag = Tag::find(request('id'));
    $tag->title = request('title');
    $tag->shown = request('shown');

    try {
      $tag->update();

      return response([
        'tag' => $tag,
        'message' => 'Тег успешно сохранен',
      ], 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Tag  $tag
   * @return \Illuminate\Http\Response
   */
  public function destroy(Tag $tag)
  {
    try {
      $tag = Tag::find(request('id'));
      $tag->products()->detach();
      $tag->delete();

      return response(['message' => 'Тег удален'], 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }
}
