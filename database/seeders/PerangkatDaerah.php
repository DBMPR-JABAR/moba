<?php

namespace Database\Seeders;

use App\Models\PerangkatDaerah as ModelsPerangkatDaerah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PerangkatDaerah extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = File::get('database/data/perangkat_daerah.json');
        $data = json_decode($data);
        foreach ($data as $obj) {
            ModelsPerangkatDaerah::create([
                'name' => $obj->name,
            ]);
        }
    }
}
