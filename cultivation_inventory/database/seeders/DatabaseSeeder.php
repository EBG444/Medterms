<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Item;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // --- Categories ---
        $categories = [
            'Herbs',
            'Pills & Elixirs',
            'Weapons',
            'Artifacts',
            'Beast Materials'
        ];

        $categoryMap = [];
        foreach ($categories as $cat) {
            $category = Category::firstOrCreate(['name' => $cat]);
            $categoryMap[$cat] = $category->id;
        }

        // --- Items ---
        $items = [
            ['name' => 'Spirit Grass', 'description' => 'A common herb that restores minor spiritual energy.', 'quantity' => 50, 'category_id' => $categoryMap['Herbs']],
            ['name' => 'Dragon Blood Ginseng', 'description' => 'Rare herb said to extend lifespan and boost qi circulation.', 'quantity' => 5, 'category_id' => $categoryMap['Herbs']],
            ['name' => 'Foundation Establishment Pill', 'description' => 'Helps cultivators break through to next realm.', 'quantity' => 10, 'category_id' => $categoryMap['Pills & Elixirs']],
            ['name' => 'Rejuvenation Elixir', 'description' => 'Restores vitality and heals internal injuries.', 'quantity' => 20, 'category_id' => $categoryMap['Pills & Elixirs']],
            ['name' => 'Azure Cloud Sword', 'description' => 'Lightweight spiritual sword favored by sword cultivators.', 'quantity' => 3, 'category_id' => $categoryMap['Weapons']],
            ['name' => 'Crimson Flame Spear', 'description' => 'Fiery spear imbued with beast core essence.', 'quantity' => 2, 'category_id' => $categoryMap['Weapons']],
            ['name' => 'Heavenly Jade Pendant', 'description' => 'Protective artifact that blocks fatal strikes once.', 'quantity' => 1, 'category_id' => $categoryMap['Artifacts']],
            ['name' => 'Spirit Beast Core', 'description' => 'Core from a slain spirit beast, used in crafting artifacts.', 'quantity' => 8, 'category_id' => $categoryMap['Beast Materials']],
            ['name' => 'Phoenix Feather', 'description' => 'Rare material radiating fire energy, useful for forging.', 'quantity' => 1, 'category_id' => $categoryMap['Beast Materials']],
        ];

        foreach ($items as $item) {
            Item::firstOrCreate(['name' => $item['name']], $item);
        }
    }
}
