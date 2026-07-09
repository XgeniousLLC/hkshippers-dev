
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group" style="display:none;">
                                        <label for="language"><strong>{{__('Language')}}</strong></label>
                                        <select name="lang" id="language" class="form-control" >
                                            @foreach($all_languages as $lang)
                                                <option @if($lang->slug == $event->lang) selected @endif value="{{$lang->slug}}">{{$lang->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        @foreach($all_languages as $i => $lang)

                                            <li class="nav-item">
                                                <a class="nav-link @if($i == 0) active @endif"  data-toggle="tab" href="#slider_tab_{{$lang->slug}}" role="tab" aria-controls="home" aria-selected="true">{{$lang->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content margin-top-40" id="myTabContent">
                                        @foreach($all_languages as $i => $lang)

                                            <div class="tab-pane fade @if($i == 0) show active @endif" id="slider_tab_{{$lang->slug}}" role="tabpanel" >
                                                <div class="table-wrap table-responsive">

                                                    <div class="form-group">
                                                        <label for="title-{{$lang->slug}}">{{__('Title')}}</label>
                                                        <input type="text" class="form-control"  id="title-{{$lang->slug}}" name="title-{{$lang->slug}}" value="@php echo $event->{"title-{$lang->slug}"} @endphp" >
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>{{__('Description')}}</label>
                                                        <input type="hidden" name="event_content-{{$lang->slug}}" >
                                                        <div class="summernote" data-content='@php echo str_replace("'","&#39;",$event->{"content-{$lang->slug}"}) @endphp'></div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="language-{{$lang->slug}}">{{__('Language')}}</label>
                                                        <input type="text" class="form-control"  id="language-{{$lang->slug}}" name="language-{{$lang->slug}}" value="@php echo $event->{"language-{$lang->slug}"} @endphp" placeholder="{{__('Language')}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="organizer-{{$lang->slug}}">{{__('Organizer')}}</label>
                                                        <input type="text" class="form-control"  id="organizer-{{$lang->slug}}" name="organizer-{{$lang->slug}}" value="@php echo $event->{"organizer-{$lang->slug}"} @endphp" placeholder="{{__('Event Organizer')}}">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="speaker-{{$lang->slug}}">{{__('Speaker')}}</label>
                                                        <input type="text" class="form-control"  id="speaker-{{$lang->slug}}" name="speaker-{{$lang->slug}}" value="@php echo $event->{"speaker-{$lang->slug}"} @endphp" placeholder="{{__('Speaker')}}">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="venue-{{$lang->slug}}">{{__('Venue')}}</label>
                                                        <input type="text" class="form-control"  id="venue-{{$lang->slug}}" name="venue-{{$lang->slug}}" value="@php echo $event->{"venue-{$lang->slug}"} @endphp" placeholder="{{__('Event Venue')}}">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="form-group" style="display:none;">
                                        <label for="slug">{{__('Slug')}}</label>
                                        <input type="text" class="form-control"  id="slug" name="slug" value="{{$event->slug}}" placeholder="{{__('slug')}}">
                                    </div>
                                    
                                    


                                </div>
                                <div class="col-lg-4">
                                
                                    <div class="form-group">
                                        <label for="seq_no">{{__('Seq No.')}}</label>
                                        <input type="text" class="form-control"  id="seq_no" name="seq_no" value="{{$event->seq_no}}" placeholder="{{__('Seq No.')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="date">{{__('Date')}}</label>
                                        <input type="date" class="form-control" value="{{$event->date}}" id="date" name="date" >
                                    </div>
                                    <div class="form-group">
                                        <label for="time">{{__('Time')}}</label>
                                        <input type="text" class="form-control"  id="time" name="time" value="{{$event->time}}" placeholder="{{__('time')}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="fee">{{__('Fee')}}</label>
                                        <input type="text" class="form-control" value="{{$event->fee}}" id="fee" name="fee" placeholder="{{__('Fee')}}">
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label for="form_type">{{__('Form Type')}}</label>
                                        <select name="form_type" id="form_type" class="form-control">
                                        
                                        @foreach(\App\Http\Controllers\EventsController::TYPE_FORM as $type)
                                                <option @if($event->form_type === $type[0]) selected @endif value="{{$type[0]}}">{{$type[1]}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="limit_online">{{__('On-line Zoom Limit Count')}}</label>
                                        <input type="text" class="form-control"  id="limit_online" name="limit_online" value="{{$event->limit_online}}" placeholder="{{__('On-line Zoom Limit Count')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="limit_in_person">{{__('	In-Person Limit Count')}}</label>
                                        <input type="text" class="form-control"  id="limit_in_person" name="limit_in_person" value="{{$event->limit_in_person}}" placeholder="{{__('In-Person Limit Count')}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="apply_url">{{__('Apply URL')}}</label>
                                        <input type="url" class="form-control" id="apply_url" name="apply_url" value="{{$event->apply_url}}" placeholder="{{__('Custom apply/register link (optional)')}}">
                                    </div>
                                    <x-media-upload :id="$event->icon" :name="'icon'" :dimentions="'1920x1280'" :type="'jpg|png|gif|jpeg'" :title="__('Icon')"/>

                                    <x-media-upload :id="$event->banner_image" :name="'banner_image'" :dimentions="'1920x1280'" :type="'jpg|png|gif|jpeg'" :title="__('Banner Image (List Page)')"/>

                                    <x-media-upload :id="$event->image" :name="'image'" :dimentions="'1920x1280'" :type="'jpg|png|gif|jpeg'" :title="__('Image (Registration Section)')"/>
                                    <x-media-upload :id="$event->attachment" :name="'attachment'" :type="'pdf'"  :title="__('Attachment')"/>
                                    <div class="form-group">
                                        <label for="status">{{__('Status')}}</label>
                                        <select name="status" id="status"  class="form-control">
                                            <option @if($event->status == 'publish') selected @endif value="publish">{{__('Publish')}}</option>
                                            <option @if($event->status == 'draft') selected @endif value="draft">{{__('Draft')}}</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Item')}}</button>
                                </div>
                            </div>