<?php

namespace Database\Seeders;

use App\Models\Sertifikat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SertifikatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        Sertifikat::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'COC',
            'COO',
            'COM',
        ];

        foreach ($data as $value) {
            Sertifikat::insert([
                'name' => $value
            ]);
        }
    }
}
