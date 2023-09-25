<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */

  public function run()
  {
    User::create([
      'login' => 'admin@ladyhealthcare.com',
      'role' => 'admin',
      'password' => bcrypt('aPq7KkXD'),
    ]);

    $this->call([
      TextSeeder::class,
      CategorySeeder::class,
      PrescriptionSeeder::class,
      ProductSeeder::class,
      TagSeeder::class,
    ]);
  }
}
