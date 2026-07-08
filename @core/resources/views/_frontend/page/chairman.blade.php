@extends('_frontend.frontend-master')

@section('content')

    <!-- visual/banner of the page -->
@include('_frontend.partials.banner.banner1',['bg_img_ids'=>$bg_img_ids,'page_setting'=>$page_setting,'title'=>$title,'routes'=>$routes])
    <!--/visual/banner of the page -->
    <!-- main content wrapper -->
    <div class="content-wrapper ">
        <section class="content-block chairman" >
            <div class="container" style="border-bottom:none;">
                
                <div class="row multiple-row v-align-row">
                
            @foreach($items as $item)
            
                @php
                    $bg_img = get_attachment_image_by_id($item->image,null,false);

                @endphp
                    <div class="col-md-12 flex-content" style="margin-bottom: 40px; clear: both; display: flex; align-items: center; flex-wrap: wrap;">
                    
                        <div class="col-md-6 " style="display: flex;
                            align-items: center;
                            align-content: center;
                            flex-wrap: nowrap;
                            justify-content: center;
                            flex-direction: column;
                            padding-top:1.7rem">
                        @php 
                            if(!empty($bg_img)) {
                                $newwidth = 200;
                                $newheight = 266;
                                $img = image_resize($bg_img['img_url'],$newwidth,$newheight);

                        @endphp
                                <img src="{{$img}}" style="display:block;"/>
                                
                        @php 
                            }
                        @endphp
                            <b>{{$item->author}}</b>
                        </div>
                        <div class="col-md-6 " style="padding:1.7rem 0;">

                            <h4 class="text-center">{{$item->name}}</h4>
                            <h5 class="text-center">{{$item->title}}</h5>
                            
                        </div>
                    </div>
            @endforeach
                </div>
            </div>
        </section>
    </div>
        
    <!--/main content wrapper -->

@endsection
