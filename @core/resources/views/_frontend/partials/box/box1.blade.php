
<div class="col-lg-4 col-md-6"
                                    >
                                    <div class="col-wrap">
                                        <div class="ico-box bg-gray-light has-radius-medium" >
                                            @if(@!empty($image))
                                            <figure class="picture-item img-block   " style="margin-top:0;margin-bottom:10px;">
                                                <a @if($link) href="{{$link}}" @endif @if(@$target) target="{{$target}}" @endif>
                                                    <img style="text-align:center;max-width:100px;max-height:100px;" src="{{$image['img_url']}}" >
                                                </a>
                                            </figure>
                                            @endif
                                            <h4 class="content-title"><a href="{{$link}}?back={{str_replace('/hkshippers/','',$_SERVER['REQUEST_URI'])}}" @if(@$target) target="{{$target}}" @endif>
                                                @php 
                                                echo str_replace("\n",'<br>',$title)
                                                @endphp
                                            </a></h4>
                                            <div class="des " style="display:none;">
                                                <p>
                                                @if(strlen($descr) > 80)
                                                
                                                {{html_entity_decode(substr($descr, 0, 77)) . '...'}}
                                                @else
                                                {{html_entity_decode($descr)}}
                                                @endif
                                                </p>
                                            </div>
                                            <div class="link-holder">
                                                <a class="link-more" href="{{$link}}?back={{str_replace('/hkshippers/','',$_SERVER['REQUEST_URI'])}}" @if(@$target) target="{{$target}}" @endif>{{__('READ MORE')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>