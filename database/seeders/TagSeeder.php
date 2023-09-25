<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $tags = ['Витамины', 'Ухо', 'Горло', 'Нос'];

    foreach ($tags as $tag) {
      Tag::create([
        'title' => $tag,
        'shown' => true,
      ]);
    }
  }
}
