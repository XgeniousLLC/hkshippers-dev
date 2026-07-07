@php 
$subtitle = '';
$text = '';
$delay = 9000;
if($page_setting){
    $images = json_decode($page_setting->image,true);
    $is_null = true;
    foreach($images as $image){
        if($image){
            $is_null = false;
            break;
        }
    }
    if(!$is_null){
        $bg_img_ids = $images;

    }
 
    $title = $page_setting->title;
    $subtitle = $page_setting->author;
    $text = $page_setting->content;

    if(is_numeric($page_setting->excerpt)){
        $delay = (float)$page_setting->excerpt*1000;
    }
}else{
    $title = __($title);
    $subtitle = __($subtitle);
    $text = __($text);

}
@endphp
<div class="banner banner-home">
                    <!-- revolution slider starts -->
                    <div id="rev_slider_279_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="restaurant-header" style="margin:0px auto;background-color:#fff;padding:0px;margin-top:0px;margin-bottom:0px;">
                        <div id="rev_slider_70_1" class="rev_slider fullscreenabanner" 
                        data-delay="{{$delay}}"
                        style="display:none;" data-version="5.1.4">
                            <ul>
                                @php
                                foreach($bg_img_ids as $i => $bg_img_id){
                                    if(!$bg_img_id){
                                        continue;
                                    }
                                @endphp
                                <li class="slider-color-schema-dark" data-index="rs-{{$i}}" data-transition="fade" data-slotamount="7" data-easein="default" data-easeout="default" data-masterspeed="1000" data-rotate="0" data-saveperformance="off" data-title="Slide" data-description="">
                                    <!-- main image for revolution slider -->
                                    @php
                                        $bg_img = get_attachment_image_by_id($bg_img_id,null,false);

                                    @endphp
                                    <img @if(!empty($bg_img) src="{{$bg_img['img_url']}}" @endif alt="" data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-bgfit="cover" data-no-retina>
                                    <div class="tp-caption tp-shape tp-shapewrapper" id="slide-1699-layer-10" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-width="full"
                                    data-height="full" data-whitespace="nowrap" data-type="shape" data-basealign="slide" data-responsive_offset="on" data-responsive="off" data-frames='[{"from":"y:0;sX:1;sY:1;opacity:0;","speed":2500,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="background-color:rgba(0, 0, 0, 0.57);"> </div>
                                </li>
                                
                                @php 
                                }
                                @endphp
                            </ul>
                        </div>
                        <div class="a-slider-title col-md-6">
                        
                            <div class="slider-sub-title text-white">
                                {{$subtitle}}
                            </div>
                            <div class="slider-main-title text-white">

                            {{$title}}
                            </div>
                            <div class="slider-text text-white">
                                
                                <a  href="{{route('homepage')}}" style="color:white"> {{__('Home')}} </a>
                                @php
                                foreach($routes as $route){
                                    echo '/'.__($route);

                                }
                                @endphp
                                <div style="margin-top:.5em;">
                                    {{$text}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
