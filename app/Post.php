<?php

namespace App;
use App\Category;
use Kyslik\ColumnSortable\Sortable;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use Sortable;
    protected $table="posts";
    protected $fillable = ["title", "excertpt", "description"];

    public $sortable = ["id", "title", "excertpt", "description"];
    public function postCategory() {
        return $this->belongsTo(Category::class,'category_id', 'id');
    }
}
