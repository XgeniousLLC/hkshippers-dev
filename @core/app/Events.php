<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Helpers\LanguageHelper;

use App\EventMeta as Meta;
class Events extends Model
{
    use SoftDeletes;

    protected $table = 'events';
    protected $fillable = [
        'title','status','lang','date',
        'image','time','cost','available_tickets','organizer',
        'organizer_email','organizer_phone','slug','organizer_website',
        'venue','venue_location','venue_phone','content','category_id','meta_description',
        'meta_tags',
        'description',
        'speaker',
        'language',
        'form_type',
        'limit_online',
        'limit_in_person',
        'seq_no',
        'attachment',
        'fee',
        'type',
        'icon',
        'apply_url',
        'banner_image',
    ];
    public function meta($name){
        return @Meta::where('event_id',$this->id)->where('name',$name)->first();

    }
    public function getAttribute($key){
        $except = ['id'];
        if(!in_array($key,$except)){
            $_key = $key;
            if(strpos($key,'-')===false){
                $lang = LanguageHelper::user_lang_slug();

                $_key = "$key-$lang";
            }else{
                $key = explode('-',$_key)[0];
            }
            $meta = $this->meta($_key);
            if(!empty($meta)){
                return $meta->value;
            }else{

            }
        }
        return parent::getAttribute($key);
    }
    public function category(){
        return $this->hasOne('App\EventsCategory','id','category_id');
    }
}
