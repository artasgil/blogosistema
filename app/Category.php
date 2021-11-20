<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Category extends Model
{
    use Sortable;
    protected $table="categories";
    protected $fillable = ["title", "excertpt", "email"];

    public $sortable = ["id", "title", "excertpt", "email"];

    public function categoryPosts() {
        return $this->hasMany('App\Post', 'category_id', 'id');
    }
}
