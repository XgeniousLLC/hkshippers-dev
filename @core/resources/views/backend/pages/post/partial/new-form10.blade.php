
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
                                        <textarea type="text" class="form-control"  value="" name="title" placeholder="{{__('Title')}}">{{old('title')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('Content')}}</label>
                                        <input type="hidden" name="post_content" value="{{old('post_content')}}"/>
                                        <div class="summernote"></div>
                                    </div>
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
                                    <x-media-upload :id="''" :name="'attachment'" :dimentions="'1920x1280'" :type="'jpg|png|gif|jpeg'" :title="__('Icon')"/>
                                    
                                    <div class="form-group">
                                        <label for="publish_at">{{__('Publish At')}}</label>
                                        <input type="date" class="form-control datepicker"  id="publish_at" name="publish_at" placeholder="{{__('Publish At')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">{{__('Status')}}</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="publish">{{__('Publish')}}</option>
                                            <option value="draft">{{__('Draft')}}</option>
                                        </select>
                                    </div>

                                    <x-media-upload :id="''" :name="'image'" :dimentions="'1920x1280'" :type="'jpg|png|gif|jpeg'" :title="__('Image')"/>
                                    <input type="checkbox" class="cbTags"  id="type2" name="type2" @if(old('type2')) checked @endif>
                                    <x-media-upload :id="''" :name="'tags'"  :type="'pdf'" :title="__('Attachment')"/>
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add New Item')}}</button>
                                </div>
                            </div>
