<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model 
{
use SoftDeletes;

    protected $table = 'member';
    protected $fillable = [
        'title',
        'lang',
        'status',
        'content',
        'image',
        'user_id',
        'type_chairman',
        'type_member',
        'type_founder',
        'type',
        'seq_no',
        'company',
        'website1',
        'website2',
        'tel1',
        'tel2',
        'fax1',
        'fax2',
        'company_address',
        'email1',
        'email2',
        'name',
        'attachment',
        'stroke',
        'contact_person',
    ];

    
    public function user(){
        return $this->belongsTo('App\Admin','user_id');
    }

    protected $casts = [
      'user_id' => 'integer'
    ];

    
    
}
