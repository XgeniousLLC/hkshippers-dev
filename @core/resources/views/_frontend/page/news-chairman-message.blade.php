@extends('_frontend.frontend-master')

@section('content')

    <!-- visual/banner of the page -->
@include('_frontend.partials.banner.banner1',['bg_img_ids'=>$bg_img_ids,'page_setting'=>$page_setting,'title'=>$title,'routes'=>$routes])
    <!--/visual/banner of the page -->
    <!-- main content wrapper -->
    <div class="content-wrapper ">
        <section class="content-block " >
            <div class="container" style="border-bottom:none;">
                
                <div class="row multiple-row v-align-row">
                
            
                @php
                    $bg_img = get_attachment_image_by_id($item->image,null,false);
                    $attachment = get_attachment_image_by_id($item->attachment,null,false);

                @endphp
                    <div class="col-md-12 text-right">
                
                        @php 
                            if(!empty($attachment)) {
                        @endphp  
                            <a href="{{$attachment['img_url']}}" target="_blank"  class="btn btn-secondary" ><b>{{__('Download PDF')}}</b></a>
                            <a href="{{route('frontend.page',['type'=>'news-chairman-message-past-issue'])}}"  class="btn btn-secondary" ><b>{{__('Past Issue')}}</b></a>
                            
                        @php 
                            }
                        @endphp
                    </div>
                    <div class="col-md-12 " style="padding-top:1.5em;">
                        <h2 class="text-center">{{$item->title}}</h2>
                    </div>
                    <div class="col-md-12">
                    
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
                        
                            
                            <div class="col-md-12">
                                @php
                                    echo str_replace("\n",'<br>',$item->content);
                                @endphp

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
        
    <!--/main content wrapper -->

@endsection
