                    
                        <div class="" style="display: flex;
                            align-items: center;
                            align-content: center;
                            flex-wrap: nowrap;
                            justify-content: center;
                            flex-direction: column;
                            padding-top:1.7rem">
                        @php 
                            if(!empty($bg_img)) {
                                
                                
                                $newwidth = 110;
                                $newheight = 150;
                                $img = image_resize($bg_img['img_url'],$newwidth,$newheight);
                        @endphp
                                <img src="{{$img}}" style="display:block;"/>
                                
                        @php 
                            }
                        @endphp
                            <br>
                            <h5>{{$item->name}}</h5>
                            <h6>{{$item->company}}</h6>
                        </div>