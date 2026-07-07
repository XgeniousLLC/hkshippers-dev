<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationForm extends Model
{
    use SoftDeletes;

    protected $table = 'application_form';
    protected $fillable = [
        
        'address',
        'name',
        'position',
        'company',
        'tel',
        'user_id',
        'fax',
        'email',
        'post_id',
        'event_id',
        'form_type',
        'type',
        'qty',
        'remark',
        'guest',
    ];

    
}
