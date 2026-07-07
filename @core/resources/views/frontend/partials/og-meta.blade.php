@php
$title = filter_static_option_value('site_'.$user_select_lang_slug.'_title',$global_static_field_data);
$title = 'The Hong Kong Shippers\' Council';
$descr = filter_static_option_value('site_meta_'.$user_select_lang_slug.'_description',$global_static_field_data);
$descr = '';
$tag = filter_static_option_value('site_meta_'.$user_select_lang_slug.'_tags',$global_static_field_data);
$tag = '';
$url = url()->full();
@endphp

@if(request()->routeIs('homepage') || request()->routeIs('frontend.homepage.demo'))
    <meta property="og:title"  content="{{__($title)}}" />
    {!! render_og_meta_image_by_attachment_id(filter_static_option_value('og_meta_image_for_site',$global_static_field_data)) !!}
    <title>{{__($title)}}{{filter_static_option_value('site_'.$user_select_lang_slug.'_tag_line',$global_static_field_data)}}</title>
    <meta name="description" content="{{$descr}}">
    <meta property="og:description" content="{{$descr}}">
    <meta name="tags" content="{{$tag}}">
    <meta property="og:url" content="{{$url}}" />
@else
    @yield('page-meta-data')
    <title>
        @yield('site-title')
        @hasSection('site-title') - @else @yield('page-title')@endif
        
        {{__($title)}}
        
    </title>
    @yield('og-meta')
    @hasSection('og-meta')  
    @else 
    <meta property="og:title"  content="{{__($title)}}" />
    <meta property="og:description" content="{{$descr}}">
    
    @endif
    <meta property="og:url" content="{{$url}}" />

@endif
