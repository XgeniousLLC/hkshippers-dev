
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="language"><strong>{{__('Language')}}</strong></label>
                                        <select name="lang" id="language" class="form-control">
                                            @foreach($all_languages as $lang)
                                                <option @if($lang->slug == $member->lang) selected @endif value="{{$lang->slug}}">{{$lang->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="company">{{__('Company Name')}}</label>
                                        <input type="text" class="form-control"  id="company" name="company" value="{{$member->company}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="website">{{__('Website')}}</label>
                                        <input type="text" class="form-control" id="website" value="{{$member->website1}}" name="website1" placeholder="{{__('Website')}}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                
                                    
                                    <div class="form-group">
                                        <label for="seq_no">{{__('Seq No.')}}</label>
                                        <input type="text" class="form-control"  id="seq_no"  value="{{$member->seq_no}}"  name="seq_no" placeholder="{{__('Seq No.')}}">
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label for="type_founder">{{__('Type')}}</label>
                                        <select name="type_founder" id="type_founder" class="form-control">
                                        
                                        @foreach(\App\Http\Controllers\MemberController::TYPE_FOUNDER as $type)
                                                <option @if($member->type_chairman === $type[0]) selected @endif value="{{$type[0]}}">{{$type[1]}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">{{__('Status')}}</label>
                                        <select name="status" id="status" class="form-control">
                                            <option  @if($member->status == 'publish') selected @endif value="publish">{{__('Publish')}}</option>
                                            <option  @if($member->status == 'draft') selected @endif value="draft">{{__('Draft')}}</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Item')}}</button>
                                </div>
                            </div>