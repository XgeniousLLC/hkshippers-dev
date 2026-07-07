
                            <div class="row">
                                <div class="col-lg-8">
                                
                                    <div class="form-group">
                                        <label for="company">{{__('Name of Company')}}</label>
                                        <input type="text" class="form-control" id="company"disabled value="{{$item->company}}" name="company" placeholder="{{__('English')}}">
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="company_chi"disabled value="{{$item->company_chi}}" name="company_chi" placeholder="{{__('Chinese')}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="address">{{__('Address of Registered Office')}}</label>
                                        <textarea  class="form-control" id="address" name="address" disabled placeholder="{{__('Address')}}">{{$item->address}}</textarea>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="tel">{{__('Tel')}}</label>
                                        <input type="text" class="form-control"  id="tel" disabled value="{{$item->tel}}"  name="tel" placeholder="{{__('Tel')}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="fax">{{__('Fax')}}</label>
                                        <input type="text" class="form-control"  id="fax" disabled value="{{$item->fax}}"  name="fax" placeholder="{{__('Fax')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{__('Email')}}</label>
                                        <input type="text" class="form-control"  id="email" disabled  value="{{$item->email}}"  name="email" placeholder="{{__('Email')}}">
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="website">{{__('Website')}}</label>
                                        <input type="text" class="form-control"  id="website" disabled  value="{{$item->website}}"  name="website" placeholder="{{__('Website')}}">
                                    </div>

                                    
                                    <div class="form-group">
                                        <label for="nature_of_business">{{__('Nature of Business')}}</label>
                                        <input type="text" class="form-control"  id="nature_of_business" disabled  value="{{$item->nature_of_business}}"  name="nature_of_business" placeholder="{{__('Nature of Business')}}">
                                    </div>
                                    
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">{{__('Representative')}}</label>
                                
                                    </div>
                                    <div class="form-group">
                                        <label for="representative_name">{{__('Name')}}</label>
                                        <input type="text" class="form-control" id="representative_name"disabled value="{{$item->representative_name}}" name="representative_name" placeholder="{{__('English')}}">
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="representative_name_chi"disabled value="{{$item->representative_name_chi}}" name="representative_name_chi" placeholder="{{__('Chinese')}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="representative_position">{{__('Position')}}</label>
                                        <input type="text" class="form-control"  id="representative_position" disabled value="{{$item->representative_position}}"  name="representative_position" placeholder="{{__('Position')}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="representative_tel">{{__('Tel')}}</label>
                                        <input type="text" class="form-control"  id="representative_tel" disabled value="{{$item->representative_tel}}"  name="representative_tel" placeholder="{{__('Tel')}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="representative_mobile">{{__('Mobile')}}</label>
                                        <input type="text" class="form-control"  id="representative_mobile" disabled value="{{$item->representative_mobile}}"  name="representative_mobile" placeholder="{{__('Mobile')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="representative_email">{{__('Email')}}</label>
                                        <input type="text" class="form-control"  id="representative_email" disabled  value="{{$item->representative_email}}"  name="representative_email" placeholder="{{__('Email')}}">
                                    </div>
                                    

                                    
                                </div>
                            </div>