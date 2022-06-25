<?php

namespace Database\Seeders;

use App\Models\Catalog;
use App\Models\CatalogData;
use Illuminate\Database\Seeder;
use JetBrains\PhpStorm\NoReturn;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    // [todo]: Сделать генерацию таблицы с фильтрами на основе данных товаров
    #[NoReturn] public function run(): void
    {
        $recs = Catalog::factory(5)->create(['parent_id' => 0])->toArray();
        // Генерим детей и получаем список ID последеней ветви к которой привязываем товары
        $children = $this->createCatalogChildren($recs, 0, 2);

        // Теперь генерим список товаров
        $this->createCatalogData($children, 20, 40);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }


    /**
     * createCatalogChildren
     * Создаём потомков в каждому элементу корневого дерева,
     * кол-во создаваемых потомков зависит от кол-во элементов + random (0-5)
     * @param array $recs
     * @param int $level
     * @param int $maxLevel
     * @return array
     */
    private function createCatalogChildren(array $recs, int $level = 0, int $maxLevel = 2): array
    {
        $_result = [];
        $_cnt = count($recs);
        foreach ($recs as $idx => $rec) {
            $children = Catalog::factory(count($recs) + rand(0, 5))->create(['parent_id' => $rec['id']])->toArray();
            if ($level < $maxLevel) {
                $_res = $this->createCatalogChildren($children, $level + 1, $maxLevel);
            } else {
                // Мы на максимальном уровне, и нам нужно выдрать только id
                $_res = array_map(fn($item) => $item['id'], $children);
            }
            if (!empty($_res)) {
                $_result = array_merge($_result, $_res);
            }
        }
        return $_result;
    }

    private function createCatalogData(array $catalog, int $min = 5, int $max = 30): void
    {
        foreach ($catalog as $parent) {
            CatalogData::factory(rand($min, $max))->create(['catalog_id' => $parent]);
        }
    }
}
