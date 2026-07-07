@extends('_frontend.frontend-master')
@php 
                
	$image = null;
	$image_url = '';
	$image = @get_attachment_image_by_id($item->image,null,false);
	if(!empty($image)){
		$image_url = $image['img_url'];

	}
	$attachment = null;
	$attachment_url = '';
	$attachment = @get_attachment_image_by_id($item->attachment,null,false);
	if(!empty($attachment)){
		$attachment_url = $attachment['img_url'];

	}
	
	$icon = $attachment_url;
	
	$newwidth = 250;
	$newheight = 250;
	$img_icon = $icon;
	if(false&&$icon){
		$img_icon = image_resize($icon,$newwidth,$newheight);

	}
@endphp
@section('site-title')
{{$item->title}}
@endsection
@section('og-meta')

<meta property="og:title"  content="{{$item->title}}" />
<meta property="og:description" content="">
@if($img_icon)
     
<meta property="og:image"  content="{{$img_icon}}" />
@endif
@endsection

@section('content')

    <!-- visual/banner of the page -->
    <!--/visual/banner of the page -->
    <!-- main content wrapper -->
    <div class="content-wrapper ">
        <section class="content-block chairman" >
            <div class="container" style="border-bottom:none;">
                
                <div class="row multiple-row v-align-row" style="display: flex;
                    align-items: flex-start;">
                
                
                
                <div class="col-md-12 post-page-title">
                    <div class="text-center " style="width:{{$newwidth}}px;display:inline-block;vertical-align:top;">
                    @if($img_icon)

                    <img style=" width:auto;height:auto;" src="{{$img_icon}}" >
                    @endif        
                    </div>
                    <h2 class="text-center" style="display:inline-block;width:calc( 100% - {{$newwidth}}px * 2);">
                    @php 
                    echo str_replace("\n",'<br>',$item->title);
                    
                    @endphp
                    </h2>
                </div>
                <div class="col-md-12 text-center">
                    @if($image_url)

                    <img src="{{$image_url}}" >
                    @endif        
                </div>
                 
                <div class="col-md-12 " style=" ">
                    @php 
                    $content = str_replace("\n",'<br>',$item->content);
                    $regex1 = '/\b(https|http):\/\/(\S+\/?)+\b/';
                    $regex2 = '/\b[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+\b/';
                    
                    preg_match_all($regex1,$content,$ms);
                    foreach($ms[0] as $m){
                        $a = "<a href=\"$m\" target=\"_blank\">$m</a>";
                        $content = str_replace($m,$a,$content);
                    }
                    preg_match_all($regex2,$content,$ms);
                    foreach($ms[0] as $m){
                        $a = "<a href=\"mailto:$m\" >$m</a>";
                        $content = str_replace($m,$a,$content);
                    }
                    echo $content;
                    
                    @endphp

                </div>
                <div class="col-md-12 text-center" style="">

                <a href="{{url(@$_GET['back']??'/')}}"  class="btn btn-secondary" ><b>{{__('Back')}}</b></a>
            </div>
            </div>
        </section>
    </div>
        
    <!--/main content wrapper -->
    <script>
        $('.main-header.header-white.transparent').addClass('black');
    </script>
@endsection
