<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model implements Feedable
{
use SoftDeletes;

    protected $table = 'post';
    protected $fillable = ['title','lang','status','author','slug','meta_description','meta_tags','excerpt','content','tags','image','user_id','breaking_news','video_url','type','seq_no','attachment','is_new','brief','type2','publish_at','post_categories_id','location'];

    public function category(){
        return $this->belongsTo('App\PostCategory','post_categories_id');
    }
    
    public function user(){
        return $this->belongsTo('App\Admin','user_id');
    }

    protected $casts = [
      'breaking_news' => 'integer',
      'user_id' => 'integer'
    ];

    public function toFeedItem() : FeedItem
    {
        return FeedItem::create([
            'id' => $this->id,
            'title' => $this->title,
            'summary' => $this->excerpt,
            'updated' => $this->updated_at,
            'link' => route('frontend.post.single',$this->slug),
            'author' => $this->author,
        ]);
    }

    public static function getAllFeedItems()
    {
        return Post::all();
    }
}
