<?php

namespace Database\Seeders;

use App\Models\Catalog;
use App\Models\CatalogData;
use App\Models\CatalogFilter;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use JetBrains\PhpStorm\NoReturn;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    #[NoReturn] public function run(): void
    {
        $recs = Catalog::factory(5)->create(['parent_id' => 0])->toArray();
        // Генерим детей и получаем список ID последней ветви к которой привязываем товары
        $this->createCatalogChildren($recs, 0, 2);


        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Алексей Абраменко',
            'email' => 'a.abramenko@chita.ru',
            'password' => Hash::make('12345'),
            'policy' => User::$USER_RIGHT__SUPER_ADMIN
        ]);

        User::factory()->create([
            'name' => 'Черкасов Антон',
            'email' => 'bitmap@bitmap.ru',
            'password' => Hash::make('12345'),
            'policy' => User::$USER_RIGHT__ADMINISTRATOR
        ]);
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => Hash::make('12345')
        ]);
    }


    /**
     * createCatalogChildren
     * Создаём потомков в каждому элементу корневого дерева,
     * кол-во создаваемых потомков зависит от кол-во элементов + random (0-5)
     * @param array $recs
     * @param int $level
     * @param int $maxLevel
     * @return void
     */
    private function createCatalogChildren(array $recs, int $level = 0, int $maxLevel = 2): void
    {
        $_result = [];
        $_cnt = count($recs);
        foreach ($recs as $idx => $rec) {
            $children = Catalog::factory(count($recs) + rand(0, 5))->create(['parent_id' => $rec['id']])->toArray();
            if ($level < $maxLevel) {
                $this->createCatalogChildren($children, $level + 1, $maxLevel);
            } else {
                // Создаём товары
                $this->createCatalogData($children, 20, 40);
            }
        }
    }

    private function createCatalogData(array $catalog, int $min = 5, int $max = 30): void
    {
        foreach ($catalog as $parent) {
            $goods = CatalogData::factory(rand($min, $max))->create(['catalog_id' => $parent['id']])->toArray();
            $this->createCatalogFilter($parent['id'], $goods);
        }
    }

    public function createCatalogFilter(int $parent, array $goods): void
    {
        // Логика работы, проходимся по списку товаров раздела, вытаскивая их параметры
        // Из строковых формируется список, из числовых диапазон
        // На данных Фабрик только так, в дальнейшем возможны расширения
        $options = [];
        foreach ($goods as $item) {
            if (is_string($item['options'])) {
                $item['options'] = json_decode($item['options'], true);
            }
            $options = CatalogFilter::combineFilterOptions($options, $item['options']);
        }
        $options = CatalogFilter::sortOptionsList($options);
        CatalogFilter::factory(1)->create([
            'catalog_id' => $parent,
            'options' => json_encode($options, JSON_UNESCAPED_UNICODE)
        ]);
    }

}
