<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionMethod;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Support\Facades\Schema;

trait GetAllColumns
{
    public function ownAndRelatedModelsFillableColumns(): Collection
    {
        $ownColumns = [
            'model' => class_basename($this),
            'name' => Str::title(Str::replace('_', ' ', $this->getTable())),
            'table_name' => $this->getTable(),
            'columns' => $this->getColumns($this->getTable())
//        'columns' => collect($this->getFillable())->filter(function ($item) {
//                return ((Str::substr($item, -5) !== "ed_at") );
//            })
            ,
        ];

        return $this->relatedModels()->map(function ($model) {
            $modelName = call_user_func([$this, $model])->getRelated();
            return [
                'model' => $model,
                'name' => Str::title(Str::replace('_', ' ', $modelName->getTable())),
                'table_name' => $modelName->getTable(),
                'columns' => $this->getColumns($modelName->getTable())
//                'columns' => collect($modelName->getFillable())->filter(function ($item) {
//                    return ((Str::substr($item, -5) !== "ed_at"));
//                })
                ,
            ];
        })->prepend($ownColumns);
    }

    public function relatedModels(): Collection
    {
        $ref = new ReflectionClass($this);

        return collect($ref->getMethods())
            ->filter(function (ReflectionMethod $reflectionMethod) {
                return in_array($reflectionMethod->getReturnType(), [
                    Relations\BelongsTo::class,
                    Relations\BelongsToMany::class,
                    Relations\HasMany::class,
                    Relations\HasManyThrough::class,
//                    Relations\HasOne::class,
//                    Relations\HasOneThrough::class,
                    Relations\Relation::class,
                ]);
            })
            ->map(function (ReflectionMethod $reflectionMethod) {
                return $reflectionMethod->getName();
            })
            ->values();
    }


    public function getColumns($table): Collection
    {
        $tableColumnInfos = collect(DB::select('SHOW FULL COLUMNS FROM ' . $table));

        $array = $tableColumnInfos->filter(function ($column) {
            return !empty($column->Comment);
        })
            ->map(function ($column) {
                return [$column->Comment => $column->Field];
            })->toArray();

        return collect(array_values($array));
    }
}
