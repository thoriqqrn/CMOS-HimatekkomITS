<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class InformationCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    protected static function booted(): void
    {
        static::saving(function (InformationCategory $category) {
            if (blank($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    public function informationBoards(): BelongsToMany
    {
        return $this->belongsToMany(InformationBoard::class, 'information_board_category');
    }
}
