
                            <div class="row">
                                <div class="col-lg-8">
                                
                                    <div class="form-group">
                                        <label for="name">{{__('Name')}}</label>
                                        <input type="text" class="form-control" id="name" value="{{old('name')}}" name="name" placeholder="{{__('Name')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="position">{{__('Position')}}</label>
                                        <input type="text" class="form-control" id="position" value="{{old('position')}}" name="position" placeholder="{{__('Position')}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="company">{{__('Company')}}</label>
                                        <input type="text" class="form-control" id="company" value="{{old('company')}}" name="company" placeholder="{{__('Company')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">{{__('Address')}}</label>
                                        <textarea  class="form-control" id="address"  name="address" placeholder="{{__('Address')}}">{{old('address')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="remark">{{__('Message')}}</label>
                                        <textarea class="form-control" id="remark"  name="remark" placeholder="{{__('Message')}}">{{old('remark')}}</textarea>
                                    </div>
                                    
                                    
                                </div>
                                <div class="col-lg-4">
                                
                                    <div class="form-group">
                                        <label for="tel">{{__('Tel')}}</label>
                                        <input type="text" class="form-control"  id="tel"  value="{{old('tel')}}"  name="tel" placeholder="{{__('Tel')}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="fax">{{__('WhatsApp (Join HKSC Whatsapp group)')}}</label>
                                        <input type="text" class="form-control"  id="fax"  value="{{old('fax')}}"  name="fax" placeholder="{{__('WhatsApp (Join HKSC Whatsapp group)')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{__('Email')}}</label>
                                        <input type="text" class="form-control"  id="email"  value="{{old('email')}}"  name="email" placeholder="{{__('Email')}}">
                                    </div>
                                    
                                    
                                    

                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add New Item')}}</button>
                                </div>
                            </div>