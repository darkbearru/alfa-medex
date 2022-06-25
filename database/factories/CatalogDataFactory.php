<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CatalogData>
 */
class CatalogDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'catalog_id' => 0,
            'vendor_code' => $this->faker->creditCardNumber(null, true),
            'name' => implode(' ', $this->faker->words(4)),
            'description' => implode(' ', $this->faker->paragraphs(5)),
            'options' => $this->makeFakerOptions(),
            'tags' => $this->makeFakerTags(),
            'media' => 0
        ];
    }


    /**
     * makeFakerOption
     * Создаем случайный объект с параметрами, в формате:
     * [
     * "раздел": [опция = значение, ...]
     * ]
     * @return string
     */
    private function makeFakerOptions(): string
    {
        $result = [
            "Раздел1" => [
                'Параметр Строка 1' => $this->faker->word(),
                'Параметр Число 2' => $this->faker->numberBetween(0, 100),
                'Параметр Строка 3' => $this->faker->name(),
                'Параметр Число 4' => $this->faker->numberBetween(0, 100),
            ],
            "Раздел2" => [
                'Параметр Строка 5' => $this->faker->word(),
                'Параметр Число 6' => $this->faker->numberBetween(100, 200),
                'Параметр Строка 7' => $this->faker->firstName(),
                'Параметр Число 8' => $this->faker->numberBetween(1000, 100000),
                'Параметр Строка 9' => $this->faker->word(),
                'Параметр Число 10' => $this->faker->numberBetween(1000, 100000),
            ],
            "Раздел3" => [
                'Параметр Строка 11' => $this->faker->word(),
                'Параметр Число 12' => $this->faker->numberBetween(0, 100),
                'Параметр Строка 13' => $this->faker->name(),
                'Параметр Число 14' => $this->faker->numberBetween(0, 100),
            ]
        ];

        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    /**
     * @return string
     */
    private function makeFakerTags(): string
    {
        $result = [];
        $cnt = rand(2, 8);
        for ($i = 0; $i < $cnt; $i++) $result[] = $this->faker->word();
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}
