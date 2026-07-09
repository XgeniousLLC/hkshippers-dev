@php $home_page_variant = get_static_option('home_page_variant');@endphp
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo" style="max-height: 50px;">
            <a href="{{route('admin.home')}}">
                @php
                    $logo_type = 'site_logo';
                    if(!empty(get_static_option('site_admin_dark_mode'))){
                        $logo_type = 'site_white_logo';
                    }
                @endphp
                {!! render_image_markup_by_attachment_id(get_static_option($logo_type)) !!}
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav id="main_menu_wrap">
                <ul class="metismenu" id="menu">
                    <li class="{{active_menu('admin-home')}}">
                        <a href="{{route('admin.home')}}"
                           aria-expanded="true">
                            <i class="ti-dashboard"></i>
                            <span>@lang('dashboard')</span>
                        </a>
                    </li>
                    @if(check_page_permission('admin_manage'))
                    <li
                        class="main_dropdown
                        @if(request()->is(['admin-home/admin/*'])) active @endif
                        ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i>
                            <span>{{__('Admin Manage')}}</span></a>
                        <ul class="collapse">
                            <li class="{{active_menu('admin-home/admin/all')}}"><a
                                        href="{{route('admin.all.user')}}">{{__('All Admin')}}</a></li>
                            <li class="{{active_menu('admin-home/admin/new')}}"><a
                                        href="{{route('admin.new.user')}}">{{__('Add New Admin')}}</a></li>
                                        
                        </ul>
                    </li>
                    @endif
                    @if(check_page_permission_by_string('Blogs Manage'))
                        <li
                         class="main_dropdown
                        @if(request()->is([
                        
                                    'admin-home/post/statistics',
                                    'admin-home/post/statistics/*',
                                    'admin-home/post/category/statistics',
                                    'admin-home/post/category/statistics/*',
                                    'admin-home/post/shipping-charges',
                                    'admin-home/post/shipping-charges/*',
                                    'admin-home/post/category/shipping-charges',
                                    'admin-home/post/category/shipping-charges/*',

                                    
                                    'admin-home/post/shipping-alert',
                                    'admin-home/post/shipping-alert/*',
                            
                                    
                                    'admin-home/post/category/shipping-alert',
                                    'admin-home/post/category/shipping-alert/*',

                                    'admin-home/post/shipping-charges-information',
                                    'admin-home/post/shipping-charges-information/*',

                                    'admin-home/post/shipping-alert-information',
                                    'admin-home/post/shipping-alert-information/*',

                                    'admin-home/post/statistics-information',
                                    'admin-home/post/statistics-information/*',
                            ]))
                            active
                        @endif
                        ">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                <span>{{__('Banner')}}</span></a>
                            <ul class="collapse">
                               
                                
                                <li
                                class="main_dropdown
                                @if(request()->is([
                                    'admin-home/post/statistics',
                                    'admin-home/post/statistics/*',
                            
                                    
                                    'admin-home/post/category/statistics',
                                    'admin-home/post/category/statistics/*',

                                    'admin-home/post/statistics-information',
                                    'admin-home/post/statistics-information/*',
                                    ]))
                                    active
                                @endif
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{__('Statistics')}}</span></a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/post/statistics')}}"><a
                                                    href="{{route('admin.post',['type'=>'statistics'])}}">{{__('All Statistics')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/post/statistics/new')}}"><a
                                                    href="{{route('admin.post.new',['type'=>'statistics'])}}">{{__('Add New Statistics')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/post/category/statistics')}}"><a
                                                    href="{{route('admin.post.category',['type'=>'statistics'])}}">{{__('Statistics Type')}}</a></li>
                                        <li
                                            class="main_dropdown
                                            
                                            
                                            @if(request()->is([
                                            
                                                'admin-home/post/statistics-information',
                                                'admin-home/post/statistics-information/*',
                                                ]))
                                                active
                                            @endif  
                                        ">
                                            
                                            <a href="javascript:void(0)" aria-expanded="true">
                                            
                                            {{__('Statistics Information')}}</a>
                                            <ul class="collapse">
                                                <li class="{{active_menu('admin-home/post/statistics-information')}}"><a
                                                            href="{{route('admin.post',['type'=>'statistics-information'])}}">{{__('All Statistics Information')}}</a></li>
                                                            
                                                <li class="{{active_menu('admin-home/post/statistics-information/new')}}"><a
                                                            href="{{route('admin.post.new',['type'=>'statistics-information'])}}">{{__('Add New Statistics Information')}}</a></li>
                                                            
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li
                                class="main_dropdown
                                @if(request()->is([
                                    'admin-home/post/shipping-charges',
                                    'admin-home/post/shipping-charges/*',
                                    'admin-home/post/category/shipping-charges',
                                    'admin-home/post/category/shipping-charges/*',
                            
                                    'admin-home/post/shipping-charges-information',
                                    'admin-home/post/shipping-charges-information/*',

                                    ]))
                                    active
                                @endif
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{__('Shipping Charges')}}</span></a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/post/shipping-charges')}}"><a
                                                    href="{{route('admin.post',['type'=>'shipping-charges'])}}">{{__('All Shipping Charges')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/post/shipping-charges/new')}}"><a
                                                    href="{{route('admin.post.new',['type'=>'shipping-charges'])}}">{{__('Add New Shipping Charges')}}</a></li>
                                        <li class="{{active_menu('admin-home/post/category/shipping-charges')}}"><a
                                                    href="{{route('admin.post.category',['type'=>'shipping-charges'])}}">{{__('Shipping Charges Type')}}</a></li>
                                                    
                                        <li
                                            class="main_dropdown
                                            
                                            
                                            @if(request()->is([
                                            
                                                'admin-home/post/shipping-charges-information',
                                                'admin-home/post/shipping-charges-information/*',
                                                ]))
                                                active
                                            @endif  
                                        ">
                                            
                                            <a href="javascript:void(0)" aria-expanded="true">
                                            
                                            {{__('shipping Charges Information')}}</a>
                                            <ul class="collapse">
                                                <li class="{{active_menu('admin-home/post/shipping-charges-information')}}"><a
                                                            href="{{route('admin.post',['type'=>'shipping-charges-information'])}}">{{__('All Shipping Charges Information')}}</a></li>
                                                            
                                                <li class="{{active_menu('admin-home/post/shipping-charges-information/new')}}"><a
                                                            href="{{route('admin.post.new',['type'=>'shipping-charges-information'])}}">{{__('Add New Shipping Charges Information')}}</a></li>
                                                            
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                
                                <li
                                class="main_dropdown
                                @if(request()->is([
                                    'admin-home/post/shipping-alert',
                                    'admin-home/post/shipping-alert/*',
                            
                                    
                                    'admin-home/post/category/shipping-alert',
                                    'admin-home/post/category/shipping-alert/*',

                                    'admin-home/post/shipping-alert-information',
                                    'admin-home/post/shipping-alert-information/*',
                                    ]))
                                    active
                                @endif
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{__('Shipping Alert')}}</span></a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/post/shipping-alert')}}"><a
                                                    href="{{route('admin.post',['type'=>'shipping-alert'])}}">{{__('All Shipping Alert')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/post/shipping-alert/new')}}"><a
                                                    href="{{route('admin.post.new',['type'=>'shipping-alert'])}}">{{__('Add New Shipping Alert')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/post/category/ shipping-alert')}}"><a
                                                    href="{{route('admin.post.category',['type'=>'shipping-alert'])}}">{{__('Shipping Alert Type')}}</a></li>
                                        <li
                                            class="main_dropdown
                                            
                                            
                                            @if(request()->is([
                                            
                                                'admin-home/post/shipping-alert-information',
                                                'admin-home/post/shipping-alert-information/*',
                                                ]))
                                                active
                                            @endif  
                                        ">
                                            
                                                
                                            <a href="javascript:void(0)" aria-expanded="true">
                                            
                                            {{__('shipping Alert Information')}}</a>
                                            
                                            <ul class="collapse">
                                                <li class="{{active_menu('admin-home/post/shipping-alert-information')}}"><a
                                                            href="{{route('admin.post',['type'=>'shipping-alert-information'])}}">{{__('All Shipping Alert Information')}}</a></li>
                                                            
                                                <li class="{{active_menu('admin-home/post/shipping-alert-information/new')}}"><a
                                                            href="{{route('admin.post.new',['type'=>'shipping-alert-information'])}}">{{__('Add New Shipping Alert Information')}}</a></li>
                                                            
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @endif
                    @if(check_page_permission_by_string('Blogs Manage'))
                        <li
                         class="main_dropdown
                        @if(request()->is([
                            'admin-home/post/council-background',
                            'admin-home/post/council-background/*',
                            'admin-home/post/chairman-message',
                            'admin-home/post/chairman-message/*',
                            'admin-home/post/council-service-activities',
                            'admin-home/post/council-service-activities/*',
                            'admin-home/post/internatioinal-representation',
                            'admin-home/post/internatioinal-representation/*',
                            'admin-home/post/activity',
                            'admin-home/post/activity/*','admin-home/post/logisitcs-mission-speaking-occasions',
                            'admin-home/post/logisitcs-mission-speaking-occasions/*',
                            'admin-home/post/annual-report',
                            'admin-home/post/annual-report/*',
                            ]))
                            active
                        @endif
                        ">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                <span>{{__('About Council')}}</span></a>
                            <ul class="collapse">
                                <li
                                class="main_dropdown
                                @if(request()->is([
                                    'admin-home/post/council-background',
                                    'admin-home/post/council-background/*',
                                    
                                    ]))
                                    active
                                @endif
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{__('Council Background')}}</span></a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/post/council-background')}}"><a
                                                    href="{{route('admin.post',['type'=>'council-background'])}}">{{__('All Council Background')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/post/council-background/new')}}"><a
                                                    href="{{route('admin.post.new',['type'=>'council-background'])}}">{{__('Add New Council Background')}}</a></li>
                                                    
                                    </ul>
                                </li>
                                          
                                <li
                                class="main_dropdown
                                @if(request()->is([
                                
                                    'admin-home/post/chairman-message',
                                    'admin-home/post/chairman-message/*',
                                    ]))
                                    active
                                @endif
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{__('Chairman\'s Message')}}</span></a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/post/chairman-message')}}"><a
                                                    href="{{route('admin.post',['type'=>'chairman-message'])}}">{{__('All Chairman\'s Message')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/post/chairman-message/new')}}"><a
                                                    href="{{route('admin.post.new',['type'=>'chairman-message'])}}">{{__('Add New Chairman\'s Message')}}</a></li>
                                                    
                                    </ul>
                                </li>       
                                <li
                                class="main_dropdown
                                @if(request()->is([
                                
                                    'admin-home/post/council-service-activities',
                                    'admin-home/post/council-service-activities/*',
                                    
                                    ]))
                                    active
                                @endif
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{__('Council Services & Activities')}}</span></a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/post/council-service-activities')}}"><a
                                                    href="{{route('admin.post',['type'=>'council-service-activities'])}}">{{__('All Council Services & Activities')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/post/council-service-activities/new')}}"><a
                                                    href="{{route('admin.post.new',['type'=>'council-service-activities'])}}">{{__('Add New Council Services & Activities')}}</a></li>
                                                    
                                    </ul>
                                </li>      
                                <li
                                class="main_dropdown
                                @if(request()->is([
                                
                                    'admin-home/post/internatioinal-representation',
                                    'admin-home/post/internatioinal-representation/*',
                                    ]))
                                    active
                                @endif
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{__('International Representation')}}</span></a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/post/internatioinal-representation')}}"><a
                                                    href="{{route('admin.post',['type'=>'internatioinal-representation'])}}">{{__('All International Representation')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/post/internatioinal-representation/new')}}"><a
                                                    href="{{route('admin.post.new',['type'=>'internatioinal-representation'])}}">{{__('Add New International Representation')}}</a></li>
                                                    
                                    </ul>
                                </li>    
                                
                                <li
                                class="main_dropdown
                                @if(request()->is([
                                
                                    'admin-home/post/activity',
                                    'admin-home/post/activity/*',
                                    
                                    ]))
                                    active
                                @endif
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{__('Activity')}}</span></a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/post/activity')}}"><a
                                                    href="{{route('admin.post',['type'=>'activity'])}}">{{__('All Activity')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/post/activity/new')}}"><a
                                                    href="{{route('admin.post.new',['type'=>'activity'])}}">{{__('Add New Activity')}}</a></li>
                                                    
                                    </ul>
                                </li>  
                                <li
                                class="main_dropdown
                                @if(request()->is([
                                    'admin-home/post/logisitcs-mission-speaking-occasions',
                                    'admin-home/post/logisitcs-mission-speaking-occasions/*',
                                    ]))
                                    active
                                @endif
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{__('Logisitcs Mission & Speaking Occasions')}}</span></a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/post/logisitcs-mission-speaking-occasions')}}"><a
                                                    href="{{route('admin.post',['type'=>'logisitcs-mission-speaking-occasions'])}}">{{__('All Logisitcs Mission & Speaking Occasions')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/post/logisitcs-mission-speaking-occasions/new')}}"><a
                                                    href="{{route('admin.post.new',['type'=>'logisitcs-mission-speaking-occasions'])}}">{{__('Add New Logisitcs Mission & Speaking Occasions')}}</a></li>
                                                    
                                    </ul>
                                </li>  
                                <li
                                class="main_dropdown
                                @if(request()->is([
                                    'admin-home/post/annual-report',
                                    'admin-home/post/annual-report/*',
                                    ]))
                                    active
                                @endif
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{__('Annual Report')}}</span></a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/post/annual-report')}}"><a
                                                    href="{{route('admin.post',['type'=>'annual-report'])}}">{{__('All Annual Report')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/post/annual-report/new')}}"><a
                                                    href="{{route('admin.post.new',['type'=>'annual-report'])}}">{{__('Add Annual Report')}}</a></li>
                                                    
                                    </ul>
                                </li>  
                            </ul>
                        </li>
                    @endif
                    @if(check_page_permission_by_string('Blogs Manage'))
                        <li
                         class="main_dropdown
                        @if(request()->is([
                            'admin-home/member/honorary-chairman',
                            'admin-home/member/honorary-chairman/*',
                            'admin-home/member/executive-committee',
                            'admin-home/member/executive-committee/*',
                            'admin-home/member/specialised-sub-committee',
                            'admin-home/member/specialised-sub-committee/*',
                            'admin-home/member/founders-ordinary-members',
                            'admin-home/member/founders-ordinary-members/*',
                            'admin-home/member/associate-members',
                            'admin-home/member/associate-members/*',
                            'admin-home/post/member-information',
                            'admin-home/post/member-information/*',
                            ]))
                            active
                        @endif
                        ">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                <span>{{__('Members')}}</span></a>
                            <ul class="collapse">
                                <li
                                class="main_dropdown
                                
                                 
                        @if(request()->is([
                            'admin-home/member/honorary-chairman',
                            'admin-home/member/honorary-chairman/*',
                            ]))
                            active
                        @endif 
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{__('Honorary Chairman')}}</span></a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/member/honorary-chairman')}}"><a
                                                    href="{{route('admin.member',['type'=>'honorary-chairman'])}}">{{__('All Honorary Chairman')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/member/honorary-chairman/new')}}"><a
                                                    href="{{route('admin.member.new',['type'=>'honorary-chairman'])}}">{{__('Add New Honorary Chairman')}}</a></li>
                                                    
                                    </ul>
                                </li>
                                <li
                                class="main_dropdown
                                
                        @if(request()->is([
                        
                            'admin-home/member/executive-committee',
                            'admin-home/member/executive-committee/*',
                            ]))
                            active
                        @endif
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{__('Executive Committee')}}</span></a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/member/executive-committee')}}"><a
                                                    href="{{route('admin.member',['type'=>'executive-committee'])}}">{{__('All Executive Committee')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/member/executive-committee/new')}}"><a
                                                    href="{{route('admin.member.new',['type'=>'executive-committee'])}}">{{__('Add New Executive Committee')}}</a></li>
                                                    
                                    </ul>
                                </li>
                                
                                <li
                                class="main_dropdown
                                
                                 
                        @if(request()->is([
                            'admin-home/member/specialised-sub-committee',
                            'admin-home/member/specialised-sub-committee/*',
                            
                            ]))
                            active
                        @endif 
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{__('Specialised Sub-Committee')}}</span></a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/member/specialised-sub-committee')}}"><a
                                                    href="{{route('admin.member',['type'=>'specialised-sub-committee'])}}">{{__('All Specialised Sub-Committee')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/member/specialised-sub-committee/new')}}"><a
                                                    href="{{route('admin.member.new',['type'=>'specialised-sub-committee'])}}">{{__('Add New Specialised Sub-Committee')}}</a></li>
                                                    
                                    </ul>
                                </li>
                                <li
                                class="main_dropdown
                                
                                 
                        @if(request()->is([
                            'admin-home/member/founders-ordinary-members',
                            'admin-home/member/founders-ordinary-members/*',
                            
                            ]))
                            active
                        @endif  
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{__('Founders\' and Ordinary Members')}}</span></a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/member/founders-ordinary-members')}}"><a
                                                    href="{{route('admin.member',['type'=>'founders-ordinary-members'])}}">{{__('All Founders\' and Ordinary Members')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/member/founders-ordinary-members/new')}}"><a
                                                    href="{{route('admin.member.new',['type'=>'founders-ordinary-members'])}}">{{__('Add New Founders\' and Ordinary Members')}}</a></li>
                                                    
                                    </ul>
                                </li>
                                <li
                                class="main_dropdown
                                
                                 
                        @if(request()->is([
                        
                            'admin-home/member/associate-members',
                            'admin-home/member/associate-members/*',
                            ]))
                            active
                        @endif  
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{__('Associate Members')}}</span></a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/member/associate-members')}}"><a
                                                    href="{{route('admin.member',['type'=>'associate-members'])}}">{{__('All Associate Members')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/member/associate-members/new')}}"><a
                                                    href="{{route('admin.member.new',['type'=>'associate-members'])}}">{{__('Add New Associate Members')}}</a></li>
                                                    
                                    </ul>
                                </li>
                                <li
                                    class="main_dropdown
                                    
                                    
                                    @if(request()->is([
                                    
                                        'admin-home/post/member-information',
                                        'admin-home/post/member-information/*',
                                        ]))
                                        active
                                    @endif  
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{__('Member\'s Information')}}</span></a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/post/member-information')}}"><a
                                                    href="{{route('admin.post',['type'=>'member-information'])}}">{{__('All Member\'s Information')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/post/member-information/new')}}"><a
                                                    href="{{route('admin.post.new',['type'=>'member-information'])}}">{{__('Add New Member\'s Information')}}</a></li>
                                                    
                                    </ul>
                                </li>
                                
                            </ul>
                        </li>
                    @endif
                    
                    @if(check_page_permission_by_string('Blogs Manage'))
                        <li
                         class="main_dropdown
                        @if(request()->is([
                            'admin-home/post/shipping-and-logistics',
                            'admin-home/post/shipping-and-logistics/*',
                            
                            'admin-home/post/economic-indicator',
                            'admin-home/post/economic-indicator/*',


                            'admin-home/post/trade-economic-outlook',
                            'admin-home/post/trade-economic-outlook/*',
                            
                            'admin-home/post/study-report',
                            'admin-home/post/study-report/*',

                            
                            'admin-home/post/survey-report',
                            'admin-home/post/survey-report/*',

                            'admin-home/post/other-useful-information',
                                    'admin-home/post/other-useful-information/*',
                                    
                            ]))
                            active
                        @endif
                        ">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                <span>{{__('Market Information')}}</span></a>
                            <ul class="collapse">
                                
                                
                                  
                                  
                                <li
                                class="main_dropdown
                                @if(request()->is([
                                    'admin-home/post/economic-indicator',
                                    'admin-home/post/economic-indicator/*',
                                    
                                    ]))
                                    active
                                @endif
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{__('Economic Indicator')}}</span></a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/post/economic-indicator')}}"><a
                                                    href="{{route('admin.post',['type'=>'economic-indicator'])}}">{{__('All Economic Indicator')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/post/economic-indicator/new')}}"><a
                                                    href="{{route('admin.post.new',['type'=>'economic-indicator'])}}">{{__('Add New Economic Indicator')}}</a></li>
                                                    
                                    </ul>
                                </li>
                                
                                <li
                                class="main_dropdown
                                @if(request()->is([
                                    'admin-home/post/trade-economic-outlook',
                                    'admin-home/post/trade-economic-outlook/*',
                                    
                                    ]))
                                    active
                                @endif
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{__('Trade Economic Outlook')}}</span></a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/post/trade-economic-outlook')}}"><a
                                                    href="{{route('admin.post',['type'=>'trade-economic-outlook'])}}">{{__('All Trade Economic Outlook')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/post/trade-economic-outlook/new')}}"><a
                                                    href="{{route('admin.post.new',['type'=>'trade-economic-outlook'])}}">{{__('Add New Trade Economic Outlook')}}</a></li>
                                                    
                                    </ul>
                                </li>

                                
                                <li
                                class="main_dropdown
                                @if(request()->is([
                                    'admin-home/post/study-report',
                                    'admin-home/post/study-report/*',
                                    
                                    ]))
                                    active
                                @endif
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{__('Study Report')}}</span></a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/post/study-report')}}"><a
                                                    href="{{route('admin.post',['type'=>'study-report'])}}">{{__('All Study Report')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/post/study-report/new')}}"><a
                                                    href="{{route('admin.post.new',['type'=>'study-report'])}}">{{__('Add New Study Report')}}</a></li>
                                                    
                                    </ul>
                                </li>
                                
                                <li
                                class="main_dropdown
                                @if(request()->is([
                                    'admin-home/post/survey-report',
                                    'admin-home/post/survey-report/*',
                                    
                                    ]))
                                    active
                                @endif
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{__('Survey Report')}}</span></a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/post/survey-report')}}"><a
                                                    href="{{route('admin.post',['type'=>'survey-report'])}}">{{__('All Survey Report')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/post/survey-report/new')}}"><a
                                                    href="{{route('admin.post.new',['type'=>'survey-report'])}}">{{__('Add New Survey Report')}}</a></li>
                                                    
                                    </ul>
                                </li>
                                
                                <li
                                class="main_dropdown
                                @if(request()->is([
                                    'admin-home/post/other-useful-information',
                                    'admin-home/post/other-useful-information/*',
                                    
                                    ]))
                                    active
                                @endif
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{__('Other Useful Information')}}</span></a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/post/other-useful-information')}}"><a
                                                    href="{{route('admin.post',['type'=>'other-useful-information'])}}">{{__('All Other Useful Information')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/post/other-useful-information/new')}}"><a
                                                    href="{{route('admin.post.new',['type'=>'other-useful-information'])}}">{{__('Add New Other Useful Information')}}</a></li>
                                                    
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @endif

                    
                    @if(check_page_permission_by_string('Blogs Manage'))
                        <li
                         class="main_dropdown
                        @if(request()->is([
                        
                            'admin-home/events/councils-events',
                            'admin-home/events/councils-events/*',
                            'admin-home/post/industry-events',
                            'admin-home/post/industry-events/*',
                            'admin-home/post/diesel-discount-project-content',
                            'admin-home/post/diesel-discount-project-content/*',
                            
                            'admin-home/post/port-security-charge',
                                    'admin-home/post/port-security-charge/*',
                            ]))
                            active
                        @endif
                        ">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                <span>{{__('Events')}}</span></a>
                            <ul class="collapse">
                                <li
                                class="main_dropdown
                                @if(request()->is([
                                    'admin-home/events/councils-events',
                                    'admin-home/events/councils-events/*',
                                    
                                    ]))
                                    active
                                @endif
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{__('Councils Events')}}</span></a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/events/councils-events')}}"><a
                                                    href="{{route('admin.events.all',['type'=>'councils-events'])}}">{{__('All Councils Events')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/events/councils-events/new')}}"><a
                                                    href="{{route('admin.events.new',['type'=>'councils-events'])}}">{{__('Add New Councils Events')}}</a></li>
                                                    
                                    </ul>
                                </li>
                               
                                <li
                                class="main_dropdown
                                @if(request()->is([
                                    'admin-home/post/industry-events',
                                    'admin-home/post/industry-events/*',
                                    
                                    ]))
                                    active
                                @endif
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{__('Industry Events')}}</span></a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/post/industry-events')}}"><a
                                                    href="{{route('admin.post',['type'=>'industry-events'])}}">{{__('All Industry Events')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/post/industry-events/new')}}"><a
                                                    href="{{route('admin.post.new',['type'=>'industry-events'])}}">{{__('Add New Industry Events')}}</a></li>
                                                    
                                    </ul>
                                </li>
                                
                                <li
                                class="main_dropdown
                                @if(request()->is([
                                    'admin-home/post/project-info',
                                    'admin-home/post/project-info/*',
                                ]))
                                    active
                                @endif
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{ __('Project') }}</span>
                                    </a>
                                    <ul class="collapse">
                                        <li class="{{ active_menu('admin-home/post/project-info') }}">
                                            <a href="{{ route('admin.post', ['type' => 'project-info']) }}">
                                                {{ __('All Project') }}
                                            </a>
                                        </li>
                                        <li class="{{ active_menu('admin-home/post/project-info/new') }}">
                                            <a href="{{ route('admin.post.new', ['type' => 'project-info']) }}">
                                                {{ __('Add New Project') }}
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @endif

                    @if(check_page_permission_by_string('Blogs Manage'))
                        <li
                         class="main_dropdown
                        @if(request()->is([
                        
                        
                                    'admin-home/post/what-new',
                                    'admin-home/post/what-new/*',
                                    'admin-home/post/news-chairman-message',
                                    'admin-home/post/news-chairman-message/*',
                                    'admin-home/post/news-chairman-message-past-issue',
                                    'admin-home/post/news-chairman-message-past-issue/*',
                                    'admin-home/post/biz-china',
                                    'admin-home/post/biz-china/*',
                                    'admin-home/post/biz-china-past-issue',
                                    'admin-home/post/biz-china-past-issue/*',
                                    'admin-home/post/from-the-council',
                                    'admin-home/post/from-the-council/*',
                                    
                            ]))
                            active
                        @endif
                        ">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                <span>{{__('What\'s News')}}</span></a>
                            
                            <ul class="collapse">
                            
                                <li
                                class="main_dropdown
                                @if(request()->is([
                                    'admin-home/post/from-the-council',
                                    'admin-home/post/from-the-council/*',
                                    
                                    ]))
                                    active
                                @endif
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{__('From The Council')}}</span></a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/post/from-the-council')}}"><a
                                                    href="{{route('admin.post',['type'=>'from-the-council'])}}">{{__('All From The Council')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/post/from-the-council/new')}}"><a
                                                    href="{{route('admin.post.new',['type'=>'from-the-council'])}}">{{__('Add New From The Council')}}</a></li>
                                                    
                                    </ul>
                                </li>
                                <li
                                    class="main_dropdown
                                    @if(request()->is([
                                        
                                        'admin-home/post/what-new',
                                        'admin-home/post/what-new/*',
                                        ]))
                                        active
                                    @endif
                                    ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{__('News')}}</span></a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/post/what-new')}}"><a
                                                    href="{{route('admin.post',['type'=>'what-new'])}}">{{__('All  News')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/post/what-new/new')}}"><a
                                                href="{{route('admin.post.new',['type'=>'what-new'])}}">{{__('Add New News')}}</a></li>
                                
                                    </ul>
                                </li>
                                
                                           
                            </ul>
                        </li>
                    @endif

                    @if(check_page_permission_by_string('Blogs Manage'))
                        <li
                            class="main_dropdown
                            @if(request()->is([
                                'admin-home/application-form/books',
                                'admin-home/application-form/books/*',
                                'admin-home/application-form/councils-events',
                                'admin-home/application-form/councils-events/*',
                            ]))
                                active
                            @endif
                        ">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                <span>{{ __('Manage Applications') }}</span></a>
                            <ul class="collapse">

                                {{-- Council Events Section --}}
                                <li
                                    class="main_dropdown
                                    @if(request()->is([
                                        'admin-home/application-form/councils-events',
                                        'admin-home/application-form/councils-events/*',
                                    ]))
                                        active
                                    @endif
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true">
                                        <span>{{ __('Council Events') }}</span>
                                    </a>
                                    <ul class="collapse">
                                        <li class="{{ active_menu('admin-home/application-form/councils-events') }}">
                                            <a href="{{ route('admin.application-form', ['type' => 'councils-events']) }}">
                                                {{ __('All Council Events') }}
                                            </a>
                                        </li>
                                        <li class="{{ active_menu('admin-home/application-form/councils-events/new') }}">
                                            <a href="{{ route('admin.application-form.new', ['type' => 'councils-events']) }}">
                                                {{ __('Add New Council Events') }}
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @endif


                    @if(check_page_permission_by_string('Blogs Manage'))
                        <li
                         class="main_dropdown
                        @if(request()->is([
                            'admin-home/post/advert-images',
                            'admin-home/post/advert-images/*',
                            
                            'admin-home/media-room',
                            'admin-home/media-room/*',
                            ]))
                            active
                        @endif
                        ">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                <span>{{__('Images')}}</span></a>
                            <ul class="collapse">
                                <li
                                class="main_dropdown
                                @if(request()->is([
                                    'admin-home/post/advert-images',
                                    'admin-home/post/advert-images/*',
                                    
                                    ]))
                                    active
                                @endif
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                        <span>{{__('Advert Images')}}</span></a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/post/advert-images')}}"><a
                                                    href="{{route('admin.post',['type'=>'advert-images'])}}">{{__('All Advert Images')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/post/advert-images/new')}}"><a
                                                    href="{{route('admin.post.new',['type'=>'advert-images'])}}">{{__('Add New Advert Images')}}</a></li>
                                                    
                                    </ul>
                                </li>
                                  
                                <li
                                class="main_dropdown
                                @if(request()->is([
                                    'admin-home/media-room',
                                    'admin-home/media-room/*',
                                    
                                    ]))
                                    active
                                @endif
                                ">
                                    <a  href="{{route('admin.media-room')}}"><i class="ti-write"></i>
                                        <span>{{__('Media Room')}}</span></a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    @if(check_page_permission_by_string('Blogs Manage'))
                        <li
                         class="main_dropdown
                        @if(request()->is([
                            'admin-home/post/biz-links',
                            'admin-home/post/biz-links/*',
                            
                            ]))
                            active
                        @endif
                        ">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                <span>{{__('Biz Links')}}</span></a>
                            
                            
                                <ul class="collapse">
                                        <li class="{{active_menu('admin-home/post/biz-links')}}"><a
                                                    href="{{route('admin.post',['type'=>'biz-links'])}}">{{__('All Biz Links')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/post/biz-links/new')}}"><a
                                                    href="{{route('admin.post.new',['type'=>'biz-links'])}}">{{__('Add New Biz Links')}}</a></li>
                                                    
                                    </ul>
                        </li>
                    @endif

                    @if(check_page_permission_by_string('Blogs Manage'))
                        <li
                         class="main_dropdown
                        @if(request()->is([
                            'admin-home/application-form/contact-us',
                            'admin-home/application-form/contact-us/*',
                            
                            ]))
                            active
                        @endif
                        ">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                <span>{{__('Contact Us')}}</span></a>
                            
                            
                                <ul class="collapse">
                                        <li class="{{active_menu('admin-home/application-form/contact-us')}}"><a
                                                    href="{{route('admin.application-form',['type'=>'contact-us'])}}">{{__('All Contact Us')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/application-form/contact-us/new')}}"><a
                                                    href="{{route('admin.application-form.new',['type'=>'contact-us'])}}">{{__('Add New Contact Us')}}</a></li>
                                                    
                                    </ul>
                        </li>
                    @endif
                    @if(check_page_permission_by_string('Blogs Manage'))
                        <li
                         class="main_dropdown
                        @if(request()->is([
                            'admin-home/application-form/join-us',
                            'admin-home/application-form/join-us/*',
                            'admin-home/post/join-us-image',
                            'admin-home/post/join-us-image/*',
                                            
                            'admin-home/post/join-us-information',
                            'admin-home/post/join-us-information/*',
                            ]))
                            active
                        @endif
                        ">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                <span>{{__('Join Us')}}</span></a>
                            
                            
                                <ul class="collapse">
                                    <li
                                        class="main_dropdown
                                        @if(request()->is([
                                        
                                            'admin-home/application-form/join-us',
                                            'admin-home/application-form/join-us/*',
                                            ]))
                                            active
                                        @endif
                                        ">
                                        <a href="javascript:void(0)" aria-expanded="true">
                                            
                                            {{__('Join Us')}}</a>
                                        <ul class="collapse">
                                            <li class="{{active_menu('admin-home/application-form/join-us')}}"><a
                                                        href="{{route('admin.application-form',['type'=>'join-us'])}}">{{__('All Join Us')}}</a></li>
                                                        
                                            <li class="{{active_menu('admin-home/application-form/join-us/new')}}"><a
                                            href="{{route('admin.application-form.new',['type'=>'join-us'])}}">{{__('Add New Join Us')}}</a></li>
                                                
                                        </ul>
                                    </li>
                                    <li
                                        class="main_dropdown
                                        @if(request()->is([
                                        
                                            'admin-home/post/join-us-image',
                                            'admin-home/post/join-us-image/*',
                                            
                                            ]))
                                            active
                                        @endif
                                        ">
                                        <a href="javascript:void(0)" aria-expanded="true">
                                        
                                            {{__('Images')}}</a>
                                        <ul class="collapse">
                                            <li class="{{active_menu('admin-home/post/join-us-image')}}"><a
                                                href="{{route('admin.post',['type'=>'join-us-image'])}}">{{__('All Images')}}</a></li>
                                                        
                                            <li class="{{active_menu('admin-home/post/join-us-image/new')}}"><a
                                                href="{{route('admin.post.new',['type'=>'join-us-image'])}}">{{__('Add New Images')}}</a></li>
                                                        
                                        </ul>
                                    </li>   
                                    <li
                                        class="main_dropdown
                                        @if(request()->is([
                                        
                                            'admin-home/post/join-us-information',
                                            'admin-home/post/join-us-information/*',
                                            
                                            ]))
                                            active
                                        @endif
                                        ">
                                        <a href="javascript:void(0)" aria-expanded="true">
                                        
                                            {{__('Join Us Information')}}</a>
                                        <ul class="collapse">
                                            <li class="{{active_menu('admin-home/post/join-us-information')}}"><a
                                                href="{{route('admin.post',['type'=>'join-us-information'])}}">{{__('All Join Us Information')}}</a></li>
                                                        
                                            <li class="{{active_menu('admin-home/post/join-us-information/new')}}"><a
                                                href="{{route('admin.post.new',['type'=>'join-us-information'])}}">{{__('Add New Join Us Information')}}</a></li>
                                                        
                                        </ul>
                                    </li>    
                                </ul>
                        </li>
                    @endif
                    
                    @if(check_page_permission_by_string('Blogs Manage'))
                        <li
                         class="main_dropdown
                        @if(request()->is([
                            'admin-home/post/disclaimer',
                            'admin-home/post/disclaimer/*',
                            
                            ]))
                            active
                        @endif
                        ">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                <span>{{__('Disclaimer')}}</span></a>
                            
                            
                                <ul class="collapse">
                                        <li class="{{active_menu('admin-home/post/disclaimer')}}"><a
                                                    href="{{route('admin.post',['type'=>'disclaimer'])}}">{{__('All Disclaimer')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/post/disclaimer/new')}}"><a
                                                    href="{{route('admin.post.new',['type'=>'disclaimer'])}}">{{__('Add New Disclaimer')}}</a></li>
                                                    
                                    </ul>
                        </li>
                    @endif
                    @if(check_page_permission_by_string('General Settings'))
                    <li class="main_dropdown @if(request()->is(
                        'admin-home/general-settings/*',
                        'admin-home/post/page-setting',
                        'admin-home/post/page-setting/*',
                        'admin-home/post/email-templates',
                        'admin-home/post/email-templates/*',
                        
                        )) active @endif">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-settings"></i>
                            <span>{{__('General Settings')}}</span></a>
                        <ul class="collapse ">
                            <li class="{{active_menu('admin-home/general-settings/site-identity')}}"><a
                                        href="{{route('admin.general.site.identity')}}">{{__('Site Identity')}}</a></li>
                                     
                                   
                                        <li
                                class="main_dropdown
                                @if(request()->is([
                                
                                    'admin-home/post/page-setting',
                                    'admin-home/post/page-setting/*',
                                    
                                    ]))
                                    active
                                @endif
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true">
                                    
                                        {{__('Page Settings')}}</a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/post/page-setting')}}"><a
                                                    href="{{route('admin.post',['type'=>'page-setting'])}}">{{__('All Page Settings')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/post/page-setting/new')}}"><a
                                                    href="{{route('admin.post.new',['type'=>'page-setting'])}}">{{__('Add New Page Settings')}}</a></li>
                                                    
                                    </ul>
                                </li>      
                            <li class="{{active_menu('admin-home/general-settings/smtp-settings')}}"><a
                                        href="{{route('admin.general.smtp.settings')}}">{{__('SMTP Settings')}}</a></li>
                                        <li
                                class="main_dropdown
                                @if(request()->is([
                                
                                    'admin-home/post/email-templates',
                                    'admin-home/post/email-templates/*',
                                    
                                    ]))
                                    active
                                @endif
                                ">
                                    <a href="javascript:void(0)" aria-expanded="true">
                                    
                                        {{__('Email Templates')}}</a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/post/email-templates')}}"><a
                                                    href="{{route('admin.post',['type'=>'email-templates'])}}">{{__('All Email Templates')}}</a></li>
                                                    
                                        <li class="{{active_menu('admin-home/post/email-templates/new')}}"><a
                                                    href="{{route('admin.post.new',['type'=>'email-templates'])}}">{{__('Add New Email Templates')}}</a></li>
                                                    
                                    </ul>
                                </li>        
                                
                            <li class="{{active_menu('admin-home/general-settings/seo-settings')}}"><a
                                        href="{{route('admin.general.seo.settings')}}">{{__('SEO Settings')}}</a></li>
                                        
                            <li class="{{active_menu('admin-home/general-settings/sitemap-settings')}}"><a
                                        href="{{route('admin.general.sitemap.settings')}}">{{__('Sitemap Settings')}}</a></li>
                            <li class="{{active_menu('admin-home/general-settings/homepage-extra-text')}}"><a
                                        href="{{route('admin.general.homepage.extra.text')}}">{{__('Homepage Extra Text')}}</a></li>
                            <li class="{{active_menu('admin-home/general-settings/database-upgrade')}}"><a
                                        href="{{route('admin.general.database.upgrade')}}">{{__('Database Upgrade')}}</a></li>
                        </ul>
                    </li>
                    @endif
                    @if(check_page_permission('languages'))
                    <li class="main_dropdown @if(request()->is('admin-home/languages/*') || request()->is('admin-home/languages') ) active @endif">
                        <a href="{{route('admin.languages')}}" aria-expanded="true"><i class="ti-signal"></i>
                            <span>{{__('Languages')}}</span></a>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</div>
