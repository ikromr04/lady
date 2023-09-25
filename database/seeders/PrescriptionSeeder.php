<?php

namespace Database\Seeders;

use App\Models\Prescription;
use Illuminate\Database\Seeder;

class PrescriptionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $prescriptions = ['OTC', 'RX', 'БАД'];

    foreach ($prescriptions as $prescription) {
      Prescription::create([
        'title' => $prescription,
      ]);
    }
  }
}
