<?php

namespace Modules\Page\Entities;

use Modules\Page\Database\factories\PageFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'order',
    ];

    protected $casts = [
        'content' => 'array',
    ];

    protected static function newFactory()
    {
        return PageFactory::new ();
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
