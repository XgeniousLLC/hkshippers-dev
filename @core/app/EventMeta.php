<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventMeta extends Model
{
    use SoftDeletes;

    protected $table = 'event_meta';
    protected $fillable = ['event_id','name','value'];
}
