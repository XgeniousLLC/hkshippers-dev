
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group" >
                                        <label for="language"><strong>{{__('Language')}}</strong></label>
                                        <select name="lang" id="language" class="form-control">
                                            @foreach($all_languages as $lang)
                                                <option @if($lang->slug == $post->lang) selected @endif value="{{$lang->slug}}">{{$lang->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">{{__('Title')}}</label>
                                        <input type="text" class="form-control"  id="title" name="title" value="{{$post->title}}">
                                    </div>
                            <div class="form-group">
                                <label for="is_new"><strong>{{__('Is New')}}</strong></label>
                                <label class="switch yes">
                                    <input type="checkbox" name="is_new" @if($post->is_new===1) checked @endif   id="is_new">
                                    <span class="slider onff"></span>
                                </label>
                            </div>
                                    <div class="form-group">
                                        <label for="video_url">{{__('Url')}}</label>
                                        <input type="text" class="form-control" name="video_url" value="{{$post->video_url}}">
                                    </div>
                                    
                                    <x-media-upload :id="$post->image" :name="'image'" :type="'jpg|png|gif|jpeg'" :dimentions="'1920x1280'" :title="__('Image')"/>
                                    <x-media-upload :id="$post->attachment" :name="'attachment'" :type="'pdf'"  :title="__('Attachment')"/>
                                </div>
                                <div class="col-lg-4">  
                                    
                                    <div class="form-group" style="display:none;">
                                        <label for="title">{{__('Slug')}}</label>
                                        <input type="text" class="form-control"  id="slug" value="{{$post->slug}}"  name="slug" placeholder="{{__('Slug')}}">
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="title">{{__('Seq No.')}}</label>
                                        <input type="text" class="form-control"  id="seq_no"  value="{{$post->seq_no}}"  name="seq_no" placeholder="{{__('Seq No.')}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="status">{{__('Status')}}</label>
                                        <select name="status" id="status" class="form-control">
                                            <option  @if($post->status == 'publish') selected @endif value="publish">{{__('Publish')}}</option>
                                            <option  @if($post->status == 'draft') selected @endif value="draft">{{__('Draft')}}</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Item')}}</button>
                                </div>
                            </div>