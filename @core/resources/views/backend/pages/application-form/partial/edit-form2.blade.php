
                            <div class="row">
                                <div class="col-lg-8">
                                
                                    <div class="form-group">
                                        <label for="name">{{__('Name')}}</label>
                                        <input type="text" class="form-control" id="name" value="{{$item->name}}" name="name" placeholder="{{__('Name')}}">
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="position">{{__('Position')}}</label>
                                        <input type="text" class="form-control" id="position" value="{{$item->position}}" name="position" placeholder="{{__('Position')}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="company">{{__('Company')}}</label>
                                        <input type="text" class="form-control" id="company" value="{{$item->company}}" name="company" placeholder="{{__('Company')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">{{__('Address')}}</label>
                                        <textarea  class="form-control" id="address" name="address" placeholder="{{__('Address')}}">{{$item->address}}</textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="guest">{{__('Guest Name')}}</label>
                                        <textarea class="form-control" id="guest" name="guest" placeholder="{{__('Guest Name')}}">{{$item->guest}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="remark">{{__('Remark')}}</label>
                                        <textarea class="form-control" id="remark" name="remark" placeholder="{{__('Remark')}}">{{$item->remark}}</textarea>
                                    </div>
                                    
                                    
                                </div>
                                <div class="col-lg-4">
                                
                                    
                                    
                                <div class="form-group">
                                        <label for="tel">{{__('Tel')}}</label>
                                        <input type="text" class="form-control"  id="tel"  value="{{$item->tel}}"  name="tel" placeholder="{{__('Tel')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="fax">{{__('Fax')}}</label>
                                        <input type="text" class="form-control"  id="fax"  value="{{$item->fax}}"  name="fax" placeholder="{{__('Fax')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{__('Email')}}</label>
                                        <input type="text" class="form-control"  id="email"  value="{{$item->email}}"  name="email" placeholder="{{__('Email')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="qty">{{__('No of Participant')}}</label>
                                        <input type="text" class="form-control"  id="qty"  value="{{$item->qty}}"  name="qty" placeholder="{{__('No of Participant')}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="event_id">{{__('Events')}}</label>
                                        <select name="event_id" id="event_id" class="form-control">
                                        <option  value="">--Select--</option>

                                        @foreach($data as $book)
                                                <option @if((int)$item->event_id === (int)$book->id) selected @endif value="{{$book->id}}">{{$book->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="form_type">{{__('Form Type')}}</label>
                                        <select name="form_type" id="form_type" class="form-control">
                                        
                                        @foreach(\App\Http\Controllers\EventsController::TYPE_FORM as $type)
                                                <option @if($item->form_type === $type[0]) selected @endif value="{{$type[0]}}">{{$type[1]}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                    
                                    
                                    
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Item')}}</button>
                                </div>
                            </div>