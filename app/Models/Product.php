<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory, Sluggable;

  protected $guarded = [];

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'title'
      ]
    ];
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function prescription()
  {
    return $this->belongsTo(Prescription::class);
  }

  public function tags()
  {
    return $this->belongsToMany(Tag::class);
  }
}
