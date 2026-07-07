
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
                                        <label for="website1">{{__('Website')}}</label>
                                        <input type="text" class="form-control" id="website1" value="{{$member->website1}}" name="website1" placeholder="{{__('Website')}}">
                                    </div>
                                    <!--
                                    <div class="form-group">
                                        <label for="company_address">{{__('Company Address')}}</label>
                                        <textarea class="form-control" id="company_address" name="company_address" placeholder="{{__('Company Address')}}">{{$member->company_address}}</textarea>
                                    </div>
                                    <div class="row">

                                        <div class="col-lg-6">
                                        
                                            <div class="form-group">
                                                <label for="tel1">{{__('Tel1')}}</label>
                                                <input type="text" class="form-control" id="tel1" value="{{$member->tel1}}" name="tel1" placeholder="{{__('Tel1')}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="fax1">{{__('Fax1')}}</label>
                                                <input type="text" class="form-control" id="fax1" value="{{$member->fax1}}" name="fax1" placeholder="{{__('Fax1')}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="email1">{{__('Email1')}}</label>
                                                <input type="text" class="form-control" id="email1" value="{{$member->email1}}" name="email1" placeholder="{{__('Email1')}}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                        
                                            <div class="form-group">
                                                <label for="tel2">{{__('Tel2')}}</label>
                                                <input type="text" class="form-control" id="tel2" value="{{$member->tel2}}" name="tel2" placeholder="{{__('Tel2')}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="fax2">{{__('Fax2')}}</label>
                                                <input type="text" class="form-control" id="fax2" value="{{$member->fax2}}" name="fax2" placeholder="{{__('Fax2')}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="email2">{{__('Email2')}}</label>
                                                <input type="text" class="form-control" id="email2" value="{{$member->email2}}" name="email2" placeholder="{{__('Email2')}}">
                                            </div>
                                        </div>
                                    </div>
                                    -->
                                    <!--
                                    <div class="form-group">
                                        <label for="website2">{{__('Website2')}}</label>
                                        <input type="text" class="form-control" id="website2" value="{{$member->website2}}" name="website2" placeholder="{{__('Website2')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_person">{{__('Contact Person Name')}}</label>
                                        <input type="text" class="form-control" id="contact_person" value="{{$member->contact_person}}" name="contact_person" placeholder="{{__('Contact Person Name')}}">
                                    </div>
                                -->
                                </div>
                                <div class="col-lg-4">
                                    <!--
                                    <div class="form-group">
                                        <label for="stroke">{{__('Stroke')}}</label>
                                        <input type="text" class="form-control"  id="stroke"  value="{{$member->stroke}}"  name="stroke" placeholder="{{__('Stroke')}}">
                                    </div>
                                    -->
                                    <div class="form-group">
                                        <label for="seq_no">{{__('Seq No.')}}</label>
                                        <input type="text" class="form-control"  id="seq_no"  value="{{$member->seq_no}}"  name="seq_no" placeholder="{{__('Seq No.')}}">
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