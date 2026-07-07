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
                        $target = null;
                        if($item->type2==='on'){
                            
                            $target = '_blank';
                            
                            $attachment = @get_attachment_image_by_id($item->tags,null,true);
                            $link = $attachment['img_url'];

                        }else{
                            $link = route('frontend.page.post',['id'=>$item->id,'type'=>$item->type]);

                        }

                        $image = @get_attachment_image_by_id($item->attachment,null,false);
                        $item->content = preg_replace('/[<]((?:(?![>]).))+[>]/','',$item->content);
                        $descr = $item->content;
                        $title = $item->title;
                    @endphp
                    @include('_frontend.partials.box.box1')
                @endforeach
                    <div class="col-md-12 pagination-wrapper ">


                    {{$items->links()}}

                    </div>
                </div>
            </div>
        </section>
    </div>
        
    <!--/main content wrapper -->

@endsection
