@extends('_frontend.frontend-master')

@section('content')

    <!-- visual/banner of the page -->
@include('_frontend.partials.banner.banner1',['bg_img_ids'=>$bg_img_ids,'page_setting'=>$page_setting,'title'=>$title,'routes'=>$routes])
@php
    $bg_img = get_attachment_image_by_id($item->image,null,false);

@endphp
    <!--/visual/banner of the page -->
    <!-- main content wrapper -->
    <div class="content-wrapper">
    
        <section class="content-block " >
            <div class="container" style="border-bottom:none;">
                <div class="row multiple-row v-align-row" style="display: flex;
    align-items: flex-start;">
                    <div class="col-md-12">
                        <h2 class="text-center">{{$item->title}}</h2>
                    </div>
                    <div class="col-md-6">
                    @php 
                        if(!empty($bg_img)) {
                    @endphp
                            <img src="{{$bg_img['img_url']}}" />
                            
                    @php 
                        }
                    @endphp
                    </div>
                    <div class="col-md-6">
                        @php
                            echo str_replace("\n",'<br>',$item->content);
                        @endphp

                    </div>
                </div>
            </div>
        </section>
    </div>
        
    <!--/main content wrapper -->

@endsection
