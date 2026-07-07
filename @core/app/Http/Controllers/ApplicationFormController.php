<?php

namespace App\Http\Controllers;

use App\Actions\SlugChecker;
use App\Events;
use App\EventPaymentLogs;
use App\ApplicationForm;
use App\EventsCategory;
use App\Facades\EmailTemplate;
use App\Helpers\LanguageHelper;
use App\Helpers\NexelitHelpers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SlugCheckRequest;
use App\JobApplicant;
use App\Post;
use App\Mail\BasicMail;
use App\Mail\OrderReply;
use App\Mail\PaymentSuccess;
use App\Order;
use App\Works;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ApplicationFormController extends Controller
{

    const TYPE_FORM = [
        ['5.1.2','On-line Zoom'],
        ['5.1.3','In-Person'],
        ['5.1.4','On-line Zoom & In-Person'],
        ['5.1.1','Councils Events'],
    ];
    
    protected const VALIDATOR = [
        'name' => 'nullable|string|max:191',
        'position' => 'nullable|string|max:191',
        'company' => 'nullable|string|max:191',
        'tel' => 'nullable|string',
        'fax' => 'nullable|string',
        'email' => 'nullable|email',
        'post_id' => 'nullable',
        'event_id' => 'nullable',
        
        'form_type' => 'nullable',
        'qty' => 'nullable|integer',
        'remark' => 'nullable',
        'guest' => 'nullable',
        'company_chi' => 'nullable',
        'website' => 'nullable',
        'nature_of_business' => 'nullable',
        'representative_name' => 'nullable',
        'representative_name_chi' => 'nullable',
        'representative_position' => 'nullable',
        'representative_tel' => 'nullable',
        'representative_mobile' => 'nullable',
        'representative_email' => 'nullable|email',
        
    ];
    
    protected const  TITLES = [
        'books'=>'Books',
        'councils-events'=>'Councils Events',
        'contact-us'=>'Contact Us',
        'join-us'=>'Join Us',
        
    ];
    protected const  LIST = [
        'councils-events'=>'backend.pages.application-form.partial.list2',
        'contact-us'=>'backend.pages.application-form.partial.list3',
        'join-us'=>'backend.pages.application-form.partial.list4',
        
        
    ];
    protected const  FORM_NEW = [
        'councils-events'=>'backend.pages.application-form.partial.new-form2',
        'contact-us'=>'backend.pages.application-form.partial.new-form3',
        'join-us'=>'backend.pages.application-form.partial.new-form4',
        
        
    ];
    protected const  FORM_EDIT = [
        'councils-events'=>'backend.pages.application-form.partial.edit-form2',
        'contact-us'=>'backend.pages.application-form.partial.edit-form3',
        'join-us'=>'backend.pages.application-form.partial.edit-form4',
        
        
    ];
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public static function getValidator()
    {
        return SELF::VALIDATOR;
    }
    public function new($type){
        
        $form = 'backend.pages.application-form.partial.new-form1';
        $data = [];
        if($type){
            if(isset(SELF::FORM_NEW[$type])){
                $form = SELF::FORM_NEW[$type];
            }
            $data = SELF::form_data($type);
        }
        return view('backend.pages.application-form.new')->with([
            'type' => $type,
            'form' => $form,
            'data'=>$data

        ]);
    }

    public function store_new(Request $request,$type){
        $this->validate($request,SELF::VALIDATOR);
        

        ApplicationForm::create([
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
            'user_id' => Auth::user()->id,
            
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
        ]);

        return redirect()->back()->with(['msg' => __('New Item Created Success...'),'type'=>'success']);
    }

    public function index($type){

        
        $all = ApplicationForm::where([
            'type'=>$type
        ])->orderby('id','desc')->get();
        $title = '';
        $list = 'backend.pages.application-form.partial.list1';

        if($type){
            if(isset(SELF::TITLES[$type])){
                $title = SELF::TITLES[$type];
            }
            
            if(isset(SELF::LIST[$type])){
                $list = SELF::LIST[$type];
            }

        }
        
        
        return view('backend.pages.application-form.index')->with([
            'title' => $title,
            'type' => $type,
            'list' => $list,
            'all' => $all
        ]);

    }

    public function edit($id){
        
        $item = ApplicationForm::find($id);
        $form = 'backend.pages.application-form.partial.edit-form1';
        $data = [];
        if($type = $item->type){
            if(isset(SELF::FORM_EDIT[$type])){
                $form = SELF::FORM_EDIT[$type];
            }
            $data = SELF::form_data($type);

        }
        return view('backend.pages.application-form.edit')->with([
            'data' => $data,
            'form' => $form,
            
            'item' => $item,
        ]);
        
        
    }

    public function delete(Request $request,$id){
        ApplicationForm::find($id)->delete();
        return redirect()->back()->with(['msg' => __('Item Delete Success...'),'type'=>'danger']);
    }

    public function update(Request $request){
        $this->validate($request,SELF::VALIDATOR);

        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->title,$request->lang);

        ApplicationForm::find($request->id)->update([
            
            'name' => $request->name,
            'position' => $request->position,
            'company' => $request->company,
            'tel' => $request->tel,
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
        ]);

        return redirect()->back()->with(['msg' => __('Item Update Success...'),'type'=>'success']);
    }

    
    public function bulk_action(Request $request){
        ApplicationForm::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    
    

    public function slug_check(SlugCheckRequest $request){

        $user_given_slug = $request->slug;
        $query = ApplicationForm::where(['slug' => $user_given_slug]);

        return SlugChecker::Check($request,$query);
    }
    public function form_data($type){
        $data = [];
        switch($type){
            case 'books':
                $data = Post::where('type','reference-book')->get();
                break;
            case 'councils-events':
                $data = Events::where('type','councils-events')->get();

                break;
        }

        return $data;
    }
    
    static public function replace($str,$item){
        preg_match_all('/\[[a-zA-Z\s0-9:\-]+\]/',$str,$matches);
        $arr = [
            'your message'=>'remark',
            'whatsapp'=>'fax',
            'company-eng'=>'company',
            'company-chi'=>'company_chi',
            'nature of business'=>'nature_of_business',
            'representative:name-eng'=>'representative_name',
            'representative:name-chi'=>'representative_name_chi',
            'representative:position'=>'representative_position',
            'representative:tel'=>'representative_tel',
            'representative:mobile'=>'representative_mobile',
            'representative:email'=>'representative_email',

        ];
        foreach($matches[0] as $m){
            $_m = strtolower(preg_replace('/[\[\]]/','',$m));
            if(isset($arr[$_m])){
                $_m = $arr[$_m];

            }
            if(@$item[$_m]){
                $str = str_replace($m,$item[$_m],$str);
            }else{
                $str = str_replace($m,'',$str);

            }
        }
        return $str;
    }
}
