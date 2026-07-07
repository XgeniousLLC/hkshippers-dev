

    <section class="content-block style-2">
        <div class="container">
            <div class="row multiple-row v-align-row">
                <div class="col-lg-4 col-md-6">
                    <div class="col-wrap">
                        <div class="block-heading">
                            <h3 class="block-top-heading">{{__('Our')}}</h3>
                            <h2 class="block-main-heading">{{__('Publications')}}</h2>
                            <span class="block-sub-heading">{{__('Information')}}</span>
                            

                        </div>
                    </div>
                </div>
                
            @foreach($all_publications as $item)
                @php
                    $image = @get_attachment_image_by_id($item->image,null,true);
                    $attachment = @get_attachment_image_by_id($item->attachment,null,true);
                    $url = $image['img_url'];
                    $attachment_url = $attachment['img_url'];
                    $link = $item->video_url??$attachment_url??'#';
                    $item->content = preg_replace('/[<]((?:(?![>]).))+[>]/','',$item->content);
                    $descr = $item->content;
                    $title = $item->title;
                @endphp
                @include('_frontend.partials.box.box3')
                
            @endforeach
                
                <div class="col-lg-4 col-md-6">
                    <div class="col-wrap">
                        <div class="ico-box bg-gray-light has-radius-medium">
                            <div class="icon">
                                
                            </div>
                            <h4 class="content-title"><a href="{{route('frontend.page',['type'=>'reference-book'])}}">{{__('Others')}}</a></h4>
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
                    