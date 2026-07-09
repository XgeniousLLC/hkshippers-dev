<?php

namespace App\Http\Controllers;

use App\Actions\SlugChecker;
use App\Member;
use App\BlogCategory;
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


class MemberController extends Controller
{
    const TYPE_CHAIRMAN = [
        ['2','Honorary Chairman'],
        ['1','Present Chairman'],
    ];
    
    const TYPE_MEMBER = [
        ['1','Chairman'],
        ['2','Vice Chairman'],
        ['3','Member'],
        ['4','Executive Director'],
        ['5','Secretary'],
    ];
    
    const TYPE_FOUNDER = [
        ['0','Ordinary Member'],
        ['1','Founder'],
    ];
    protected const VALIDATOR = [
        'content' => 'nullable',
        'name' => 'nullable',
        'company' => 'nullable',
        'company_address' => 'nullable',
        'tel1' => 'nullable',
        'tel2' => 'nullable',
        'fax1' => 'nullable',
        'fax2' => 'nullable',
        'email1' => 'nullable',
        'email2' => 'nullable',
        'website1' => 'nullable',
        'website2' => 'nullable',
        'title' => 'nullable',
           'seq_no' => 'integer',
           'lang' => 'required',
        'status' => 'required',
        'image' => 'nullable|string|max:191',
        'attachment' => 'nullable|string|max:191',
        'type' => 'nullable',
        'contact_person' => 'nullable',
        'type_chairman' => 'nullable',
        'type_member' => 'nullable',
        'type_founder' => 'nullable',
        'stroke' => 'nullable|integer',
        
    ];
    public const TITLES = [
        'honorary-chairman'=>'Honorary Chairman',
        'executive-committee'=>'Executive Committee',
        'specialised-sub-committee'=>'Specialised Sub-Committee',
        'founders-ordinary-members'=>'Founders\' and Ordinary Members',
        'associate-members'=>'Associate Members',
    ];
    protected const  LIST = [
        'executive-committee'=>'backend.pages.member.partial.list2',
        'specialised-sub-committee'=>'backend.pages.member.partial.list3',
        'founders-ordinary-members'=>'backend.pages.member.partial.list4',
        'associate-members'=>'backend.pages.member.partial.list5',
        
    ];
    protected const  FORM_NEW = [
        'executive-committee'=>'backend.pages.member.partial.new-form2',
        'specialised-sub-committee'=>'backend.pages.member.partial.new-form3',
        'founders-ordinary-members'=>'backend.pages.member.partial.new-form4',
        'associate-members'=>'backend.pages.member.partial.new-form5',
        
    ];
    protected const  FORM_EDIT = [
        'executive-committee'=>'backend.pages.member.partial.edit-form2',
        'specialised-sub-committee'=>'backend.pages.member.partial.edit-form3',
        'founders-ordinary-members'=>'backend.pages.member.partial.edit-form4',
        'associate-members'=>'backend.pages.member.partial.edit-form5',
        
    ];
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index($type){
        $all = Member::where([
            'type'=>$type
        ])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->get()->groupBy('lang');
        $title = '';
        $list = 'backend.pages.member.partial.list1';

        if($type){
            if(isset(SELF::TITLES[$type])){
                $title = SELF::TITLES[$type];
            }
            
            if(isset(SELF::LIST[$type])){
                $list = SELF::LIST[$type];
            }
        }
        
        
        return view('backend.pages.member.index')->with([
            'title' => $title,
            'type' => $type,
            'list' => $list,
            'all' => $all
        ]);
    }
    public function new($type){
        $all_language = Language::all();
        $form = 'backend.pages.member.partial.new-form1';

        if($type){
            if(isset(SELF::FORM_NEW[$type])){
                $form = SELF::FORM_NEW[$type];
            }
        }
        return view('backend.pages.member.new')->with([
            'all_languages' => $all_language,
            'type' => $type,
            'form' => $form

        ]);
    }
    public function store_new(Request $request,$type){
        $this->validate($request,SELF::VALIDATOR);
        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->title,$request->lang);
        Member::create([

            'content' => $request->content,
            'seq_no' => $request->seq_no,
            'type_member' => $request->type_member,
            'type_chairman' => $request->type_chairman,
            'name' => $request->name,
            'company' => $request->company,
            'type' => $type,
            'title' => $request->title,
            'website1' => $request->website1,
            'website2' => $request->website2,
            'tel1' => $request->tel1,
            'tel2' => $request->tel2,
            'fax1' => $request->fax1,
            'fax2' => $request->fax2,
            'email1' => $request->email1,
            'email2' => $request->email2,
            'company_address' => $request->company_address,
            'type_founder' => $request->type_founder,
            'status' => $request->status,
            'lang' => $request->lang,
            'image' => $request->image,
            'contact_person' => $request->contact_person,
            'attachment' => $request->attachment,
            'stroke' => $request->stroke,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->back()->with([
            'msg' => __('New Item Added...'),
            'type' => 'success'
        ]);
    }
    public function clone(Request $request)
    {
        $details = Member::find($request->item_id);
        Member::create([
            
            'content' => $details->content,
            'seq_no' => $details->seq_no,
            'type_member' => $details->type_member,
            'type_chairman' => $details->type_chairman,
            'name' => $details->name,
            'company' => $details->company,
            'type' => $details->type,
            'title' => $details->title,
            'status' => 'draft',
            'website1' => $details->website1,
            'website2' => $details->website2,
            'tel1' => $details->tel1,
            'tel2' => $details->tel2,
            'fax1' => $details->fax1,
            'fax2' => $details->fax2,
            'email1' => $details->email1,
            'email2' => $details->email2,
            'company_address' => $details->company_address,
            'type_founder' => $details->type_founder,
            'lang' => $details->lang,
            'image' => $details->image,
            'attachment' => $details->attachment,
            'contact_person' => $details->contact_person,
            'stroke' => $details->stroke,
            'user_id' => Auth::user()->id,
            
        ]);

        return redirect()->back()->with([
            'msg' => __('Item cloned success...'),
            'type' => 'success'
        ]);
    }

    public function edit($id){
        $member = Member::find($id);
        
        $all_language = Language::all();
        
        $form = 'backend.pages.member.partial.edit-form1';

        if($type = $member->type){
            if(isset(SELF::FORM_EDIT[$type])){
                $form = SELF::FORM_EDIT[$type];
            }
        }
        
        return view('backend.pages.member.edit')->with([
            'form' => $form,
            
            'member' => $member,
            'all_languages' => $all_language,
        ]);
    }
    public function update(Request $request,$id){
        $this->validate($request,SELF::VALIDATOR);
        Member::where('id',$id)->update([
            
            'content' => $request->content,
            'seq_no' => $request->seq_no,
            'type_member' => $request->type_member,
            'type_chairman' => $request->type_chairman,
            'name' => $request->name,
            'company' => $request->company,
            'title' => $request->title,
            'website1' => $request->website1,
            'website2' => $request->website2,
            'tel1' => $request->tel1,
            'tel2' => $request->tel2,
            'fax1' => $request->fax1,
            'fax2' => $request->fax2,
            'email1' => $request->email1,
            'email2' => $request->email2,
            'company_address' => $request->company_address,
            'type_founder' => $request->type_founder,
            'status' => $request->status,
            'lang' => $request->lang,
            'image' => $request->image,
            'stroke' => $request->stroke,
            'attachment' => $request->attachment,
            'contact_person' => $request->contact_person,
            'type' => $request->type,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back()->with([
            'msg' => __('Item updated...'),
            'type' => 'success'
        ]);
    }
    public function delete(Request $request,$id){
        Member::find($id)->delete();

        return redirect()->back()->with([
            'msg' => __('Item Delete Success...'),
            'type' => 'danger'
        ]);
    }
    
    
    

    
    public function bulk_action(Request $request){
        Member::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

}
