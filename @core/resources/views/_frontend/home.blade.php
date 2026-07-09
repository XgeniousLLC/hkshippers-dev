@php
use Intervention\Image\Facades\Image;
@endphp
@extends('_frontend.frontend-master')

@section('content')

    <!-- visual/banner of the page -->
@include('_frontend.partials.banner.home',['bg_img_ids'=>$bg_img_ids,'page_setting'=>$page_setting])
    
    <!--/visual/banner of the page -->
    <!-- main content wrapper -->
    <div class="content-wrapper">
    
        <section class="content-block style-2" style="padding:2rem 0;">
            <div class="container" style="border-bottom:none;">
                <div class="row multiple-row v-align-row">
                    @if(!empty($homepage_extra_text) && $homepage_extra_text->status === 'publish')
                    <div class="col-lg-12 col-md-12" style="padding:1rem 1rem .5rem 1rem;">
                        {!! $homepage_extra_text->content !!}
                    </div>
                    @endif
                    @if(sizeof($top_banner)>0)
                    <div class="col-lg-12 col-md-12 text-center image-slider" style="padding:1rem 1rem .5rem 1rem;">
                        <!-- Image container of the image slider -->
                        <div class="image-container">

                        @foreach($top_banner as $item)
                            @php
                                $image = @get_attachment_image_by_id($item->image,null,true);
                                $url = $image['img_url'];
                                $link = $item->video_url;
                                
                                $newwidth = 1140;
                                $newheight = 195;
                                $img = image_resize($url,$newwidth,$newheight);
                            @endphp
                        
                            <div class="slide">
                                <a href="{{$link}}"  target="_blank">
                                    <img class="has-radius-medium" style="width:100%;" src="{{$img}}" />
                                </a>
                            </div>

                        
                        @endforeach

                        @if(sizeof($top_banner)>1)
                            <!-- Next and Previous icon to change images -->
                            <a class="previous" onclick="moveSlides(this,-1)">
                                <i class="fa fa-chevron-circle-left"></i>
                            </a>
                            <a class="next" onclick="moveSlides(this,1)">
                                <i class="fa fa-chevron-circle-right"></i>
                            </a>
                        @endif
                        </div>
                        <br>

                        <div style="text-align:center">
                        
                        @foreach($top_banner as $i => $item)
                            
                            <span class="footerdot" onclick="activeSlide({{$i}})">
                            </span>

                            
                        @endforeach

                        </div>
                    </div>
                    @endif
                    @if(sizeof($top2_banner)>0)

                    <div class="col-lg-12 col-md-12 text-center image-slider" style="padding:1rem 1rem .5rem 1rem;">
                        <!-- Image container of the image slider -->
                        <div class="image-container">

                        @foreach($top2_banner as $item)
                            @php
                                $image = @get_attachment_image_by_id($item->image,null,true);
                                $url = $image['img_url'];
                                $link = $item->video_url;
                                
                                $newwidth = 1140;
                                $newheight = 195;
                                $img = image_resize($url,$newwidth,$newheight);
                            @endphp
                        
                            <div class="slide">
                                <a href="{{$link}}"  target="_blank">
                                    <img class="has-radius-medium" style="width:100%;" src="{{$img}}" />
                                </a>
                            </div>

                        
                        @endforeach

                        @if(sizeof($top2_banner)>1)
                    
                            <!-- Next and Previous icon to change images -->
                            <a class="previous" onclick="moveSlides(this,-1)">
                                <i class="fa fa-chevron-circle-left"></i>
                            </a>
                            <a class="next" onclick="moveSlides(this,1)">
                                <i class="fa fa-chevron-circle-right"></i>
                            </a>
                        @endif
                        </div>
                        <br>

                        <div style="text-align:center">
                        
                        @foreach($top2_banner as $i => $item)
                            
                            <span class="footerdot" onclick="activeSlide({{$i}})">
                            </span>

                            
                        @endforeach

                        </div>
                    </div>
                    @endif

                    @foreach($left_banners as $item)
                        @php
                            $image = @get_attachment_image_by_id($item->image,null,true);
                            $url = $image['img_url'];
                            $link = $item->video_url;
                                
                            $newwidth = 225;
                            $newheight = 120;
                            $img = image_resize($url,$newwidth,$newheight);
                        @endphp
                    <div class="col-lg-3 col-md-6 text-center"
                    style="padding:1rem .5rem .5rem 1rem;">
                        
                        <a href="{{$link}}"  target="_blank">
                            <img class="has-radius-medium" style="width:100%;" src="{{$img}}" />
                        </a>
                    </div>
                        
                    @endforeach
                    @foreach($right_banners as $item)
                        @php
                            $image = @get_attachment_image_by_id($item->image,null,true);
                            $url = $image['img_url'];
                            $link = $item->video_url;
                                
                            $newwidth = 225;
                            $newheight = 120;
                            $img = image_resize($url,$newwidth,$newheight);
                        @endphp
                    <div class="col-lg-3 col-md-6 text-center"
                    style="padding:1rem .5rem .5rem 1rem;">
                        
                        <a href="{{$link}}"  target="_blank">
                            <img class="has-radius-medium" style="width:100%;" src="{{$img}}" />
                        </a>
                    </div>
                        
                    @endforeach
                    @if(sizeof($bottom_banners)>0)

                    <div class="col-lg-12 col-md-12 text-center image-slider" style="padding:1rem 1rem .5rem 1rem;">
                        <!-- Image container of the image slider -->
                        <div class="image-container">

                        @foreach($bottom_banners as $item)
                            @php
                                $image = @get_attachment_image_by_id($item->image,null,true);
                                $url = $image['img_url'];
                                $link = $item->video_url;
                                
                                $newwidth = 1140;
                                $newheight = 195;
                                $img = image_resize($url,$newwidth,$newheight);
                            @endphp

                                <div class="slide">
                                    <a href="{{$link}}"  target="_blank">
                                        <img class="has-radius-medium" style="width:100%;" src="{{$img}}" />
                                    </a>
                                </div>

                            
                        @endforeach

                            @if(sizeof($bottom_banners)>1)

                                <!-- Next and Previous icon to change images -->
                                <a class="previous" onclick="moveSlides(this,-1)">
                                    <i class="fa fa-chevron-circle-left"></i>
                                </a>
                                <a class="next" onclick="moveSlides(this,1)">
                                    <i class="fa fa-chevron-circle-right"></i>
                                </a>
                            @endif
                            </div>
                            <br>

                            <div style="text-align:center">
                            
                            @foreach($bottom_banners as $i => $item)
                                
                                <span class="footerdot" onclick="activeSlide({{$i}})">
                                </span>

                                
                            @endforeach

                            </div>
                    </div>
                    @endif
                </div>
            </div>
        </section>
        @include('_frontend.partials.news-block')  
        @include('_frontend.partials.from-the-council-block')  
        @include('_frontend.partials.events-block')  
        @include('_frontend.partials.events2-block')  
        @php
            $bg_img = get_attachment_image_by_id($bg_img_id2,null,false);

        @endphp
        <section class="content-block quotation-block black-overlay-6 parallax " data-stellar-background-ratio="0.55" style="background-position: 50% -85.8262px;@if(@$bg_img['img_url']) background-image:url('{{$bg_img['img_url']}}') @endif">
            <div class="container no-border">
                <div class="inner-wrapper text-white">
                    <h3 class="text-white">{{__('Let\'s View')}}</h3>
                    <h2 class="text-white">{{__('Chairman\'s Message')}}</h2>
                    <div class="btn-container">
                        <a href="{{route('frontend.page',['type'=>'chairman-message'])}}" class="btn btn-primary has-radius-small">{{__('View')}}</a>
                    </div>
                </div>
            </div>
        </section>

        @include('_frontend.partials.biz-links-block')  
    </div>
        
    <!--/main content wrapper -->
    
@endsection
