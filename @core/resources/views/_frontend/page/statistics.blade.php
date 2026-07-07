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
                    
            @foreach($cats as $i => $cat)
                    <div class="col-md-12 "  style="padding-top:2em;">
                        <h4  class="after-arrow @if($i===0||$i===sizeof($cats)-1) @else reverse @endif"><b>{{$cat->name}}</b></h4>
                        <ul  >
                            @foreach(@$items[$cat->id] as $item)
                                @php 
                                
                                    $attachment = null;
                                    $attachment_url = '';
                                    $attachment = @get_attachment_image_by_id($item->attachment,null,false);
                                    if(!empty($attachment)){
                                        $attachment_url = $attachment['img_url'];

                                    }
                                    $link = $item->video_url??$attachment_url??'#';
                                @endphp
                                    <li>

                                    <a @if($link) href="{{$link}}" @endif style="font-size:1.3em;" target="_blank">{{$item->title}}</a>
                                    </li>
                            @endforeach
                        </ul> 
                    </div>
                    <div class="col-md-12 ">
                         
                    </div>

            @endforeach
                    <div class="col-md-12 ">

                    @php
                        echo @str_replace("\n",'<br>',$info->content);
                    @endphp
                    </div>
                </div>
            </div>
        </section>
    </div>
        
    <!--/main content wrapper -->
<script>
$('body').on('click','.after-arrow',function(){
    $(this).toggleClass('reverse');
})
</script>
@endsection
