<?php

namespace App\Http\Controllers;

use App\Actions\SlugChecker;
use App\Post;
use App\BlogCategory;
use App\PostCategory;
use App\Events;
use App\Helpers\SanitizeInput;
use App\Http\Requests\SlugCheckRequest;
use App\Language;
use App\Page;
use App\Services;
use App\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;


class PostController extends Controller
{
    
    const TYPE_EMAIL_TEMPLATES = [
        ['contact-us','Contact Us'],
        ['councils-events','Council Events'],
        ['join-us','Join Us'],

    ];
    const TYPE_SUBCAT = [
        ['air','Air'],
        ['sea','Sea'],
        ['land','Land'],
        ['porttraffic','Port Traffic'],
    ];
    
    const LOCATION = [
        ['1','Top'],
        ['5','Top 2'],
        ['2','Right'],
        ['3','Bottom'],
        ['4','Left'],
    ];
    const DIMENTIONS = [
        '1'=>['1140','195'],
        '2'=>['225','120'],
        '3'=>['1140','195'],
        '4'=>['225','120'],
        '5'=>['1140','195'],
    ];
    const TYPE_PAGE = [
        ['home','Home'],
        ['council-background','About Council > Council Background'],
        ['chairman-message',"About Council > Chairman’s Message"],
        ['council-service-activities','About Council > Council Services & Activities'],
        ['honorary-chairman','Members > Honorary Chairman'],
        ['chairman','Members > Chairman'],
        ['executive-committee','Members > Executive Committee'],
        ['specialised-sub-committee','Members > Specialised Sub-Committee'],
        ['founders-ordinary-members',"Members > Founders' and Ordinary Members"],
        ['associate-members',"Members > Associate Members"],
        ['economic-indicator','Market Information > Economic Indicator'],
        ['trade-economic-outlook','Market Information > Trade Economic Outlook'],
        ['study-report','Market Information > Study Report'],
        ['survey-report','Market Information > Survey Report'],
        ['other-useful-information','Market Information > Other Useful Information'],
        ['councils-events','Events > Councils Events'],
        ['industry-events','Events > Industry Events'],
        ['what-new',"What's News > News"],
        ['from-the-council',"What's News > From The Council"],
        ['project-info',"Project Info"],
        ['statistics','Statistics'],
        ['shipping-charges','Shipping Charges'],
        ['shipping-alert','Shipping Alert'],
        ['biz-links','Biz Links'],
        ['contact-us','Contact Us'],
        ['join-us','Join Us'],
        
    ];
    protected const  TITLES = [
        'council-background'=>'Council Background',
        'chairman-message'=>'Chairman\'s Message',
        'council-service-activities'=>'Council Services & Activities',
        'internatioinal-representation'=>'International Representation',
        'activity'=>'Activity',
        'from-the-council'=>'From The Council',
        'logisitcs-mission-speaking-occasions'=>'Logisitcs Mission & Speaking Occasions',
        'member-information'=>'Member\'s Information',
        'join-us-information'=>'Join Us Information',
        'statistics-information'=>'Statistics Information',
        'shipping-charges-information'=>'Shipping Charges Information',
        'shipping-alert-information'=>'Shipping alert Information',
        'shippers-today'=>'Shippers Today',
        'reference-book'=>'Reference Book',
        'annual-review'=>'Annual Review',
        'industry-events'=>'Industry Events',
        'diesel-discount-project-content'=>'Diesel Discount Project Content', 
        'port-security-charge'=>'Port Security Charge',
        'statistics'=>'Statistics',
        'annual-report'=>'Annual Report',
        'shipping-charges'=>'Shipping Charges',
        'what-new'=>'News',
        'project-info'=>'Project Info',
        'news-chairman-message'=>'Chairman\'s Message',
        'news-chairman-message-past-issue'=>'Past Issue',
        'biz-china'=>'Biz China',
        'biz-china-past-issue'=>'Past Issue',
        'advert-images'=>'Advert Images',
        'biz-links'=>'Biz Links',
        'disclaimer'=>'Disclaimer',
        'page-setting'=>'Page Settings',
        'shipping-and-logistics'=>'Shipping and Logistics',
        'economic-indicator'=>'Economic Indicator',
        'trade-economic-outlook'=>'Trade Economic Outlook',
        'study-report'=>'Study Report',
        'survey-report'=>'Survey Report',
        'other-useful-information'=>'Other Useful Information',
        'shipping-alert'=>'Shipping Alert',
        'email-templates'=>'Email Templates',
        
    ];

    protected const  TITLES_TYPE = [
        'statistics'=>'Statistics Type',
        'shipping-charges'=>'Shipping Charges Type',
        'shipping-alert'=>'Shipping Alert Type',


    ];
    protected const  LIST = [
        
        'internatioinal-representation'=>'backend.pages.post.partial.list2',
        'activity'=>'backend.pages.post.partial.list2',
        'annual-report'=>'backend.pages.post.partial.list2',
        'logisitcs-mission-speaking-occasions'=>'backend.pages.post.partial.list2',
        'shippers-today'=>'backend.pages.post.partial.list8',
        'reference-book'=>'backend.pages.post.partial.list8',
        'annual-review'=>'backend.pages.post.partial.list8',
        'industry-events'=>'backend.pages.post.partial.list14',
        'diesel-discount-project-content'=>'backend.pages.post.partial.list4',
        'statistics'=>'backend.pages.post.partial.list5',
        'shipping-charges'=>'backend.pages.post.partial.list6',
        'news-chairman-message'=>'backend.pages.post.partial.list4',
        'news-chairman-message-past-issue'=>'backend.pages.post.partial.list2',
        'biz-china'=>'backend.pages.post.partial.list4',
        'biz-china-past-issue'=>'backend.pages.post.partial.list2',
        'advert-images'=>'backend.pages.post.partial.list7',
        'biz-links'=>'backend.pages.post.partial.list2',
        'disclaimer'=>'backend.pages.post.partial.list2',
        'page-setting'=>'backend.pages.post.partial.list9',
        'what-new'=>'backend.pages.post.partial.list10',
        'from-the-council'=>'backend.pages.post.partial.list10',
        'project-info'=>'backend.pages.post.partial.list15',
        'shipping-and-logistics'=>'backend.pages.post.partial.list2',
        'economic-indicator'=>'backend.pages.post.partial.list2',
        'trade-economic-outlook'=>'backend.pages.post.partial.list2',
        'study-report'=>'backend.pages.post.partial.list2',
        'survey-report'=>'backend.pages.post.partial.list2',
        'other-useful-information'=>'backend.pages.post.partial.list2',

        'shipping-alert'=>'backend.pages.post.partial.list5',
        'email-templates'=>'backend.pages.post.partial.list11',
        'member-information'=>'backend.pages.post.partial.list12',
        'statistics-information'=>'backend.pages.post.partial.list12',
        'join-us-information'=>'backend.pages.post.partial.list12',
        'shipping-charges-information'=>'backend.pages.post.partial.list12',
        'shipping-alert-information'=>'backend.pages.post.partial.list12',
        'join-us-image'=>'backend.pages.post.partial.list13',
        
    ];
    protected const  FORM_NEW = [
        
        'internatioinal-representation'=>'backend.pages.post.partial.new-form2',
        'activity'=>'backend.pages.post.partial.new-form2',
        'annual-report'=>'backend.pages.post.partial.new-form2',
        'logisitcs-mission-speaking-occasions'=>'backend.pages.post.partial.new-form2',
        'shippers-today'=>'backend.pages.post.partial.new-form8',
        'reference-book'=>'backend.pages.post.partial.new-form8',
        'annual-review'=>'backend.pages.post.partial.new-form8',
        'industry-events'=>'backend.pages.post.partial.new-form14',
        'diesel-discount-project-content'=>'backend.pages.post.partial.new-form4',
        'statistics'=>'backend.pages.post.partial.new-form5',
        'shipping-charges'=>'backend.pages.post.partial.new-form6',
        'news-chairman-message'=>'backend.pages.post.partial.new-form4',
        'news-chairman-message-past-issue'=>'backend.pages.post.partial.new-form2',
        'biz-china'=>'backend.pages.post.partial.new-form4',
        'biz-china-past-issue'=>'backend.pages.post.partial.new-form2',
        'advert-images'=>'backend.pages.post.partial.new-form7',
        'biz-links'=>'backend.pages.post.partial.new-form2',
        'disclaimer'=>'backend.pages.post.partial.new-form2',
        'page-setting'=>'backend.pages.post.partial.new-form9',
        'what-new'=>'backend.pages.post.partial.new-form10',
        'from-the-council'=>'backend.pages.post.partial.new-form10',
        'project-info'=>'backend.pages.post.partial.new-form15',
        'shipping-and-logistics'=>'backend.pages.post.partial.new-form2',
        'economic-indicator'=>'backend.pages.post.partial.new-form2',
        'trade-economic-outlook'=>'backend.pages.post.partial.new-form2',
        'study-report'=>'backend.pages.post.partial.new-form2',
        'survey-report'=>'backend.pages.post.partial.new-form2',
        'other-useful-information'=>'backend.pages.post.partial.new-form2',

        'shipping-alert'=>'backend.pages.post.partial.new-form5',
        'email-templates'=>'backend.pages.post.partial.new-form11',
        'member-information'=>'backend.pages.post.partial.new-form12',
        'statistics-information'=>'backend.pages.post.partial.new-form12',
        'join-us-information'=>'backend.pages.post.partial.new-form12',
        'shipping-charges-information'=>'backend.pages.post.partial.new-form12',
        'shipping-alert-information'=>'backend.pages.post.partial.new-form12',
        'join-us-image'=>'backend.pages.post.partial.new-form13',
        
    ];
    protected const  FORM_EDIT = [
        
        'internatioinal-representation'=>'backend.pages.post.partial.edit-form2',
        'activity'=>'backend.pages.post.partial.edit-form2',
        'annual-report'=>'backend.pages.post.partial.edit-form2',
        'logisitcs-mission-speaking-occasions'=>'backend.pages.post.partial.edit-form2',
        'shippers-today'=>'backend.pages.post.partial.edit-form8',
        'reference-book'=>'backend.pages.post.partial.edit-form8',
        'annual-review'=>'backend.pages.post.partial.edit-form8',
        'industry-events'=>'backend.pages.post.partial.edit-form14',
        'diesel-discount-project-content'=>'backend.pages.post.partial.edit-form4',
        'statistics'=>'backend.pages.post.partial.edit-form5',
        'shipping-charges'=>'backend.pages.post.partial.edit-form6',
        'news-chairman-message'=>'backend.pages.post.partial.edit-form4',
        'news-chairman-message-past-issue'=>'backend.pages.post.partial.edit-form2',
        'biz-china'=>'backend.pages.post.partial.edit-form4',
        'biz-china-past-issue'=>'backend.pages.post.partial.edit-form2',
        'advert-images'=>'backend.pages.post.partial.edit-form7',
        'biz-links'=>'backend.pages.post.partial.edit-form2',
        'disclaimer'=>'backend.pages.post.partial.edit-form2',
        'page-setting'=>'backend.pages.post.partial.edit-form9',
        'what-new'=>'backend.pages.post.partial.edit-form10',
        'from-the-council'=>'backend.pages.post.partial.edit-form10',
        'project-info'=>'backend.pages.post.partial.edit-form15',
        'shipping-and-logistics'=>'backend.pages.post.partial.edit-form2',
        'economic-indicator'=>'backend.pages.post.partial.edit-form2',
        'trade-economic-outlook'=>'backend.pages.post.partial.edit-form2',
        'study-report'=>'backend.pages.post.partial.edit-form2',
        'survey-report'=>'backend.pages.post.partial.edit-form2',
        'other-useful-information'=>'backend.pages.post.partial.edit-form2',

        'shipping-alert'=>'backend.pages.post.partial.edit-form5',
        'email-templates'=>'backend.pages.post.partial.edit-form11',
        'member-information'=>'backend.pages.post.partial.edit-form12',
        'statistics-information'=>'backend.pages.post.partial.edit-form12',
        'join-us-information'=>'backend.pages.post.partial.edit-form12',
        'shipping-charges-information'=>'backend.pages.post.partial.edit-form12',
        'shipping-alert-information'=>'backend.pages.post.partial.edit-form12',
        'join-us-image'=>'backend.pages.post.partial.edit-form13',
        
    ];
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index($type){
        $all_post = Post::where([
            'type'=>$type
        ])->orderBy('seq_no', 'asc')->orderby('publish_at','desc')->orderBy('created_at', 'desc')->get()->groupBy('lang');
        $title = '';
        $list = 'backend.pages.post.partial.list1';

        if($type){
            if(isset(SELF::TITLES[$type])){
                $title = SELF::TITLES[$type];
            }
            
            if(isset(SELF::LIST[$type])){
                $list = SELF::LIST[$type];
            }
        }
        
        
        return view('backend.pages.post.index')->with([
            'title' => $title,
            'type' => $type,
            'list' => $list,
            'all_post' => $all_post
        ]);
    }
    public function new_post($type){
        $all_language = Language::all();
        $all_category = PostCategory::where('lang',get_default_language())->where('type',$type)->get();

        $form = 'backend.pages.post.partial.new-form1';

        if($type){
            if(isset(SELF::FORM_NEW[$type])){
                $form = SELF::FORM_NEW[$type];
            }
        }
        return view('backend.pages.post.new')->with([
            'all_category' => $all_category,
            'all_languages' => $all_language,
            'type' => $type,
            'form' => $form

        ]);
    }
    public function store_new_post(Request $request,$type){
        $this->validate($request,[
           'post_content' => 'nullable',
           'seq_no' => 'integer',
           'tags' => 'nullable',
           'excerpt' => 'nullable',
           'title' => 'required',
           'lang' => 'required',
           'status' => 'required',
           'author' => 'nullable',
           'publish_at' => 'nullable|date',
           'brief' => 'nullable',
           'category' => 'nullable',
           'location' => 'nullable',
           'type' => 'nullable',
           'type2' => 'nullable',
           'slug' => 'nullable',
           'video_url' => 'nullable|string',
           'is_new' => 'nullable|string',
           'breaking_news' => 'nullable|string',
           'meta_tags' => 'nullable|string',
           'meta_description' => 'nullable|string',
           'image' => 'nullable|max:191',
           'attachment' => 'nullable|string|max:191',
        ]);
        $category = $request->category??null;
        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->title,$request->lang);

        // figure out status if publish_at is not null
        $status = $request->status; // fallback to the one submitted by the form
        if (!empty($request->publish_at)) {
            // If publish date is now or in the past => publish; else => draft
            $status = now()->gte($request->publish_at) ? 'publish' : 'draft';
        }

        Post::create([
            'slug'          => !empty($request->slug) 
                                ? $request->slug 
                                : Str::slug($request->title, $request->lang),
            'content'       => $request->post_content,
            'seq_no'        => $request->seq_no,
            'type'          => $type,
            'type2'         => $request->type2,
            'tags'          => $request->tags,
            'title'         => $request->title,
            'location'      => $request->location,
            'status'        => $status, // <-- override or set status here
            'meta_tags'     => $request->meta_tags,
            'meta_description' => $request->meta_description,
            'publish_at'    => $request->publish_at,
            'excerpt'       => $request->excerpt,
            'brief'         => $request->brief,
            'lang'          => $request->lang,
            'image'         => is_array($request->image) 
                                ? json_encode($request->image) 
                                : $request->image,
            'attachment'    => $request->attachment,
            'user_id'       => Auth::user()->id,
            'author'        => $request->author,
            'video_url'     => $request->video_url,
            'breaking_news' => !empty($request->breaking_news) ? 1 : 0,
            'is_new'        => !empty($request->is_new) ? 1 : 0,
            'post_categories_id' => $request->category ?? null,
        ]);

        return redirect()->back()->with([
            'msg' => __('New Item Added...'),
            'type' => 'success',
        ]);
    }
    public function clone_post(Request $request)
    {
        $post_details = Post::find($request->item_id);
        Post::create([
            'slug' => $post_details->slug.$request->item_id,
            'content' => $post_details->content,
            'post_categories_id' => $post_details->post_categories_id,
            'location' => $post_details->location,
            'seq_no' => $post_details->seq_no,
            'type' => $post_details->type,
            'tags' => $post_details->tags,
            'title' => $post_details->title,
            'brief' => $post_details->brief,
            'status' => 'draft',
            'meta_tags' => $post_details->meta_tags,
            'meta_description' => $post_details->meta_description,
            'publish_at' => $post_details->publish_at,
            'excerpt' => $post_details->excerpt,
            'lang' => $post_details->lang,
            'image' => $post_details->image,
            'type2' => $post_details->type2,
            'attachment' => $post_details->attachment,
            'video_url' => $post_details->video_url,
            'user_id' =>Auth::user()->id,
            'author' => $post_details->author,
            'breaking_news' => $post_details->breaking_news,
            'is_new' => $post_details->is_new,
        ]);

        return redirect()->back()->with([
            'msg' => __('Item cloned success...'),
            'type' => 'success'
        ]);
    }

    public function edit_post($id){
        $post = Post::find($id);
        
        $all_language = Language::all();
        $all_category = PostCategory::where('lang',$post->lang)->where('type',$post->type)->get();
        
        $form = 'backend.pages.post.partial.edit-form1';

        if($type = $post->type){
            if(isset(SELF::FORM_EDIT[$type])){
                $form = SELF::FORM_EDIT[$type];
            }
        }
        
        return view('backend.pages.post.edit')->with([
            'all_category' => $all_category,
            'form' => $form,
            
            'post' => $post,
            'all_languages' => $all_language,
        ]);
    }
    public function update_post(Request $request,$id){
        $this->validate($request,[
           'category' => 'nullable',
           'post_content' => 'nullable',
           'tags' => 'nullable',
            'excerpt' => 'nullable',
           'brief' => 'nullable',
           'title' => 'required',
            'lang' => 'required',
           'location' => 'nullable',
           'status' => 'required',
           'publish_at' => 'nullable|date',
           'author' => 'nullable',
            'slug' => 'nullable',
            'meta_tags' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'image' => 'nullable|max:191',
            'attachment' => 'nullable|string|max:191',
            'type' => 'nullable',
            'type2' => 'nullable',
            
           'is_new' => 'nullable|string',
           'breaking_news' => 'nullable|string',
        ]);
        $category = $request->category??null;

        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->title,$request->lang);
        
        // figure out status if publish_at is not null
        $status = $request->status; // fallback to what’s in the form
        if (!empty($request->publish_at)) {
            $status = now()->gte($request->publish_at) ? 'publish' : 'draft';
        }

        Post::where('id', $id)->update([
            'slug'            => !empty($request->slug) 
                                    ? $request->slug 
                                    : Str::slug($request->title,$request->lang),
            'post_categories_id' => $request->category ?? null,
            'content'         => $request->post_content,
            'location'        => $request->location,
            'seq_no'          => $request->seq_no,
            'type2'           => $request->type2,
            'publish_at'      => $request->publish_at,
            'brief'           => $request->brief,
            'tags'            => $request->tags,
            'title'           => $request->title,
            'status'          => $status, // <-- override or set status here
            'meta_tags'       => $request->meta_tags,
            'meta_description'=> $request->meta_description,
            'excerpt'         => $request->excerpt,
            'lang'            => $request->lang,
            'video_url'       => $request->video_url,
            'image'           => is_array($request->image) 
                                    ? json_encode($request->image) 
                                    : $request->image,
            'attachment'      => $request->attachment,
            'user_id'         => Auth::user()->id,
            'author'          => $request->author,
            'breaking_news'   => !empty($request->breaking_news) ? 1 : 0,
            'is_new'          => !empty($request->is_new) ? 1 : 0,
        ]);

        return redirect()->back()->with([
            'msg' => __('Item updated...'),
            'type' => 'success',
        ]);
    }
    public function delete_post(Request $request,$id){
        Post::find($id)->delete();

        return redirect()->back()->with([
            'msg' => __('Item Delete Success...'),
            'type' => 'danger'
        ]);
    }
    
    public function category($type){
        $all_category = PostCategory::where([
            'type'=>$type
        ])->get()->groupBy('lang');
        $all_language = Language::all();
        $title = '';
        if($type){
            if(isset(SELF::TITLES_TYPE[$type])){
                $title = SELF::TITLES_TYPE[$type];
            }
            
            
        }
        
        return view('backend.pages.post.category')->with([
            'all_category' => $all_category,
            'type' => $type,
            'title' => $title,
            'all_languages' => $all_language
        ]);
    }
    public function new_category(Request $request,$type){
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'seq_no' => 'integer',
            'lang' => 'required|string|max:191',
            'status' => 'required|string|max:191',
            'image' => 'nullable|string|max:191'
        ]);
        $obj = array_replace($request->all(),['type'=>$type]);
        PostCategory::create($obj);
        
        return redirect()->back()->with([
            'msg' => __('New Item Added...'),
            'type' => 'success'
        ]);
    }

    public function update_category(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'seq_no' => 'integer',
            'lang' => 'required|string|max:191',
            'status' => 'required|string|max:191',
            'image' => 'nullable|string|max:191'
        ]);

        PostCategory::find($request->id)->update([
            'seq_no' => $request->seq_no,
            'name' => $request->name,
            'status' => $request->status,
            'lang' => $request->lang,
        ]);

        return redirect()->back()->with([
            'msg' => __('Item Update Success...'),
            'type' => 'success'
        ]);
    }

    public function delete_category(Request $request,$id){
        if (Post::where('post_categories_id',$id)->first()){
            return redirect()->back()->with([
                'msg' => __('You Can Not Delete This Item, It Already Associated With A Post...'),
                'type' => 'danger'
            ]);
        }
        PostCategory::find($id)->delete();
        return redirect()->back()->with([
            'msg' => __('Item Delete Success...'),
            'type' => 'danger'
        ]);
    }

    public function category_bulk_action(Request $request){
        PostCategory::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    
    public function post_page_settings(){
        $all_languages = Language::all();
        return view('backend.pages.post.page-settings.post')->with(['all_languages' => $all_languages]);
    }
    public function post_single_page_settings(){
        $all_languages = Language::all();
        return view('backend.pages.post.page-settings.post-single')->with(['all_languages' => $all_languages]);
    }

    public function update_post_single_page_settings(Request $request){
        $this->validate($request,[
            'post_single_page_recent_post_item' => 'nullable|string|max:191'
        ]);
        $all_languages = Language::all();

        foreach ($all_languages as $lang){
            $this->validate($request, [
                'post_single_page_'.$lang->slug.'_related_post_title' => 'nullable|string',
                'post_single_page_'.$lang->slug.'_share_title' => 'nullable|string',
                'post_single_page_'.$lang->slug.'_category_title' => 'nullable|string',
                'post_single_page_'.$lang->slug.'_recent_post_title' => 'nullable|string',
                'post_single_page_'.$lang->slug.'_tags_title' => 'nullable|string'
            ]);

            $fields = [
                'post_single_page_'.$lang->slug.'_related_post_title',
                'post_single_page_'.$lang->slug.'_share_title',
                'post_single_page_'.$lang->slug.'_category_title',
                'post_single_page_'.$lang->slug.'_recent_post_title',
                'post_single_page_'.$lang->slug.'_tags_title'
            ];

            foreach ($fields as $field){
                update_static_option($field, $request->$field);
            }
        }
        update_static_option('post_single_page_recent_post_item',$request->post_single_page_recent_post_item);

        return redirect()->back()->with([
            'msg' => __('Settings Update Success...'),
            'type' => 'success'
        ]);
    }

    public function update_post_page_settings(Request $request){

        $this->validate($request,[
           'post_page_recent_post_widget_items' => 'nullable|string|max:191',
           'post_page_item' => 'nullable|string|max:191'
        ]);

        $all_languages = Language::all();
        foreach ($all_languages as $lang){
            $this->validate($request, [
                'post_page_'.$lang->slug.'_read_more_btn_text' => 'nullable|string',
            ]);
            $read_more_btn_text = 'post_page_'.$lang->slug.'_read_more_btn_text';
            update_static_option($read_more_btn_text, $request->$read_more_btn_text);
        }

        update_static_option('post_page_item',$request->post_page_item);
        update_static_option('post_page_recent_post_widget_items',$request->post_page_recent_post_widget_items);

        return redirect()->back()->with([
            'msg' => __('Settings Update Success...'),
            'type' => 'success'
        ]);
    }

    public function bulk_action(Request $request){
        Post::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    
    public function Language_by_slug(Request $request,$type){
        $all_category = PostCategory::where('lang',$request->lang)->where('type',$type)->get();

        return response()->json($all_category);
    }
    public function slug_check(SlugCheckRequest $request){
        $user_given_slug = $request->slug;
        $query = Events::Post(['slug' => $user_given_slug]);

        return SlugChecker::Check($request,$query);
    }
}
