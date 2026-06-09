<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            'Кинематика',
            'Динамика и законы Ньютона',
            'Законы сохранения',
            'Механические колебания и волны',
            'Молекулярная физика и термодинамика',
            'Электричество и магнетизм',
            'Оптика',
            'Квантовая физика',
        ];

        foreach ($sections as $name) {
            Section::query()->firstOrCreate(['name' => $name]);
        }
    }
}
