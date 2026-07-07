<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostCategory extends Model
{
    use SoftDeletes;
    protected $table ='post_categories';
    protected $fillable = ['name','lang','status','type','seq_no'];
}
