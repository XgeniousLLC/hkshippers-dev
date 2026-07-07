<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Advertisement;
use App\Appointment;
use App\ContactInfoItem;
use App\Course;
use App\CoursesCategory;
use App\Donation;
use App\DonationLogs;
use App\EventAttendance;
use App\EventPaymentLogs;
use App\Events;
use App\EventsCategory;
use App\Facades\InstagramFeed;
use App\Faq;
use App\Feedback;
use App\Helpers\LanguageHelper;
use App\Helpers\NexelitHelpers;
use App\ImageGallery;
use App\ImageGalleryCategory;
use App\JobApplicant;
use App\Jobs;
use App\JobsCategory;
use App\Knowledgebase;
use App\KnowledgebaseTopic;
use App\Language;
use App\Mail\AdminResetEmail;
use App\Mail\CallBack;
use App\Mail\ContactMessage;
use App\Mail\PlaceOrder;
use App\Mail\RequestQuote;
use App\Member;
use App\Post;
use App\PostCategory;
use App\Menu;
use App\Newsletter;
use App\Order;
use App\ApplicationForm;
use App\Page;
use App\PaymentLogs;
use App\ProductCategory;
use App\ProductOrder;
use App\ProductRatings;
use App\Products;
use App\ProductShipping;
use App\ProductSubCategory;
use App\Quote;
use App\ServiceCategory;
use App\Services;
use App\Blog;
use App\BlogCategory;
use App\Brand;
use App\HeaderSlider;
use App\KeyFeatures;
use App\PricePlan;
use App\StaticOption;
use App\TeamMember;
use App\User;
use App\Counterup;
use App\Testimonial;
use App\VideoGallery;
use App\Works;
use App\WorksCategory;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Svg\Tag\Image;
use Symfony\Component\Process\Process;
use App\Helpers\HomePageStaticSettings;
use App\Mail\EventApplication;
use App\Mail\ContactUs;
use App\Mail\JoinUs;
class _FrontendController extends Controller
{

    public function index()
    {
        // 1) Auto-publish posts that have a publish_at <= now() but are still draft
        Post::where('status', 'draft')
            ->whereNotNull('publish_at')
            ->where('publish_at', '<=', now())
            ->update(['status' => 'publish']);

        // 2) Run your normal front-end logic
        $lang = LanguageHelper::user_lang_slug();
        
        $all_news = Post::where([
                'lang' => $lang, 
                'status' => 'publish',
                'type' => 'what-new'
            ])
            ->orderBy('seq_no', 'asc')
            ->orderby('publish_at','desc')
            ->orderBy('created_at', 'desc')
            ->take(4)->get();

        $all_news2 = Post::where([
                'lang' => $lang, 
                'status' => 'publish',
                'type' => 'from-the-council'
            ])
            ->orderBy('seq_no', 'asc')
            ->orderby('publish_at','desc')
            ->orderBy('created_at', 'desc')
            ->take(4)->get();
            
        $all_news3 = Post::where([
                'lang' => $lang, 
                'status' => 'publish',
                'type' => 'project-info'
            ])
            ->orderBy('seq_no', 'asc')
            ->orderby('publish_at','desc')
            ->orderBy('created_at', 'desc')
            ->take(4)->get();

        $all_biz_links = Post::where([
                'lang' => $lang, 
                'status' => 'publish',
                'type' => 'biz-links'
            ])
            ->orderBy('seq_no', 'asc')
            ->orderBy('id', 'desc')
            ->take(4)->get();

        $all_events = Events::where([
                'status' => 'publish',
                'type' => 'councils-events'
            ])
            ->orderBy('seq_no', 'asc')
            ->orderBy('id', 'desc')
            ->take(4)->get();

        $all_events2 = Post::where([
                'status' => 'publish',
                'type' => 'industry-events'
            ])
            ->orderBy('seq_no', 'asc')
            ->orderBy('id', 'desc')
            ->take(4)->get();

        $all_publications = Post::where([
                'status' => 'publish',
                'type' => 'reference-book'
            ])
            ->orderBy('seq_no', 'asc')
            ->orderBy('id', 'desc')
            ->take(4)->get();

        $top_banner = Post::where([
                'lang' => $lang, 
                'status' => 'publish',
                'type' => 'advert-images',
                'location' => 1
            ])
            ->orderBy('seq_no', 'asc')
            ->orderBy('id', 'desc')
            ->take(100)->get();

        $top2_banner = Post::where([
                'lang' => $lang, 
                'status' => 'publish',
                'type' => 'advert-images',
                'location' => 5
            ])
            ->orderBy('seq_no', 'asc')
            ->orderBy('id', 'desc')
            ->take(100)->get();

        $left_banners = Post::where([
                'lang' => $lang, 
                'status' => 'publish',
                'type' => 'advert-images',
                'location' => 4
            ])
            ->orderBy('seq_no', 'asc')
            ->orderBy('id', 'desc')
            ->take(100)->get();

        $right_banners = Post::where([
                'lang' => $lang, 
                'status' => 'publish',
                'type' => 'advert-images',
                'location' => 2
            ])
            ->orderBy('seq_no', 'asc')
            ->orderBy('id', 'desc')
            ->take(100)->get();

        $bottom_banners = Post::where([
                'lang' => $lang, 
                'status' => 'publish',
                'type' => 'advert-images',
                'location' => 3
            ])
            ->orderBy('seq_no', 'asc')
            ->orderBy('id', 'desc')
            ->take(100)->get();

        $page_setting = Post::where([
                'lang' => $lang, 
                'status' => 'publish',
                'type' => 'page-setting',
                'type2' => 'home'
            ])
            ->orderBy('seq_no', 'asc')
            ->orderBy('id', 'desc')
            ->first();
        
        $blade_data = [
            'all_news'        => $all_news,
            'all_news2'       => $all_news2,
            'all_news3'       => $all_news3,
            'all_biz_links'   => $all_biz_links,
            'all_events'      => $all_events,
            'all_events2'     => $all_events2,
            'all_publications'=> $all_publications,
            'top_banner'      => $top_banner,
            'top2_banner'     => $top2_banner,
            'left_banners'    => $left_banners,
            'right_banners'   => $right_banners,
            'bottom_banners'  => $bottom_banners,
            'page_setting'    => $page_setting,
            'bg_img_ids'      => [434],
            'bg_img_id2'      => 434,
        ];

        return view('_frontend.home')->with($blade_data);
    }

    public function page(Request $request,$type)
    {
        $lang = LanguageHelper::user_lang_slug();
        $item = null;
        $items = null;
        $flag = null;
        $_type = null;
        $page_setting = Post::where(['lang' => $lang, 'status' => 'publish','type'=>'page-setting','type2'=>$type])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->first();
        $arr = [
            'project-background'=>[
                'title'=>'Project Background',
                'view'=>'_frontend.page.project-background',
            ],
            'council-background'=>[
                'title'=>'Council Background',
                'view'=>'_frontend.page.council-background',
            ],
            'chairman-message'=>[
                'title'=>"Chairman's Message",
                'view'=>'_frontend.page.page1',
            ],
            'council-service-activities'=>[
                'title'=>"Council Services & Activities",
                'view'=>'_frontend.page.page1',
            ],
            'internatioinal-representation'=>[
                'title'=>"International Representation",
                'view'=>'_frontend.page.page1',
            ],
            'activity'=>[
                'title'=>"Activity",
                'view'=>'_frontend.page.page1',
            ],
            'logisitcs-mission-speaking-occasions'=>[
                'title'=>"Logisitcs Mission & Speaking Occasions",
                'view'=>'_frontend.page.page1',
            ],
            'annual-report'=>[
                'title'=>"Annual Report",
                'view'=>'_frontend.page.page1',
            ],
            'honorary-chairman'=>[
                'title'=>"Honorary Chairman",
                'view'=>'_frontend.page.chairman',
            ],
            'chairman'=>[
                'title'=>"Chairman",
                'view'=>'_frontend.page.chairman',
            ],
            'executive-committee'=>[
                'title'=>"Executive Committee",
                'view'=>'_frontend.page.executive-committee',
            ],
            'specialised-sub-committee'=>[
                'title'=>"Specialised Sub-Committee",
                'view'=>'_frontend.page.specialised-sub-committee',
            ],
            'founders-ordinary-members'=>[
                'title'=>"Founders' and Ordinary Members",
                'view'=>'_frontend.page.founders',
            ],
            'associate-members'=>[
                'title'=>"Associate Members",
                'view'=>'_frontend.page.founders',
            ],
            'shippers-today'=>[
                'title'=>"Shippers Today",
                'view'=>'_frontend.page.publications',
            ],
            'reference-book'=>[
                'title'=>"Reference Books",
                'view'=>'_frontend.page.reference-book',
            ],
            'annual-review'=>[
                'title'=>"Annual Review",
                'view'=>'_frontend.page.publications',
            ],
            'councils-events'=>[
                'title'=>"Councils Events",
                'view'=>'_frontend.page.councils-events',
            ],
            'industry-events'=>[
                'title'=>"Industry Events",
                'view'=>'_frontend.page.links-page',
            ],
            
            'what-new'=>[
                'title'=>"News",
                'view'=>'_frontend.page.post-list',
            ],
            'from-the-council'=>[
                'title'=>"From The Council",
                'view'=>'_frontend.page.post-list',
            ],
            'project-info'=>[
                'title'=>"Project",
                'view'=>'_frontend.page.post-list1',
            ],
            'from-the-council'=>[
                'title'=>"From The Council",
                'view'=>'_frontend.page.post-list',
            ],
            'news-chairman-message'=>[
                'title'=>"Chairman's Message",
                'view'=>'_frontend.page.news-chairman-message',
            ],
            
            'news-chairman-message-past-issue'=>[
                'title'=>"Chairman's Message",
                'view'=>'_frontend.page.news-chairman-message-past-issue',
            ],
            'statistics'=>[
                'title'=>"Statistics",
                'view'=>'_frontend.page.statistics',
            ],
            'shipping-charges'=>[
                'title'=>"Shipping Charges",
                'view'=>'_frontend.page.shipping-charges',
            ],
            
            'shipping-alert'=>[
                'title'=>"Shipping Alert",
                'view'=>'_frontend.page.statistics',
            ],
            'biz-links'=>[
                'title'=>"Biz Links",
                'view'=>'_frontend.page.links-page',
            ],
            'shipping-and-logistics'=>[
                'title'=>"Shipping and Logistics",
                'view'=>'_frontend.page.links-page',
            ],
            'economic-indicator'=>[
                'title'=>"Economic Indicator",
                'view'=>'_frontend.page.links-page',
            ],
            'trade-economic-outlook'=>[
                'title'=>"Trade Economic Outlook",
                'view'=>'_frontend.page.links-page',
            ],
            'study-report'=>[
                'title'=>"Study Report",
                'view'=>'_frontend.page.links-page',
            ],
            'survey-report'=>[
                'title'=>"Survey Report",
                'view'=>'_frontend.page.links-page',
            ],
            'other-useful-information'=>[
                'title'=>"Other Useful Information",
                'view'=>'_frontend.page.links-page',
            ],
        ];
        switch($type){
            case 'council-service-activities':

            case 'chairman-message':
            case 'council-background':
                $item = Post::where(['lang' => $lang, 'status' => 'publish','type'=>$type])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->first();
                $title = $arr[$type]['title'];
                $view = $arr[$type]['view'];
                $routes = ['About Council',$title];
                return SELF::_page([
                    'item' => $item,
                    'title' => $title,
                    'routes' => $routes,
                    'page_setting' => $page_setting,
                    
                ],$view);
                break;
            case 'councils-events':
                
                $items = Events::where(['status' => 'publish','type'=>$type])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->get();
                $title = $arr[$type]['title'];
                $view = $arr[$type]['view'];
                $routes = ['Events',$title];
                return SELF::_page([
                    'items' => $items,
                    'title' => $title,
                    'routes' => $routes,
                    'page_setting' => $page_setting,
                    
                ],$view);
                break;
            case 'industry-events':
                
                $items = Post::where([ 'lang' => $lang,'status' => 'publish','type'=>$type])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->get();
                $title = $arr[$type]['title'];
                $view = $arr[$type]['view'];
                $routes = ['Events',$title];
                return SELF::_page([
                    'items' => $items,
                    'title' => $title,
                    'routes' => $routes,
                    'page_setting' => $page_setting,
                    
                ],$view);
                break;

            case 'news-chairman-message':
                $item = Post::where([ 'lang' => $lang,'status' => 'publish','type'=>$type])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->first();
                $title = $arr[$type]['title'];
                $view = $arr[$type]['view'];
                $routes = ['News',$title];
                return SELF::_page([
                    'item' => $item,
                    'title' => $title,
                    'routes' => $routes,
                    'page_setting' => $page_setting,
                    
                ],$view);
                break;
            case 'news-chairman-message-past-issue':
            case 'from-the-council':
            case 'what-new':
                
                $items = Post::where([ 'lang' => $lang,'status' => 'publish','type'=>$type])->orderBy('seq_no', 'asc')->orderby('publish_at','desc')->orderBy('created_at', 'desc')->paginate(12);
                $title = $arr[$type]['title'];
                $view = $arr[$type]['view'];
                $routes = ["What's News",$title];
                return SELF::_page([
                    'items' => $items,
                    'title' => $title,
                    'routes' => $routes,
                    'pages' => $request->pages,
                    'page_setting' => $page_setting,
                    
                ],$view);
                break;
            case 'project-info':
                
                $items = Post::where([ 'lang' => $lang,'status' => 'publish','type'=>$type])->orderBy('seq_no', 'asc')->orderby('publish_at','desc')->orderBy('created_at', 'desc')->paginate(12);
                $title = $arr[$type]['title'];
                $view = $arr[$type]['view'];
                $routes = ["Events",$title];
                return SELF::_page([
                    'items' => $items,
                    'title' => $title,
                    'routes' => $routes,
                    'pages' => $request->pages,
                    'page_setting' => $page_setting,
                    
                ],$view);
                break;
            case 'shipping-charges':
                $info = Post::where(['lang' => $lang, 'status' => 'publish','type'=>$type.'-information'])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->first();
                $cats = PostCategory::where([ 'lang' => $lang,'status' => 'publish','type'=>$type])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->get();

                $items = [];
                foreach($cats as $cat){
                    $items[$cat->id] = Post::where([ 'lang' => $lang,'status' => 'publish','type'=>$type,'post_categories_id'=>$cat->id])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->get();

                }
                $title = $arr[$type]['title'];
                $view = $arr[$type]['view'];
                $routes = [$title];
                return SELF::_page([
                    'info' => $info,
                    'cats' => $cats,
                    'items' => $items,
                    'title' => $title,
                    'routes' => $routes,
                    'page_setting' => $page_setting,
                    
                ],$view);
                break;
            case 'shipping-alert':

            case 'statistics':
                $info = Post::where(['lang' => $lang, 'status' => 'publish','type'=>$type.'-information'])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->first();
                $cats = PostCategory::where([ 'lang' => $lang,'status' => 'publish','type'=>$type])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->get();

                $items = [];
                foreach($cats as $cat){
                    $items[$cat->id] = Post::where([ 'lang' => $lang,'status' => 'publish','type'=>$type,'post_categories_id'=>$cat->id])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->get();

                }
                $title = $arr[$type]['title'];
                $view = $arr[$type]['view'];
                $routes = [$title];
                return SELF::_page([
                    'cats' => $cats,
                    'info' => $info,
                    'items' => $items,
                    'title' => $title,
                    'routes' => $routes,
                    'page_setting' => $page_setting,
                    
                ],$view);
                break;
            case 'shipping-and-logistics':
            case 'economic-indicator':
            case 'trade-economic-outlook':

            case 'study-report':
            case 'survey-report':
            case 'other-useful-information':

                $items = Post::where([ 'lang' => $lang,'status' => 'publish','type'=>$type])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->get();
                $title = $arr[$type]['title'];
                $view = $arr[$type]['view'];
                $routes = ['Market Information',$title];
                return SELF::_page([
                    'items' => $items,
                    'title' => $title,
                    'routes' => $routes,
                    'page_setting' => $page_setting,
                    
                ],$view);
                break;
            case 'biz-links':
                
                $items = Post::where([ 'lang' => $lang,'status' => 'publish','type'=>$type])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->get();
                $title = $arr[$type]['title'];
                $view = $arr[$type]['view'];
                $routes = [$title];
                return SELF::_page([
                    'items' => $items,
                    'title' => $title,
                    'routes' => $routes,
                    'page_setting' => $page_setting,
                    
                ],$view);
                break;
            case 'shippers-today':
            case 'reference-book':
            case 'annual-review':
                $items = Post::where([ 'status' => 'publish','type'=>$type])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->get();
                $title = $arr[$type]['title'];
                $view = $arr[$type]['view'];
                $routes = ['Publications',$title];
                return SELF::_page([
                    'items' => $items,
                    'title' => $title,
                    'routes' => $routes,
                    'page_setting' => $page_setting,
                    
                ],$view);
                break;
            case 'chairman':
                $flag = $flag??1;
                $_type = $_type??'honorary-chairman';
            case 'honorary-chairman':
                $items = Member::where(['lang' => $lang, 'status' => 'publish','type'=>$_type??$type,'type_chairman'=>$flag??2])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->get();
                $title = $arr[$type]['title'];
                $view = $arr[$type]['view'];
                $routes = ['Members',$title];
                return SELF::_page([
                    'items' => $items,
                    'title' => $title,
                    'routes' => $routes,
                    'page_setting' => $page_setting,
                    
                ],$view);
                break;
            case 'executive-committee':
                for($i=1;$i<=5;$i++){
                    
                    $items[$i] = Member::where(['lang' => $lang, 'status' => 'publish','type'=>$type,'type_chairman'=>$i])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->get();
                }
                $title = $arr[$type]['title'];
                $view = $arr[$type]['view'];
                $routes = ['Members',$title];
                return SELF::_page([
                    'items' => $items??[],
                    'title' => $title,
                    'routes' => $routes,
                    'page_setting' => $page_setting,
                    
                ],$view);
                break;
                
            case 'associate-members':
                $_type = $_type??'associate-members';
            case 'founders-ordinary-members':
                $info = Post::where(['lang' => $lang, 'status' => 'publish','type'=>'member-information'])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->first();
                $items = Member::where(['lang' => $lang, 'status' => 'publish','type'=>$_type??$type])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->get();
                $title = $arr[$type]['title'];
                $view = $arr[$type]['view'];
                $routes = ['Members',$title];
                return SELF::_page([
                    'items' => $items,
                    'info' => $info,
                    'title' => $title,
                    'routes' => $routes,
                    'page_setting' => $page_setting,
                    
                ],$view);
                break;
            case 'specialised-sub-committee':
                $items = Member::where(['lang' => $lang, 'status' => 'publish','type'=>$type])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->get();
                $title = $arr[$type]['title'];
                $view = $arr[$type]['view'];
                $routes = ['Members',$title];
                return SELF::_page([
                    'items' => $items,
                    'title' => $title,
                    'routes' => $routes,
                    'page_setting' => $page_setting,
                    
                ],$view);
                break;
            case 'annual-report':
            case 'activity':
            case 'logisitcs-mission-speaking-occasions':
            case 'internatioinal-representation':
                
                $item = Post::where(['lang' => $lang, 'status' => 'publish','type'=>$type])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->first();
                $attachment = get_attachment_image_by_id($item->attachment,null,false);
                if(!empty($attachment)){
                    return redirect($attachment['img_url']);

                }elseif($item->video_url){
                    return redirect($item->video_url);
                    
                    
                }else{
                    
                    $title = $arr[$type]['title'];
                    $view = $arr[$type]['view'];
                    $routes = ['About Council',$title];
                    return SELF::_page([
                        'item' => $item,
                        'title' => $title,
                        'routes' => $routes,
                        'page_setting' => $page_setting,
                        
                    ],$view);
                }
                break;
            default:

                return response()->view('frontend.pages.404');
                break;
        }
        
        return response()->view('frontend.pages.404');
        

    }
    
    public function form_page($type,$id='')
    {
        $lang = LanguageHelper::user_lang_slug();
        $item = null;
        $items = null;
        $flag = null;
        $_type = null;
        $page_setting = Post::where(['lang' => $lang, 'status' => 'publish','type'=>'page-setting','type2'=>$type])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->first();
        $image = null;
        $info = null;
        $arr = [
           
            'books'=>[
                'title'=>"Reference Books",
                'view'=>'_frontend.page.form',
                'form'=>'_frontend.page.form.books',

            ],
            'councils-events'=>[
                'title'=>"Councils Events",
                'view'=>'_frontend.page.form',
                'form'=>'_frontend.page.form.councils-events',
            ], 
            'contact-us'=>[
                'title'=>"Contact Us",
                'view'=>'_frontend.page.contact-us',
                'form'=>'_frontend.page.form.contact-us',
            ],
            'join-us'=>[
                'title'=>"Join Us",
                'view'=>'_frontend.page.form',
                'form'=>'_frontend.page.form.join-us',
            ],
        ];
        switch($type){
            case 'councils-events':
                $data = Events::where(['type'=>'councils-events','status' => 'publish'])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->get();

                $title = $arr[$type]['title'];
                $view = $arr[$type]['view'];
                $form = $arr[$type]['form'];
                $routes = ['Events',$title];
                return SELF::_page([
                    'item' => $item,
                    'title' => $title,
                    'routes' => $routes,
                    'form' => $form,
                    'data' => $data,
                    'id' => $id,
                    'page_setting' => $page_setting,
                    
                ],$view);
                break;
            
            case 'books':
                $data = Post::where(['type'=>'reference-book','status' => 'publish'])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->get();

                $title = $arr[$type]['title'];
                $view = $arr[$type]['view'];
                $form = $arr[$type]['form'];
                $routes = ['Publications',$title];
                return SELF::_page([
                    'item' => $item,
                    'title' => $title,
                    'routes' => $routes,
                    'form' => $form,
                    'data' => $data,
                    'page_setting' => $page_setting,
                    
                ],$view);
                break;
            case 'join-us':
                $info = Post::where(['lang' => $lang, 'status' => 'publish','type'=>'join-us-information'])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->first();

                $rs_image = Post::where(['type'=>'join-us-image','status' => 'publish'])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->first();
                $_image = @get_attachment_image_by_id($rs_image->image,null,false);
                $image = @$_image['img_url'];
            case 'contact-us':

                $title = $arr[$type]['title'];
                $view = $arr[$type]['view'];
                $form = $arr[$type]['form'];
                $routes = [$title];
                return SELF::_page([
                    'item' => $item,
                    'image' => $image,
                    'title' => $title,
                    'form' => $form,
                    'info' => $info,
                    'routes' => $routes,
                    'page_setting' => $page_setting,
                    
                ],$view);
                break;
                
        }
        

    }
    
    public function form_page_post(Request $request, $type, $id = '')
    {
        \Log::info('Form submission started', ['type' => $type, 'id' => $id]);

        try {
            // Step 1: Validate the request
            $this->validate($request, ApplicationFormController::getValidator());
            \Log::info('Validation successful', ['data' => $request->all()]);
        } catch (\Exception $e) {
            \Log::error('Validation failed', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['msg' => __('Validation failed. Please check your input and try again.')]);
        }

        $valid = true;
        $msg = '';

        // Step 2: CAPTCHA validation
        if ($request->captcha) {
            $valid = $this->check_img_captcha($request);
            if (!$valid) {
                $msg = __('Incorrect verification code.');
                \Log::warning('CAPTCHA validation failed');
            }
        } else {
            $valid = false;
            $msg = __('CAPTCHA is required.');
            \Log::warning('CAPTCHA not provided');
        }

        // Step 3: Prepare form data
        $obj = [
            'name' => $request->name,
            'position' => $request->position,
            'company' => $request->company,
            'tel' => $request->tel,
            'type' => $type,
            'address' => $request->address,
            'email' => $request->email,
            'fax' => $request->fax,
            'post_id' => $request->post_id,
            'event_id' => $request->event_id,
            'qty' => $request->qty,
            'remark' => $request->remark,
            'guest' => $request->guest,
            'company_chi' => $request->company_chi,
            'website' => $request->website,
            'nature_of_business' => $request->nature_of_business,
            'representative_name' => $request->representative_name,
            'representative_name_chi' => $request->representative_name_chi,
            'representative_position' => $request->representative_position,
            'representative_tel' => $request->representative_tel,
            'representative_mobile' => $request->representative_mobile,
            'representative_email' => $request->representative_email,
            'form_type' => $request->form_type,
        ];
        \Log::info('Form data prepared', ['data' => $obj]);

        $mail_args = null;
        $mail_class = null;

        // Step 4: Handle specific form types
        switch ($type) {
            case 'councils-events':
                $item = Events::find($id);
                if (!empty($item)) {
                    $obj['form_type'] = $item->form_type;
                    $obj['event_id'] = $item->id;
                    $mail_class = EventApplication::class;

                    $template = Post::where(['status' => 'publish', 'type' => 'email-templates', 'type2' => 'councils-events'])
                        ->orderBy('seq_no', 'asc')
                        ->orderBy('id', 'desc')
                        ->first();

                    if (!empty($template)) {
                        $subject = EventsController::replace($template->title, $item, $obj);
                        $mail_args = [
                            'email' => $request->email,
                            'event_id' => $item->id,
                            'app' => $obj,
                            'subject' => $subject,
                        ];
                    }
                } else {
                    $valid = false;
                    $msg = __('Councils Events not found.');
                    \Log::error('Event not found', ['type' => $type, 'id' => $id]);
                }
                break;

            case 'join-us':
                $item = $obj;
                if (!empty($item)) {
                    $mail_class = JoinUs::class;

                    $template = Post::where(['status' => 'publish', 'type' => 'email-templates', 'type2' => $type])
                        ->orderBy('seq_no', 'asc')
                        ->orderBy('id', 'desc')
                        ->first();

                    if (!empty($template)) {
                        $subject = ApplicationFormController::replace($template->title, $item);
                        $mail_args = [
                            'email' => $request->email,
                            'subject' => $subject,
                            'item' => $item,
                        ];
                    }
                } else {
                    $valid = false;
                    \Log::error('Join-us item is empty');
                }
                break;

            case 'contact-us':
                $item = $obj;
                if (!empty($item)) {
                    $mail_class = ContactUs::class;

                    $template = Post::where(['status' => 'publish', 'type' => 'email-templates', 'type2' => $type])
                        ->orderBy('seq_no', 'asc')
                        ->orderBy('id', 'desc')
                        ->first();

                    if (!empty($template)) {
                        $subject = ApplicationFormController::replace($template->title, $item);
                        $mail_args = [
                            'email' => $request->email,
                            'subject' => $subject,
                            'item' => $item,
                        ];
                    }
                } else {
                    $valid = false;
                    \Log::error('Contact-us item is empty');
                }
                break;

            default:
                $valid = false;
                $msg = __('Invalid form type.');
                \Log::error('Invalid form type', ['type' => $type]);
                break;
        }

        // Step 5: Process the form submission
        if ($valid) {
            try {
                ApplicationForm::create($obj);
                \Log::info('Form data saved successfully', ['data' => $obj]);

                if ($mail_args && $mail_class) {
                    $this->mail($mail_args, $mail_class);
                    \Log::info('Mail sent successfully', ['mail_args' => $mail_args]);
                }

                return redirect()->back()->with(['msg' => __('New Item Created Success...'), 'result' => 'success']);
            } catch (\Exception $e) {
                \Log::error('Form submission failed', ['error' => $e->getMessage()]);
                return redirect()->back()->withErrors(['msg' => __('An error occurred while processing your request. Please try again later.')]);
            }
        } else {
            \Log::warning('Form submission invalid', ['message' => $msg]);
            return redirect()->back()->withErrors(['msg' => $msg]);
        }
    }


    public function event_page($id)
    {
        $lang = LanguageHelper::user_lang_slug();

        // Try fetching the event with 'councils-events' type first
        $item = Events::where([
            'status' => 'publish',
            'type' => 'councils-events',
            'id' => $id
        ])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->first();

        // If still not found, return 404
        if (!$item) {
            return response()->view('frontend.pages.404');
        }

        // Set title and page settings based on the item type
        $type = $item->type;
        $title = 'Councils Events';

        $page_setting = Post::where([
            'lang' => $lang,
            'status' => 'publish',
            'type' => 'page-setting',
            'type2' => $type
        ])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->first();

        $view = '_frontend.page.event-page'; // Default view
        $routes = ['Events', $title];

        // Render the page with the appropriate data
        return self::_page([
            'item' => $item,
            'page_setting' => $page_setting,
            'title' => $title,
            'routes' => $routes,
        ], $view);
    }

    public function post_page($type, $id)
    {
        $lang = LanguageHelper::user_lang_slug();

        // Allow only valid types, including the new 'project-info'
        if (!in_array($type, ['what-new', 'from-the-council', 'project-info'])) {
            return response()->view('frontend.pages.404');
        }

        // Define titles for each type
        $titles = [
            'what-new' => "News",
            'from-the-council' => 'From The Council',
            'project-info' => 'Project'
        ];

        // Fetch the post item by type and ID
        $item = Post::where([
            'status' => 'publish',
            'type' => $type,
            'id' => $id
        ])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->first();

        // Fetch the page settings based on the type
        $page_setting = Post::where([
            'lang' => $lang,
            'status' => 'publish',
            'type' => 'page-setting',
            'type2' => $type
        ])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->first();

        // If the post item is found, render the page
        if ($item) {
            $title = $titles[$type] ?? "What's News";
            $view = '_frontend.page.post-page';
            $routes = ["What's News", $titles[$type] ?? ''];

            return self::_page([
                'item' => $item,
                'title' => $title,
                'routes' => $routes,
                'page_setting' => $page_setting,
            ], $view);
        } else {
            // If no item is found, return a 404 page
            return response()->view('frontend.pages.404');
        }
    }

    public function img_captcha(){
        header("Cache-Control: no-store,no-cache, must-revalidate");
        header("Content-type: image/png");
        
        $width = 130;
        $height = 30;
        $font_size = 20;
        $chars_length = 4;
        $captcha_characters = "0123456789";
        $font = "./verdana.ttf";
        $font = dirname(__FILE__) . '/verdana.ttf';
        $image = imagecreatetruecolor($width, $height);
        $bg_color = imagecolorallocate($image, 0, 0, 255);
        $font_color = imagecolorallocate($image, 255, 255, 255);
        imagefilledrectangle($image, 0, 0, $width, $height, $bg_color);
        //background random-line
        $vert_line = round($width/5);
        $color = imagecolorallocate($image, 255, 255, 255);
        for($i = 0; $i < $vert_line; $i++) {
            imageline($image, rand(0,$width), rand(0,$height), rand(0,$height), rand(0,$width), $color);
        }
        
        $xw = ($width/$chars_length);
        $x = 0;
        $font_gap = $xw/2-$font_size/2;
        $token = '';
        for($i = 0; $i < $chars_length; $i++) {
            $letter = $captcha_characters[rand(0, strlen($captcha_characters)-1)];
            $token .= $letter;
            $x = ($i == 0 ? 0 : $xw * $i);
            imagettftext($image, $font_size, rand(-20,20), $x+$font_gap, rand(25, $height-5), $font_color, $font, $letter);
        }
        Session::put('img_number',$token);

        //imagestring($image, 5, rand(1, 7), rand(1, 7),  $token, $font_color);

        Imagepng($image);
        imagedestroy($image);
        

    }
    public function check_img_captcha(Request $request){
        $num = Session::get('img_number');
        $valid = $request->captcha===$num;
        if ($request->ajax()) {
            return response()->json([
                'success' => $valid?1:0, 
            ], 200);
        }else{
            return $valid;
        }
    }
    public function _page($blade_data,$view){
        $blade_data = array_replace([
            
            'bg_img_ids' => [434],
            
        ],$blade_data);
        
        return view($view)->with($blade_data);

    }
    public function lang_change(Request $request)
    {
        
        session()->put('lang', $request->lang);
        return redirect()->back();
    }

    public function mail($args,$mail_class){
        
        

        $res_data = [
            'msg' => __('Mail Send Success'),
            'type' => 'success'
        ];
        $cc = explode("\n",get_static_option('site_email_cc'));
        if(sizeof($cc)===1){
            $cc = $cc[0];
        }elseif(sizeof($cc)===0){
            $cc = null;
        }
        if(!$cc){
            $cc = null;
        }
        try{
            Mail::to($args['email'])->cc($cc)->send(new $mail_class($args));
        }catch (\Exception $e){
            return $e->getMessage();
            return redirect()->back()->with(NexelitHelpers::item_delete($e->getMessage()));
        }
        return $res_data;
        return redirect()->back()->with($res_data);
    }
}//end class
