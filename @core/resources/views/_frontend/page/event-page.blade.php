@extends('_frontend.frontend-master')

@section('content')

    <!-- visual/banner of the page -->
@include('_frontend.partials.banner.banner1',['bg_img_ids'=>$bg_img_ids,'page_setting'=>$page_setting,'title'=>$title,'routes'=>$routes])
    <!--/visual/banner of the page -->
    <!-- main content wrapper -->
    <div class="content-wrapper ">
        <section class="content-block chairman" >
            <div class="container" style="border-bottom:none;">
                
                <div class="row multiple-row v-align-row" style="display: flex;
    align-items: flex-start;">
                
                @php 
                
                    $image = null;
                    $image_url = '';
                    $image = @get_attachment_image_by_id($item->image,null,false);
                    if(!empty($image)){
                        $image_url = $image['img_url'];

                    }
                    $attachment = null;
                    $attachment_url = '';
                    $attachment = @get_attachment_image_by_id($item->attachment,null,false);
                    if(!empty($attachment)){
                        $attachment_url = $attachment['img_url'];

                    }
                    $link = $item->video_url??$attachment_url??'#';

                    $icon = @get_attachment_image_by_id($item->icon,null,false);
                    if(!empty($icon)){
                        $icon = $icon['img_url'];

                    }
                    
                    
                    $newwidth = 150;
                    $newheight = 150;
                    $img_icon = $icon;
                    if(false&&$icon){
                        $img_icon = image_resize($icon,$newwidth,$newheight);

                    }
                @endphp
                <div class="col-md-6 ">
                    @if($image_url)

                    <img src="{{$image_url}}" >
                    @endif        
                </div>
                <div class="col-md-6 row" >
                    <div class="col-md-12 event-page-title" id="event-page-title" style="display: flex;
    align-items: center;">
                        <div class="text-center " style="width:{{$newwidth}}px;display:inline-block;vertical-align:top;">
                        @if($img_icon)

                        <img style=" width:auto;height:auto;" src="{{$img_icon}}" >
                        @endif        
                        </div>  
                        <h4 style="width:calc(100% - {{$newwidth}}px - 10px);display:inline-block;vertical-align:middle;">{{$item->title}}</h4>
                    </div>
                    <div class=" " style="width:100%;display: flex;
                    flex-direction: row;
                    flex-wrap: wrap;
                    align-items: center;
                    justify-content: flex-start;
                    align-content: center;">

                        <div class="col-md-4 ">
                            <h6 class="bg-color-pirmary" style="padding:1.2em 1em;">{{__('Topic')}}</h6>
                        </div>

                        <div class="col-md-8 ">
                            <h6 class="" style="padding:1.2em 1em;">{{$item->title}}</h6>
                        </div>
                    </div>
                    
                    <div class=" " style="width:100%;display: flex;
                    flex-direction: row;
                    flex-wrap: wrap;
                    align-items: center;
                    justify-content: flex-start;
                    align-content: center;">
                        <div class="col-md-4 ">
                            <h6 class="bg-color-pirmary" style="padding:1.2em 1em;">{{__('Date')}}</h6>
                        </div>

                        <div class="col-md-8 ">
                            <h6 class="" style="padding:1.2em 1em;">{{$item->date}} {{$item->time}}</h6>
                        </div>
                    </div>
                    
                    <div class=" " style="width:100%;display: flex;
                    flex-direction: row;
                    flex-wrap: wrap;
                    align-items: center;
                    justify-content: flex-start;
                    align-content: center;">
                        <div class="col-md-4 ">
                            <h6 class="bg-color-pirmary" style="padding:1.2em 1em;">{{__('Organizer(s)')}}</h6>
                        </div>

                        <div class="col-md-8 ">
                            <h6 class="" style="padding:1.2em 1em;">{{$item->organizer}}</h6>
                        </div>
                    </div>
                    
                    <div class=" " style="width:100%;display: flex;
                    flex-direction: row;
                    flex-wrap: wrap;
                    align-items: center;
                    justify-content: flex-start;
                    align-content: center;">
                        <div class="col-md-4 ">
                            <h6 class="bg-color-pirmary" style="padding:1.2em 1em;">{{__('Speaker')}}</h6>
                        </div>

                        <div class="col-md-8 ">
                            <h6 class="" style="padding:1.2em 1em;">{{$item->speaker}}</h6>
                        </div>
                        
                    </div>
                    
                    <div class=" " style="width:100%;display: flex;
                    flex-direction: row;
                    flex-wrap: wrap;
                    align-items: flex-star;
                    justify-content: flex-start;
                    align-content: center;">
                        <div class="col-md-4 ">
                            <h6 class="bg-color-pirmary" style="padding:1.2em 1em;">{{__('Description')}}</h6>
                        </div>

                        <div class="col-md-8 ">
                            <div class="" style="padding:1.2em 1em;">
                            @php 
                            echo str_replace("\n",'<br>',$item->content);
                             
                            
                            @endphp
                            </div>
                            
                            @if($link)
                            <a href="{{$link}}"  class="btn btn-secondary" target="_blank"><b>{{__('More')}}</b></a>
                            @endif        
                        </div>
                        
                    </div>
                    
                    <div class=" " style="width:100%;display: flex;
                    flex-direction: row;
                    flex-wrap: wrap;
                    align-items: center;
                    justify-content: flex-start;
                    align-content: center;">
                        <div class="col-md-4 ">
                            <h6 class="bg-color-pirmary" style="padding:1.2em 1em;">{{__('Language')}}</h6>
                        </div>

                        <div class="col-md-8 ">
                            <h6 class="" style="padding:1.2em 1em;">{{$item->language}}</h6>
                        </div>
                        
                    </div>
                    
                    <div class=" " style="width:100%;display: flex;
                    flex-direction: row;
                    flex-wrap: wrap;
                    align-items: center;
                    justify-content: flex-start;
                    align-content: center;">
                        <div class="col-md-4 ">
                            <h6 class="bg-color-pirmary" style="padding:1.2em 1em;">{{__('Fee')}}</h6>
                        </div>

                        <div class="col-md-8 ">
                            <h6 class="" style="padding:1.2em 1em;">{{$item->fee}}</h6>
                        </div>
                        
                    </div>
                    
                    <div class=" " style="width:100%;display: flex;
                    flex-direction: row;
                    flex-wrap: wrap;
                    align-items: center;
                    justify-content: flex-start;
                    align-content: center;">
                        <div class="col-md-4 ">
                            <h6 class="bg-color-pirmary" style="padding:1.2em 1em;">{{__('Venue')}}</h6>
                        </div>

                        <div class="col-md-8 ">
                            <h6 class="" style="padding:1.2em 1em;">{{$item->venue}}</h6>
                        </div>
                        
                    </div>
                    
                    <div class=" " style="width:100%;display: flex;
                    flex-direction: row;
                    flex-wrap: wrap;
                    align-items: center;
                    justify-content: space-between;
                    align-content: center;">
                        <div class="col-md-4 " style="">

                            <a href="{{url(@$_GET['back']??'/')}}"  class="btn btn-secondary" ><b>{{__('Back')}}</b></a>
                        </div>
                        <div class="col-md-4 " style="">
                            <a href="{{route('frontend.page.form2',['type'=>'councils-events','id'=>$item->id])}}"  class="btn btn-secondary" ><b>{{__('Apply')}}</b></a>
                        </div>
                    </div>

                </div>
                </div>
            </div>
        </section>
    </div>
        
    <!--/main content wrapper -->

@endsection
