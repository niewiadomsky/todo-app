<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected static function booted(): void
    {
        static::deleted(function (Category $category) {
            $category->tasks()->update(['category_id' => null]);
        });
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
