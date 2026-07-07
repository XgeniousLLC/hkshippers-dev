
                            <div class="row">
                                <div class="col-lg-8">
                                
                                    <div class="form-group">
                                        <label for="name">{{__('Name')}}</label>
                                        <input type="text" class="form-control" id="name" disabled value="{{$item->name}}" name="name" placeholder="{{__('Name')}}">
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="position">{{__('Position')}}</label>
                                        <input type="text" class="form-control" id="position" disabled value="{{$item->position}}" name="position" placeholder="{{__('Position')}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="company">{{__('Company')}}</label>
                                        <input type="text" class="form-control" id="company"disabled value="{{$item->company}}" name="company" placeholder="{{__('Company')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">{{__('Address')}}</label>
                                        <textarea  class="form-control" id="address" name="address" disabled placeholder="{{__('Address')}}">{{$item->address}}</textarea>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="remark">{{__('Message')}}</label>
                                        <textarea class="form-control" id="remark" name="remark" disabled placeholder="{{__('Message')}}">{{$item->remark}}</textarea>
                                    </div>
                                    
                                    
                                </div>
                                <div class="col-lg-4">
                                
                                    
                                    
                                    <div class="form-group">
                                        <label for="tel">{{__('Tel')}}</label>
                                        <input type="text" class="form-control"  id="tel" disabled value="{{$item->tel}}"  name="tel" placeholder="{{__('Tel')}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="fax">{{__('WhatsApp (Join HKSC Whatsapp group)')}}</label>
                                        <input type="text" class="form-control"  id="fax" disabled value="{{$item->fax}}"  name="fax" placeholder="{{__('WhatsApp (Join HKSC Whatsapp group)')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{__('Email')}}</label>
                                        <input type="text" class="form-control"  id="email" disabled  value="{{$item->email}}"  name="email" placeholder="{{__('Email')}}">
                                    </div>
                                    
                                </div>
                            </div>