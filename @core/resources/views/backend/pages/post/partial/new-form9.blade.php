
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
                                        <label for="author">{{__('Sub Title')}}</label>
                                        <input type="text" class="form-control"  value="{{old('author')}}" name="author" placeholder="{{__('Sub Title')}}">
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="content">{{__('Text')}}</label>
                                        <textarea class="form-control" name="post_content" placeholder="{{__('Text')}}">{{old('post_content')}}</textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="excerpt">{{__('Slider Delay (Second)')}}</label>
                                        <input type="text" class="form-control"  value="{{old('excerpt')}}" name="excerpt" placeholder="{{__('Slider Delay')}}">
                                    </div>
                                    <div class="row">
                                    
                                        @for($i=1;$i<5;$i++)
                                            <div class="col-md-4">

                                                <x-media-upload :id="''" :name="'image[]'" :dimentions="'1920x1280'" :type="'jpg|png|gif|jpeg'" :title="__('Image'.$i)"/>
                                            </div>
                                        
                                        @endfor
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
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label for="type2">{{__('Page')}}</label>
                                        <select name="type2" id="type2" class="form-control">
                                        
                                        @foreach(\App\Http\Controllers\PostController::TYPE_PAGE as $type)
                                                <option  value="{{$type[0]}}">{{$type[1]}}</option>
                                            @endforeach
                                        </select>
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