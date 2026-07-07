
<div class="col-lg-4 col-md-6"
                                    >
                                    <div class="col-wrap">
                                        <div class="ico-box bg-gray-light has-radius-medium" >
                                        <figure class="picture-item img-block shine-effect image-zoom port-v2" style="margin-top:0;">
                                            <a @if($link) href="{{$link}}" @endif target="_blank">
                                                <img src="{{$url}}" >
                                            </a>
                                        </figure>
                                            <h4 class="content-title"><a 
                                             @if($link&&$link!=='#') 
                                             href="{{$link}}" target="_blank" @endif>{{$title}}</a></h4>
                                            
                                        </div>
                                    </div>
                                </div>