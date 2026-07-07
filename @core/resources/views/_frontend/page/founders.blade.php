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
                    <div class="col-md-12 ">
                    @php
                        echo @str_replace("\n",'<br>',$info->content);
                    @endphp
                    </div>
                
            @foreach($items as $item)
            
                    <div class="col-md-12 ">
                    

                        <a @if($item->website1) href="{{$item->website1}}" @endif style="font-size:1.3em;" target="_blank"><b>{{$item->company}}</b></a>
                            
                    </div>
            @endforeach
                </div>
            </div>
        </section>
    </div>
        
    <!--/main content wrapper -->

@endsection
