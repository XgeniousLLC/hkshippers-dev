
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="language"><strong>{{__('Language')}}</strong></label>
                                        <select name="lang" id="language" class="form-control">
                                            @foreach($all_languages as $lang)
                                            <option value="{{$lang->slug}}">{{$lang->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">{{__('Title')}}</label>
                                        <input type="text" class="form-control"  value="{{old('title')}}" name="title" placeholder="{{__('Title')}}">
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="video_url">{{__('Url')}}</label>
                                        <input type="text" class="form-control" name="video_url" value="{{old('video_url')}}">
                                    </div>
                                    
                                    <x-media-upload :id="''" :name="'attachment'"  :type="'pdf'" :title="__('Attachment')"/>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group" style="display:none;">
                                        <label for="title">{{__('Slug')}}</label>
                                        <input type="text" class="form-control"  id="slug"  value="{{old('slug')}}"  name="slug" placeholder="{{__('Slug')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">{{__('Seq No.')}}</label>
                                        <input type="text" class="form-control"  id="seq_no"  value="{{old('seq_no')}}"  name="seq_no" placeholder="{{__('Seq No.')}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="publish_at">{{__('Publish At')}}</label>
                                        <input type="date" class="form-control datepicker"  id="publish_at" name="publish_at" placeholder="{{__('Publish At')}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="category">{{__('Type')}}</label>
                                        <select name="category" class="form-control" id="category">
                                            <option value="">{{__("Select Type")}}</option>
                                        </select>
                                        <span class="info-text">{{__('select language to get type by language')}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">{{__('Status')}}</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="publish">{{__('Publish')}}</option>
                                            <option value="draft">{{__('Draft')}}</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add New Item')}}</button>
                                </div>
                            </div>