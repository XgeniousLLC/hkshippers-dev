
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
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
                                        <label for="author">{{__('Sub Title')}}</label>
                                        <input type="text" class="form-control"  id="author" name="author" value="{{$post->author}}">
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="content">{{__('Text')}}</label>
                                        <textarea class="form-control" name="post_content" placeholder="{{__('Text')}}">{{$post->content}}</textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="excerpt">{{__('Slider Delay (Second)')}}</label>
                                        <input type="text" class="form-control"  value="{{$post->excerpt}}" name="excerpt" placeholder="{{__('Slider Delay')}}">
                                    </div>
                                    @php 
                                    $images = json_decode($post->image);
                                    if(!is_array($images)){
                                        $images = [];
                                    }
                                    @endphp
                                    <div class="row">
                                        @php 

                                        for($i=1;$i<5;$i++){
                                        @endphp
                                        <div class="col-md-4">

                                            <x-media-upload :id="@$images[$i-1]" :name="'image[]'" :dimentions="'1920x1280'" :type="'jpg|png|gif|jpeg'" :title="__('Image'.$i)"/>
                                        </div>
                                        
                                        @php 
                                        
                                        }
                                        @endphp
                                    </div>

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
                                        <label for="type2">{{__('Page')}}</label>
                                        <select name="type2" id="type2" class="form-control">
                                        
                                        @foreach(\App\Http\Controllers\PostController::TYPE_PAGE as $type)
                                                <option @if($post->type2 === $type[0]) selected @endif value="{{$type[0]}}">{{$type[1]}}</option>
                                            @endforeach
                                        </select>
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