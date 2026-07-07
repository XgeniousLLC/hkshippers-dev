

    <section class="content-block style-2">
        <div class="container" >
            <div class="row multiple-row v-align-row">
                <div class="col-lg-4 col-md-6">
                    <div class="col-wrap">
                        <div class="block-heading">
                            <h3 class="block-top-heading">{{__('Our')}}</h3>
                            <h2 class="block-main-heading">{{__('Council Events')}}</h2>
                            <span class="block-sub-heading">{{__('In HKSC')}}</span>
                            

                        </div>
                    </div>
                </div>
                
            @foreach($all_events as $item)
                @php
                    $image = null;
                    
                    $image = @get_attachment_image_by_id($item->icon,null,false);
                    $link = route('frontend.page.event',['id'=>$item->id]);
                    $item->content = preg_replace('/[<]((?:(?![>]).))+[>]/','',$item->content);
                    $descr = $item->content;
                    $title = $item->title;
                @endphp
                @include('_frontend.partials.box.box1')
                
            @endforeach
                
                <div class="col-lg-4 col-md-6">
                    <div class="col-wrap">
                        <div class="ico-box bg-gray-light has-radius-medium">
                            <div class="icon">
                                
                            </div>
                            <h4 class="content-title"><a href="{{route('frontend.page',['type'=>'councils-events'])}}">{{__('Others')}}</a></h4>
                            <div class="des">
                                
                            </div>
                            <div class="link-holder">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
                    