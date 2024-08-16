<?php

namespace App\CouponApp\BaseCode\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\CouponApp\BaseCode\Interfaces\IModel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @method static \Illuminate\Database\Eloquent\Builder where($column, $operator = null, $value = null)
 * @method static \Illuminate\Database\Eloquent\Builder orWhere($column, $operator = null, $value = null)
 * @method static \Illuminate\Database\Eloquent\Builder whereIn($column, $values)
 * @method static \Illuminate\Database\Eloquent\Builder whereNotIn($column, $values)
 * @method static \Illuminate\Database\Eloquent\Builder whereNull($column)
 * @method static \Illuminate\Database\Eloquent\Builder whereNotNull($column)
 * @method static \Illuminate\Database\Eloquent\Builder whereBetween($column, array $values)
 * @method static \Illuminate\Database\Eloquent\Builder whereNotBetween($column, array $values)
 * @method static \Illuminate\Database\Eloquent\Builder whereDate($column, $operator, $value)
 * @method static \Illuminate\Database\Eloquent\Builder whereDay($column, $operator, $value)
 * @method static \Illuminate\Database\Eloquent\Builder whereMonth($column, $operator, $value)
 * @method static \Illuminate\Database\Eloquent\Builder whereYear($column, $operator, $value)
 * @method static \Illuminate\Database\Eloquent\Builder whereTime($column, $operator, $value)
 * @method static \Illuminate\Database\Eloquent\Builder whereColumn($first, $operator = null, $second = null, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder select($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder addSelect($column)
 * @method static \Illuminate\Database\Eloquent\Builder selectRaw($expression, array $bindings = [])
 * @method static \Illuminate\Database\Eloquent\Builder distinct()
 * @method static \Illuminate\Database\Eloquent\Builder from($table)
 * @method static \Illuminate\Database\Eloquent\Builder join($table, $first, $operator = null, $second = null, $type = 'inner', $where = false)
 * @method static \Illuminate\Database\Eloquent\Builder leftJoin($table, $first, $operator = null, $second = null)
 * @method static \Illuminate\Database\Eloquent\Builder rightJoin($table, $first, $operator = null, $second = null)
 * @method static \Illuminate\Database\Eloquent\Builder crossJoin($table, $first, $operator = null, $second = null)
 * @method static \Illuminate\Database\Eloquent\Builder whereJoin($table, $first, $operator = null, $second = null)
 * @method static \Illuminate\Database\Eloquent\Builder orderBy($column, $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder latest($column = 'created_at')
 * @method static \Illuminate\Database\Eloquent\Builder oldest($column = 'created_at')
 * @method static \Illuminate\Database\Eloquent\Builder groupBy($groups)
 * @method static \Illuminate\Database\Eloquent\Builder having($column, $operator = null, $value = null, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder orHaving($column, $operator = null, $value = null)
 * @method static \Illuminate\Database\Eloquent\Builder havingRaw($sql, $bindings = [], $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder orHavingRaw($sql, $bindings = [])
 * @method static \Illuminate\Database\Eloquent\Builder skip($value)
 * @method static \Illuminate\Database\Eloquent\Builder offset($value)
 * @method static \Illuminate\Database\Eloquent\Builder take($value)
 * @method static \Illuminate\Database\Eloquent\Builder limit($value)
 * @method static \Illuminate\Database\Eloquent\Builder forPage($page, $perPage = 15)
 * @method static \Illuminate\Database\Eloquent\Builder offsetExists($key)
 * @method static \Illuminate\Database\Eloquent\Builder find($id, $columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder create(array $attributes)
 * @method static \Illuminate\Database\Eloquent\Builder findOrFail($id, $columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder first($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder firstOrFail($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder firstOr($columns = ['*'], \Closure $callback = null)
 * @method static \Illuminate\Database\Eloquent\Builder value($column)
 * @method static \Illuminate\Database\Eloquent\Builder pluck($column, $key = null)
 * @method static \Illuminate\Database\Eloquent\Builder count($columns = '*')
 * @method static \Illuminate\Database\Eloquent\Builder min($column)
 * @method static \Illuminate\Database\Eloquent\Builder max($column)
 * @method static \Illuminate\Database\Eloquent\Builder sum($column)
 * @method static \Illuminate\Database\Eloquent\Builder avg($column)
 * @method static \Illuminate\Database\Eloquent\Builder exists()
 * @method static \Illuminate\Database\Eloquent\Builder doesntExist()
 * @method static \Illuminate\Database\Eloquent\Builder toSql()
 * @method static \Illuminate\Database\Eloquent\Builder findMany($ids, $columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder findOrNew($id, $columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder firstOrCreate(array $attributes, array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder updateOrCreate(array $attributes, array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder insert(array $values)
 * @method static \Illuminate\Database\Eloquent\Builder insertOrIgnore(array $values)
 * @method static \Illuminate\Database\Eloquent\Builder insertGetId(array $values, $sequence = null)
 * @method static \Illuminate\Database\Eloquent\Builder update(array $values)
 * @method static \Illuminate\Database\Eloquent\Builder forceFill(array $values)
 * @method static \Illuminate\Database\Eloquent\Builder fill(array $values)
 * @method static \Illuminate\Database\Eloquent\Builder increment($column, $amount = 1, array $extra = [])
 * @method static \Illuminate\Database\Eloquent\Builder decrement($column, $amount = 1, array $extra = [])
 * @method static \Illuminate\Database\Eloquent\Builder delete()
 * @method static \Illuminate\Database\Eloquent\Builder truncate()
 * @method static \Illuminate\Database\Eloquent\Builder chunk($count, callable $callback)
 * @method static \Illuminate\Database\Eloquent\Builder chunkById($count, callable $callback, $column = 'id', $alias = null)
 * @method static \Illuminate\Database\Eloquent\Builder tap($callback)
 * @method static \Illuminate\Database\Eloquent\Builder when($value, $callback, $default = null)
 * @method static \Illuminate\Database\Eloquent\Builder unless($value, $callback, $default = null)
 * @method static \Illuminate\Database\Eloquent\Builder whenNotEmpty($value, $callback, $default = null)
 * @method static \Illuminate\Database\Eloquent\Builder pipe($callback)
 * @method static \Illuminate\Database\Eloquent\Builder unlessEmpty($value, $callback, $default = null)
 * @method static \Illuminate\Database\Eloquent\Builder unlessNotEmpty($value, $callback, $default = null)
 * @method static \Illuminate\Database\Eloquent\Builder getBindings()
 * @method static \Illuminate\Database\Eloquent\Builder chunkWhile(callable $callback, $count = 1000)
 * @method static \Illuminate\Database\Eloquent\Builder lock($value = true)
 * @method static \Illuminate\Database\Eloquent\Builder lockForUpdate()
 * @method static \Illuminate\Database\Eloquent\Builder sharedLock()
 * @method static \Illuminate\Database\Eloquent\Builder toBase()
 * @method static \Illuminate\Database\Eloquent\Builder useWritePdo()
 * @method static \Illuminate\Database\Eloquent\Builder without($columns)
 * @method static \Illuminate\Database\Eloquent\Builder withoutGlobalScope($scope)
 * @method static \Illuminate\Database\Eloquent\Builder withoutGlobalScopes(array $scopes = null)
 * @method static \Illuminate\Database\Eloquent\Builder withoutTouching()
 * @method static \Illuminate\Database\Eloquent\Builder withoutTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder withoutTimestamps()
 * @method static \Illuminate\Database\Eloquent\Builder with($relations)
 * @method static \Illuminate\Database\Eloquent\Builder withCount($relations)
 * @method static \Illuminate\Database\Eloquent\Builder withGlobalScope($identifier, \Illuminate\Database\Eloquent\Scope $scope)
 * @method static \Illuminate\Database\Eloquent\Builder withGlobalScopes(array $scopes)
 * @method static \Illuminate\Database\Eloquent\Builder withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder withTimestamps()
 * @method static \Illuminate\Database\Eloquent\Builder addBinding($value, $type = 'where')
 * @method static \Illuminate\Database\Eloquent\Builder setBindings(array $bindings, $type = 'where')
 * @method static \Illuminate\Database\Eloquent\Builder mergeBindings(\Illuminate\Database\Query\Builder $query)
 * @method static \Illuminate\Database\Eloquent\Builder joinWhere($table, $first, $operator, $second, $type = 'inner')
 * @method static \Illuminate\Database\Eloquent\Builder leftJoinWhere($table, $first, $operator, $second)
 * @method static \Illuminate\Database\Eloquent\Builder rightJoinWhere($table, $first, $operator, $second)
 * @method static \Illuminate\Database\Eloquent\Builder orWhereColumn($first, $operator = null, $second = null)
 * @method static \Illuminate\Database\Eloquent\Builder orWhereRaw($sql, $bindings = [])
 * @method static \Illuminate\Database\Eloquent\Builder whereRaw($sql, $bindings = [], $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder whereSub($column, $operator, \Closure $callback, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder orWhereSub($column, $operator, \Closure $callback)
 * ... // Add more Eloquent methods here as needed
 *
 *
 * @property mixed $id
 * @property mixed $created_at
 * @property mixed $updated_at
 */
abstract class BaseModel extends Model implements IModel
{

    public function getLogoUrlAttribute()
    {
        if ($this->logo) {
            $path = Storage::url($this->logo); // Get the relative URL
            return url($path); // Prepend the base URL
        }

        return null; // Or return a placeholder image URL if desired
    }

    public function getFormattedTranslationsAttribute()
    {
        $translations = $this->translations()->get();
        $formatted = [];

        foreach ($translations as $translation) {
            if (!isset($formatted[$translation->locale])) {
                $formatted[$translation->locale] = [];
            }
            $formatted[$translation->locale][$translation->column_name] = $translation->value;
        }

        return $formatted;
    }

    function getDefaultListingFields()
    {
        return ['id','title'];
    }

    function getAllowedFilters()
    {
        return [];
    }

    function getAllowedSorts()
    {
        return "id";
    }

    function getDefaultSort()
    {
        return "id";
    }

    function getAllowedIncludes()
    {
        return [''];
    }

    function getDefaultIncludes()
    {
        return [];
    }

    public function scopeCreatedFrom(Builder $query, $date)
    {
        return $query->where(
            'created_at',
            '>=',
            \Carbon\Carbon::parse($date . ' 00:00:00')
        );
    }

    public function scopeCreatedTo(Builder $query, $date)
    {
        return $query->where(
            'created_at',
            '<=',
            Carbon::parse($date . ' 23:59:59')
        );
    }

    public function scopeStartFrom(Builder $query, $date)
    {
        return $query->where(
            'start_at',
            '>=',
            \Carbon\Carbon::parse($date . ' 00:00:00')
        );
    }

    public function scopeStartTo(Builder $query, $date)
    {
        return $query->where(
            'start_at',
            '<=',
            Carbon::parse($date . ' 23:59:59')
        );
    }

    public function scopeEndFrom(Builder $query, $date)
    {
        return $query->where(
            'end_at',
            '>=',
            \Carbon\Carbon::parse($date . ' 00:00:00')
        );
    }

    public function scopeEndTo(Builder $query, $date)
    {
        return $query->where(
            'end_at',
            '<=',
            Carbon::parse($date . ' 23:59:59')
        );
    }

    public function setSlugAttribute(){
        $this->attributes['slug'] = Str::slug($this->title , "-");
    }
}
