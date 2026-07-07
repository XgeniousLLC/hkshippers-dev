
                            
                            
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
                                        <label for="title">{{__('Subject')}}</label>
                                        <input type="text" class="form-control"  value="{{old('title')}}" name="title" placeholder="{{__('Subject')}}">
                                    </div>
                                    <div class="form-group editor">
                                        <label>{{__('Content')}}</label>
                                        <input type="hidden" name="post_content" >
                                        <div class="_summernote"></div>
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
                                        <label for="type2">{{__('Type')}}</label>
                                        <select name="type2" id="type2" class="form-control" class="form-control" >
                                        
                                        @foreach(\App\Http\Controllers\PostController::TYPE_EMAIL_TEMPLATES as $type)
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