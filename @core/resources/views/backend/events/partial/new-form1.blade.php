

                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group" style="display:none;">
                                        <label for="language"><strong>{{__('Language')}}</strong></label>
                                        <select name="lang" id="language" class="form-control">
                                            @foreach($all_languages as $lang)
                                                <option value="{{$lang->slug}}">{{$lang->name}}</option>
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
                                                <div class="form-group">
                                                    <label for="title-{{$lang->slug}}">{{__('Title')}}</label>
                                                    <input type="text" class="form-control"  id="title-{{$lang->slug}}" name="title-{{$lang->slug}}" value="{{old('title'."-{$lang->slug}")}}" placeholder="{{__('Title')}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>{{__('Description')}}</label>
                                                    <input type="hidden" name="event_content-{{$lang->slug}}" value="{{old('event_content'."-{$lang->slug}")}}">
                                                    <div class="summernote"
                                                    data-content='{{old('event_content'."-{$lang->slug}")}}'
                                                    ></div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="language-{{$lang->slug}}">{{__('Language')}}</label>
                                                    <input type="text" class="form-control"  id="language-{{$lang->slug}}" name="language-{{$lang->slug}}" value="{{old('language'."-{$lang->slug}")}}" placeholder="{{__('Language')}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="organizer-{{$lang->slug}}">{{__('Organizer')}}</label>
                                                    <input type="text" class="form-control"  id="organizer-{{$lang->slug}}" name="organizer-{{$lang->slug}}" value="{{old('organizer'."-{$lang->slug}")}}" placeholder="{{__('Event Organizer')}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="speaker-{{$lang->slug}}">{{__('Speaker')}}</label>
                                                    <input type="text" class="form-control"  id="speaker-{{$lang->slug}}" name="speaker-{{$lang->slug}}" value="{{old('speaker'."-{$lang->slug}")}}" placeholder="{{__('Speaker')}}">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="venue-{{$lang->slug}}">{{__('Venue')}}</label>
                                                    <input type="text" class="form-control"  id="venue-{{$lang->slug}}" name="venue-{{$lang->slug}}" value="{{old('venue'."-{$lang->slug}")}}" placeholder="{{__('Event Venue')}}">
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>

                                    
                                    <div class="form-group" style="display:none;">
                                        <label for="slug">{{__('Slug')}}</label>
                                        <input type="text" class="form-control"  id="slug" name="slug" value="{{old('slug')}}" placeholder="{{__('slug')}}">
                                    </div>
                                    
                                   
                                   
                                </div>
                                <div class="col-lg-4">
                                
                                    <div class="form-group">
                                        <label for="seq_no">{{__('Seq No.')}}</label>
                                        <input type="text" class="form-control"  id="seq_no" name="seq_no" value="{{old('seq_no')}}" placeholder="{{__('Seq No.')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="date">{{__('Date')}}</label>
                                        <input type="date" class="form-control datepicker"  id="date" name="date" placeholder="{{__('Date')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="time">{{__('Time')}}</label>
                                        <input type="text" class="form-control"  id="time" name="time" placeholder="{{__('Time')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="fee">{{__('Fee')}}</label>
                                        <input type="text" class="form-control"  id="fee" name="fee" placeholder="{{__('Fee')}}">
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="form_type">{{__('Form Type')}}</label>
                                        <select name="form_type" id="form_type" class="form-control">
                                        
                                        @foreach(\App\Http\Controllers\EventsController::TYPE_FORM as $type)
                                                <option  value="{{$type[0]}}">{{$type[1]}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="limit_online">{{__('On-line Zoom Limit Count')}}</label>
                                        <input type="text" class="form-control"  id="limit_online" name="limit_online" value="{{old('limit_online')}}" placeholder="{{__('On-line Zoom Limit Count')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="limit_in_person">{{__('	In-Person Limit Count')}}</label>
                                        <input type="text" class="form-control"  id="limit_in_person" name="limit_in_person" value="{{old('limit_in_person')}}" placeholder="{{__('In-Person Limit Count')}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="apply_url">{{__('Apply URL')}}</label>
                                        <input type="url" class="form-control" id="apply_url" name="apply_url" value="{{old('apply_url')}}" placeholder="{{__('Custom apply/register link (optional)')}}">
                                    </div>
                                    <x-media-upload :id="''" :name="'icon'" :dimentions="'1920x1280'" :type="'jpg|png|gif|jpeg'" :title="__('Icon')"/>
                                    
                                    <x-media-upload :id="''" :name="'image'" :dimentions="'1920x1280'" :type="'jpg|png|gif|jpeg'" :title="__('Image')"/>
                                    
                                    <x-media-upload  :name="'attachment'" :type="'pdf'"  :title="__('Attachment')"/>

                                    <div class="form-group">
                                        <label for="status">{{__('Status')}}</label>
                                        <select name="status" id="status"  class="form-control">
                                            <option value="publish">{{__('Publish')}}</option>
                                            <option value="draft">{{__('Draft')}}</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add New item')}}</button>
                                </div>
                            </div>