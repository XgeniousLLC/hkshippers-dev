
                            <div class="row">
                                <div class="col-lg-8">
                                
                                    <div class="form-group">
                                        <label for="company">{{__('Name of Company')}}</label>
                                        <input type="text" class="form-control" id="company" value="{{old('company')}}" name="company" placeholder="{{__('English')}}">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="company_chi" value="{{old('company_chi')}}" name="company_chi" placeholder="{{__('Chinese')}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="address">{{__('Address of Registered Office')}}</label>
                                        <textarea  class="form-control" id="address"  name="address" placeholder="{{__('Address')}}">{{old('address')}}</textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="tel">{{__('Tel')}}</label>
                                        <input type="text" class="form-control"  id="tel"  value="{{old('tel')}}"  name="tel" placeholder="{{__('Tel')}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="fax">{{__('Fax')}}</label>
                                        <input type="text" class="form-control"  id="fax"  value="{{old('fax')}}"  name="fax" placeholder="{{__('Fax')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{__('Email')}}</label>
                                        <input type="text" class="form-control"  id="email"  value="{{old('email')}}"  name="email" placeholder="{{__('Email')}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="website">{{__('Website')}}</label>
                                        <input type="text" class="form-control"  id="website"  value="{{old('website')}}"  name="website" placeholder="{{__('Website')}}">
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="nature_of_business">{{__('Nature of Business')}}</label>
                                        <input type="text" class="form-control"  id="nature_of_business"  value="{{old('nature_of_business')}}"  name="nature_of_business" placeholder="{{__('Nature of Business')}}">
                                    </div>
                                    
                                    
                                </div>
                                <div class="col-lg-4">
                                
                                    <div class="form-group">
                                        <label for="">{{__('Representative')}}</label>
                                
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="representative_name">{{__('Name')}}</label>
                                        <input type="text" class="form-control" id="representative_name" value="{{old('representative_name')}}" name="representative_name" placeholder="{{__('English')}}">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="representative_name_chi" value="{{old('representative_name_chi')}}" name="representative_name_chi" placeholder="{{__('Chinese')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="representative_position">{{__('Position')}}</label>
                                        <input type="text" class="form-control"  id="representative_position"  value="{{old('representative_position')}}"  name="representative_position" placeholder="{{__('Position')}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="representative_tel">{{__('Tel')}}</label>
                                        <input type="text" class="form-control"  id="representative_tel"  value="{{old('representative_tel')}}"  name="representative_tel" placeholder="{{__('Tel')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="representative_mobile">{{__('Mobile')}}</label>
                                        <input type="text" class="form-control"  id="representative_mobile"  value="{{old('representative_mobile')}}"  name="representative_mobile" placeholder="{{__('Mobile')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="representative_email">{{__('Email')}}</label>
                                        <input type="text" class="form-control"  id="representative_email"  value="{{old('representative_email')}}"  name="representative_email" placeholder="{{__('Email')}}">
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add New Item')}}</button>
                                </div>
                            </div>