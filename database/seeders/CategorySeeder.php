<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $categories = array(
      array('id' => '1', 'title' => 'Аллергология', 'created_at' => '2022-10-19 22:10:47', 'updated_at' => '2022-10-19 22:10:47'),
      array('id' => '2', 'title' => 'Антимикробный препараты', 'created_at' => '2022-10-19 22:10:47', 'updated_at' => '2022-10-19 22:10:47'),
      array('id' => '3', 'title' => 'Витамины и препараты', 'created_at' => '2022-10-19 22:10:47', 'updated_at' => '2022-10-19 22:10:47'),
      array('id' => '4', 'title' => 'Гематология', 'created_at' => '2022-10-19 22:10:47', 'updated_at' => '2022-10-19 22:10:47'),
      array('id' => '5', 'title' => 'Гинекология', 'created_at' => '2022-10-19 22:10:47', 'updated_at' => '2022-10-19 22:10:47'),
      array('id' => '6', 'title' => 'Глюкокортикостероиды', 'created_at' => '2022-10-19 22:10:47', 'updated_at' => '2022-10-19 22:10:47'),
      array('id' => '7', 'title' => 'Дерматология', 'created_at' => '2022-10-19 22:10:47', 'updated_at' => '2022-10-19 22:10:47'),
      array('id' => '8', 'title' => 'Дыхательная система', 'created_at' => '2022-10-19 22:10:47', 'updated_at' => '2022-10-19 22:10:47'),
      array('id' => '9', 'title' => 'Иммунология', 'created_at' => '2022-10-19 22:10:47', 'updated_at' => '2022-10-19 22:10:47'),
      array('id' => '10', 'title' => 'Костно-мышечная система', 'created_at' => '2022-10-19 22:10:47', 'updated_at' => '2022-10-19 22:10:47'),
      array('id' => '11', 'title' => 'Неврология', 'created_at' => '2022-10-19 22:10:47', 'updated_at' => '2022-10-19 22:10:47'),
      array('id' => '12', 'title' => 'НПВП', 'created_at' => '2022-10-29 11:45:50', 'updated_at' => '2022-10-29 11:45:50'),
      array('id' => '13', 'title' => 'Оториноларингология', 'created_at' => '2022-10-29 11:46:04', 'updated_at' => '2022-10-29 11:46:04'),
      array('id' => '14', 'title' => 'Офтальмология', 'created_at' => '2022-10-29 11:46:12', 'updated_at' => '2022-10-29 11:46:12'),
      array('id' => '15', 'title' => 'Паразитология', 'created_at' => '2022-10-29 11:46:20', 'updated_at' => '2022-10-29 11:46:20'),
      array('id' => '16', 'title' => 'Педиатрия', 'created_at' => '2022-10-29 11:46:26', 'updated_at' => '2022-10-29 11:46:26'),
      array('id' => '17', 'title' => 'Пищеварительный тракт и обмен веществ', 'created_at' => '2022-10-29 11:46:36', 'updated_at' => '2022-10-29 11:46:36'),
      array('id' => '18', 'title' => 'Противовирусные препараты', 'created_at' => '2022-10-29 11:46:42', 'updated_at' => '2022-10-29 11:46:42'),
      array('id' => '19', 'title' => 'Противогрибковые препараты', 'created_at' => '2022-10-29 11:46:51', 'updated_at' => '2022-10-29 11:46:51'),
      array('id' => '20', 'title' => 'Сердечно-сосудистая система', 'created_at' => '2022-10-29 11:46:59', 'updated_at' => '2022-10-29 11:46:59'),
      array('id' => '21', 'title' => 'Спазмолитики', 'created_at' => '2022-10-29 11:47:06', 'updated_at' => '2022-10-29 11:47:06'),
      array('id' => '22', 'title' => 'Стоматология', 'created_at' => '2022-10-29 11:47:12', 'updated_at' => '2022-10-29 11:47:12'),
      array('id' => '23', 'title' => 'Урология', 'created_at' => '2022-10-29 11:47:19', 'updated_at' => '2022-10-29 11:47:19'),
      array('id' => '24', 'title' => 'Эндокринология', 'created_at' => '2022-10-29 11:47:27', 'updated_at' => '2022-10-29 11:47:27')
    );

    foreach ($categories as $category) {
      Category::create([
        'title' => $category['title'],
      ]);
    }
  }
}
