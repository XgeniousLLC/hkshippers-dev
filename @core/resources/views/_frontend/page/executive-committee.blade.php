@extends('_frontend.frontend-master')

@section('content')

    <!-- visual/banner of the page -->
@include('_frontend.partials.banner.banner1',['bg_img_ids'=>$bg_img_ids,'page_setting'=>$page_setting,'title'=>$title,'routes'=>$routes])
    <!--/visual/banner of the page -->
    <!-- main content wrapper -->
    <div class="content-wrapper ">
        <section class="content-block " >
            <div class="container" style="border-bottom:none;">
                @php 
                
                @endphp
                <div class="row multiple-row  " style="align-items: flex-start;">
                    <h4 class=" col-md-12">{{__('Chairman')}}</h4>
                    @foreach($items[1] as $item)
                    
                        @php
                            $bg_img = get_attachment_image_by_id($item->image,null,false);

                        @endphp
                        <div class="col-md-12 text-center">

                            @include('_frontend.partials.box.executive-committee',['bg_img_ids'=>$bg_img_ids,'title'=>$title,'routes'=>$routes])
                        </div>
                            
                    @endforeach
                    <h4 class=" col-md-12" style="margin-top:2em;">{{__('Vice Chairman')}}</h4>

                    @foreach($items[2] as $item)
                    
                        @php
                            $bg_img = get_attachment_image_by_id($item->image,null,false);

                        @endphp
                        <div class="col-md-12 text-center">

                            @include('_frontend.partials.box.executive-committee',['bg_img_ids'=>$bg_img_ids,'title'=>$title,'routes'=>$routes])
                        </div>
                            
                    @endforeach
                    <h4 class=" col-md-12" style="margin-top:2em;">{{__('Member')}}</h4>

                    @foreach($items[3] as $item)
                    
                        @php
                            $bg_img = get_attachment_image_by_id($item->image,null,false);

                        @endphp
                        <div class=" col-md-6 col-lg-4 text-center">

                            @include('_frontend.partials.box.executive-committee',['bg_img_ids'=>$bg_img_ids,'title'=>$title,'routes'=>$routes])
                        </div>
                            
                    @endforeach
                    @if(isset($items[4]) && $items[4]->isNotEmpty())

                        <h4 class="col-md-12" style="margin-top:2em;">{{__('Executive Director')}}</h4>

                        @foreach($items[4] as $item)
                            @php
                                // It's good practice to check if the image exists
                                $bg_img = get_attachment_image_by_id($item->image, null, false);
                            @endphp
                            <div class="col-md-6 col-lg-4 text-center">
                                {{-- I noticed you were passing variables not defined in the loop ($bg_img_ids, $title, $routes) --}}
                                {{-- You probably want to pass data from the $item --}}
                                @include('_frontend.partials.box.executive-committee', [
                                    'bg_img' => $bg_img,
                                    'title' => $item->title, // Example: pass the item's title
                                    'routes' => $item->url    // Example: pass the item's url
                                ])
                            </div>
                        @endforeach

                    @endif
                    <h4 class=" col-md-12 " style="margin-top:2em;">{{__('Secretary')}}</h4>

                    @foreach($items[5] as $item)
                    
                        @php
                            $bg_img = get_attachment_image_by_id($item->image,null,false);

                        @endphp
                        <div class=" col-md-6 col-lg-4 text-center">

                            @include('_frontend.partials.box.executive-committee',['bg_img_ids'=>$bg_img_ids,'title'=>$title,'routes'=>$routes])
                        </div>
                            
                    @endforeach
                </div>
            </div>
        </section>
    </div>
        
    <!--/main content wrapper -->

@endsection
