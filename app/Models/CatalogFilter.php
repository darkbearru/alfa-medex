<?php

namespace App\Models;

use App\Helpers\StringHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogFilter extends Model
{
    use HasFactory;

    
    /**
     * combineFilterOptions
     * Совмещаем данные в фильтре и параметры товара
     * структура параметров следующая:
     * [
     * "раздел": [опция = значение, ...]
     * ]
     * В фильтре будет выглядеть так
     * [
     * "раздел": [опция = [тип, мин(для чисел), макс(для чисел), список значений(для строк)], ...]
     * ]
     * @param array $options
     * @param array $itemOptions
     * @return array
     */
    public static function combineFilterOptions(array $options, array $itemOptions): array
    {
        $result = [];

        foreach ($itemOptions as $key => $item) {
            $key = StringHelper::ucFirst($key);
            $category = $options[$key] ?? [];

            foreach ($item as $name => $value) {
                $name = StringHelper::ucFirst($name);
                $category[$name]['list'] = $category[$name]['list'] ?? [];

                if (is_string($value)) {
                    $category[$name]['type'] = $category[$name]['type'] ?? CatalogFilterType::String;
                    $category[$name]['list'][] = StringHelper::ucFirst($value);
                    continue;
                }
                if (is_numeric($value)) {
                    $category[$name]['type'] = $category[$name]['type'] ?? CatalogFilterType::Number;
                    $category[$name]['min'] = $category[$name]['min'] ?? $value;
                    $category[$name]['max'] = $category[$name]['max'] ?? 0;
                    if ($value < $category[$name]['min']) $category[$name]['min'] = $value;
                    if ($value > $category[$name]['max']) $category[$name]['max'] = $value;
                    $category[$name]['list'][] = $value;
                    continue;
                }
            }
            $result[$key] = $category;
        }
        return $result;
    }

    public static function sortOptionsList(array $options): array
    {
        foreach ($options as $key => $item) {
            foreach ($item as $name => $value) {
                if (!empty($value['list'])) {
                    sort($value['list'], $value['type'] === CatalogFilterType::String ? SORT_STRING : SORT_NUMERIC);
                }
                $item[$name] = $value;
            }
            $options[$key] = $item;
        }
        return $options;
    }
}

