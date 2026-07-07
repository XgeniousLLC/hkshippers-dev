@extends('_frontend.frontend-master')

@section('content')

    <!-- visual/banner of the page -->
@include('_frontend.partials.banner.banner1',['bg_img_ids'=>$bg_img_ids,'page_setting'=>$page_setting,'title'=>$title,'routes'=>$routes])
    <!--/visual/banner of the page -->
    <!-- main content wrapper -->
    <div class="content-wrapper ">
        <section class="content-block " >
            <div class="container" style="border-bottom:none;">
                
                <div class="row multiple-row " style="align-items: flex-start;">
                
            @foreach($items as $item)
            
                @php
                    $bg_img = get_attachment_image_by_id($item->image,null,false);

                @endphp
                    <div class="col-md-6 ">
                    
                        <div class="col-md-12 " style="display: flex;
                            align-items: center;
                            align-content: center;
                            flex-wrap: nowrap;
                            justify-content: center;
                            flex-direction: column;
                            padding-top:1.7rem">
                        @php 
                            if(!empty($bg_img)) {
                        @endphp
                                <img src="{{$bg_img['img_url']}}" style="display:block;"/>
                                
                        @php 
                            }
                        @endphp
                            <b>{{$item->author}}</b>
                        </div>
                        <div class="col-md-12 " style="padding:1.7rem 0;">
                            <h5 class="">{{$item->title}}</h5>

                            <h4 class="">{{$item->name}}</h4>
                            
                            <div class="">
                                @php
                                echo str_replace("\n",'<br>',$item->content);
                                @endphp

                            </div>
                        </div>
                    </div>
            @endforeach
                </div>
            </div>
        </section>
    </div>
        
    <!--/main content wrapper -->

@endsection
