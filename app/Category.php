<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;	// Подключаем хэлпер для генерации поля slug

class Category extends Model
{
    //
    protected $fillable = ['title', 'slug', 'parent_id', 'published', 'created_by', 'modified_by'];

    //Mutators для преобразования значения полей и записей в базу
    public function setSlugAttribute($value) {

    	$this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');

    }

    public function children() {

    	return $this->hasMany(self::class, 'parent_id');

    }

    public function articles() {

    	return $this->morphedByMany('App\Article', 'categoryable');

    }

    public function scopeLastCategories () {
    	return $query->orderBy('created_at', 'desc')->take($count)->get();
    }

}
