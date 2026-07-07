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
                    $attachment = null;
                    $attachment_url = '';
                    $url = '';
                    $image = @get_attachment_image_by_id($item->image,null,false);
                    $attachment = @get_attachment_image_by_id($item->attachment,null,false);
                    if(!empty($image)){
                        $url = $image['img_url'];

                    }
                    if(!empty($attachment)){
                        $attachment_url = $attachment['img_url'];

                    }
                    $link = $item->video_url??$attachment_url??'#';
                    $item->content = preg_replace('/[<]((?:(?![>]).))+[>]/','',$item->content);
                    $descr = $item->content;
                    $title = $item->title;
                @endphp
                @include('_frontend.partials.box.box3')
            @endforeach
                </div>
            </div>
        </section>
    </div>
        
    <!--/main content wrapper -->

@endsection
