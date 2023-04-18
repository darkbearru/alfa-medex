<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Catalog extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['parent'];


    public static function Recs(int $parent = 0, int $perPage = 5)
    {
        return self::byParent($parent)->paginate($perPage);
    }

    public static function Directories(int $parent = 0): array|Collection|null
    {
        return self::TopDirectoryStructure(2, $parent);
        //return self::byParent($parent)->get();
    }

    private static function TopDirectoryStructure(int $deep = 2, int $parent = 0): array
    {
        return DB::select("WITH RECURSIVE T AS (
            SELECT
                id, parent_id, catalogs.name, catalogs.description,
                catalogs.children_count, ARRAY[id] path
            FROM catalogs WHERE parent_id=$parent

            UNION ALL

            SELECT
                catalogs.id, catalogs.parent_id, catalogs.name, catalogs.description,
                catalogs.children_count, T.path || catalogs.id
            FROM T JOIN catalogs
            ON catalogs.parent_id = T.id
            WHERE array_length(path, 1) < $deep)
            TABLE T  ORDER BY parent_id, name");
    }

    public function scopeByParent(Builder $query, int $parent = 0): Builder
    {
        return $query->where('parent_id', $parent);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Catalog::class);
    }


}
