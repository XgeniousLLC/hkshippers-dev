
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
                                        <label for="qty">{{__('Quantity')}}</label>
                                        <input type="text" class="form-control"  id="qty"  value="{{$item->qty}}"  name="qty" placeholder="{{__('Quantity')}}">
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label for="post_id">{{__('Book')}}</label>
                                        <select name="post_id" id="post_id" class="form-control">
                                        <option  value="">--Select--</option>

                                        @foreach($data as $book)
                                                <option @if((int)$item->post_id === (int)$book->id) selected @endif value="{{$book->id}}">{{$book->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Item')}}</button>
                                </div>
                            </div>