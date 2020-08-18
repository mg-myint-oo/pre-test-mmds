<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'is_published',
        'category_id'
    ];

    public function user() {
        return $this -> belongsTo('App\User');
    }

    public function scopePublicationLogic($query) {
        return $query -> where([
            'is_published' => 'false',
            'user_id' => auth() -> id()
        ]);
    }

    public function category() {
        return $this -> belongsTo(Category::class);
    }

    public function tags() {
        return $this -> belongsToMany(Tag::class);
    }
}
