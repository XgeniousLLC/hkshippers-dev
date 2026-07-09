@extends('_frontend.frontend-master')

@section('content')
<style>
.councils-events-row > [class*="col-"] { display: -webkit-box !important; display: -ms-flexbox !important; display: flex !important; -webkit-box-orient: vertical !important; -webkit-box-direction: normal !important; -ms-flex-direction: column !important; flex-direction: column !important; }
.councils-events-row .col-wrap { display: -webkit-box !important; display: -ms-flexbox !important; display: flex !important; -webkit-box-orient: vertical !important; -webkit-box-direction: normal !important; -ms-flex-direction: column !important; flex-direction: column !important; -webkit-box-flex: 1 !important; -ms-flex: 1 !important; flex: 1 !important; margin-bottom: 0 !important; }
.councils-events-row .ico-box { display: -webkit-box !important; display: -ms-flexbox !important; display: flex !important; -webkit-box-orient: vertical !important; -webkit-box-direction: normal !important; -ms-flex-direction: column !important; flex-direction: column !important; -webkit-box-flex: 1 !important; -ms-flex: 1 !important; flex: 1 !important; }
.councils-events-row .ico-box .link-holder { margin-top: auto !important; }
</style>
    <!-- visual/banner of the page -->
@include('_frontend.partials.banner.banner1',['bg_img_ids'=>$bg_img_ids,'page_setting'=>$page_setting,'title'=>$title,'routes'=>$routes])
    <!--/visual/banner of the page -->
    <!-- main content wrapper -->
    <div class="content-wrapper ">
        <section class="content-block chairman" >
            <div class="container" style="border-bottom:none;">
                
                <div class="row multiple-row v-align-row councils-events-row">
                
            @foreach($items as $item)

                @php
                    $link = route('frontend.page.event',['id'=>$item->id]);
                    $image = @get_attachment_image_by_id($item->icon,null,false);
                    $event_image = @get_attachment_image_by_id($item->banner_image,null,false);
                    $item->content = preg_replace('/[<]((?:(?![>]).))+[>]/','',$item->content);
                    $descr = $item->content;
                    $title = $item->title;
                @endphp
                @if(!empty($event_image['img_url']))
                <div class="col-lg-4 col-md-6" style="margin-bottom:20px;">
                    <div class="col-wrap">
                        <div class="ico-box bg-gray-light has-radius-medium">
                            <a href="{{$link}}">
                                <img src="{{$event_image['img_url']}}" style="width:100%;height:auto;margin-bottom:10px;">
                            </a>
                            <h4 class="content-title"><a href="{{$link}}?back={{str_replace('/hkshippers/','',$_SERVER['REQUEST_URI'])}}">@php echo str_replace("\n",'<br>',$title) @endphp</a></h4>
                            <div class="link-holder">
                                <a class="link-more" href="{{$link}}?back={{str_replace('/hkshippers/','',$_SERVER['REQUEST_URI'])}}">{{__('READ MORE')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                @include('_frontend.partials.box.box1')
                @endif
            @endforeach
                </div>
            </div>
        </section>
    </div>
        
    <!--/main content wrapper -->

<script>
(function($){
    function equalizeCards() {
        var cards = $('.councils-events-row .ico-box');
        cards.css('min-height', '');
        var max = 0;
        cards.each(function(){ if($(this).outerHeight() > max) max = $(this).outerHeight(); });
        cards.css('min-height', max + 'px');
    }
    $(window).on('load resize', equalizeCards);
})(jQuery);
</script>

@endsection
