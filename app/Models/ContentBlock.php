<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ContentBlock extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'type', 'content', 'settings',
        'is_active', 'order', 'blockable_type', 'blockable_id',
    ];

    protected $casts = [
        'settings' => 'array',
        'is_active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (ContentBlock $block) {
            if (empty($block->slug)) {
                $block->slug = Str::slug($block->title);
            }
        });
    }

    public function blockable()
    {
        return $this->morphTo();
    }
}
