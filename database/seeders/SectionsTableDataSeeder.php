<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionsTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectionFields = [
            ['id' => 1,'name' => 'Movies','slug' => 'movies','description' => 'Movies'],
            ['id' => 2,'name' => 'Politics','slug' => 'politics','description' => 'Politics'],
            ['id' => 3,'name' => 'Lifeandstyle','slug' => 'lifeandstyle','description' => 'Lifeandstyle'],
            ['id' => 4,'name' => 'Sports','slug' => 'Sports1@','description' => 'Sports'],
            ['id' => 5,'name' => 'Entertainment','slug' => 'entertainment#$3','description' => 'Entertainment']
        ];
        foreach ($sectionFields as $sectionField) {
            $section = new Section();
            if ($section->where('id', $sectionField['id'])->count() > 0) {
                $section = $section->where('id', $sectionField['id'])->first();
            }
            $section->fill($sectionField);
            $section->save();
        }
    }
}
