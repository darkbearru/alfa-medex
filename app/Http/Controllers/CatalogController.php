<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Database\Eloquent\Collection;

class CatalogController extends Controller
{
    public static function Directories(int $parent = 0): array|Collection|null
    {
        return self::prepareDirectories(
            Catalog::Directories($parent)
        );
    }

    private static function prepareDirectories($recs): array
    {
        $result = [];
        foreach ($recs as $rec) {
            $new_rec = (object)[
                "id" => $rec->id,
                "name" => $rec->name,
                "description" => $rec->description,
                "children_count" => $rec->children_count,
                "children" => []];
            if (empty($result[$rec->parent_id])) {
                $result[$rec->id] ??= $new_rec;
            } else {
                $result[$rec->parent_id]->children[$rec->id] ??= $new_rec;
            }
        }
        return $result;
    }
}
