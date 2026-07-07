
<form method="post" class="form-contact-us invalid">
{{ csrf_field() }}
    <div class="row ">
    
            <div class="col-md-12" style="padding-top:1.5em;">
            @if($errors->any())
                <div class=" edd_errors edd-alert edd-alert-error " >
                    <p class="edd_error" ><strong>{{__('Error')}}</strong>
                    @foreach ($errors->all() as $error)
                        {{ __($error) }}<br>
                    @endforeach
                    </p>
                </div>
            @endif
            @if(session()->get('result')==='error')
                <div class=" edd_errors edd-alert edd-alert-error " >
                    <p class="edd_error" ><strong>{{__('Error')}}</strong>
                        {{ session()->get('msg') }}<br>
                    </p>
                </div>
            @endif
            @if(session()->get('result')==='success')
                <div class=" edd_success">
                    <p class="edd_success" ><strong>{{__('Success')}}</strong></p>
                </div>
            @endif
            </div>
            
            <div class="col-md-12">
                
                <div class="form-group">
                    <label for="company">{{__('Name of Company')}}*</label>
                    <input type="text" class="form-control" id="company" value="{{old('company')}}" name="company" required placeholder="{{__('(In English)')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="company_chi" value="{{old('company_chi')}}" name="company_chi" required placeholder="{{__('(In Chinese)')}}">
                
                </div>
            </div>
            
            <div class="col-md-12">
                
                <div class="form-group">
                    <label for="address">{{__('Address of Registered Office')}}</label>
                    <textarea  class="form-control" id="address"  name="address" placeholder="{{__('Address')}}">{{old('address')}}</textarea>
                </div>
            </div>
            
            <div class="col-md-6 ">
            
                <div class="form-group">
                    <label for="tel">{{__('Tel')}}*</label>
                    <input type="text" class="form-control"  id="tel"  value="{{old('tel')}}"  name="tel" placeholder="{{__('Tel')}}" required>
                </div>
            </div>
            <div class="col-md-6 ">
            
                <div class="form-group">
                    <label for="fax">{{__('Fax')}}*</label>
                    <input type="text" class="form-control"  id="fax"  value="{{old('fax')}}"  name="fax" placeholder="{{__('Fax')}}" required>
                </div>
            </div>
            <div class="col-md-12">
                
                <div class="form-group">
                    <label for="email">{{__('Email')}}*</label>
                    <input type="text" class="form-control"  id="email"  value="{{old('email')}}"  name="email" placeholder="{{__('Email')}}" required>
                </div>
                
            </div>
                
            <div class="col-md-12 ">
            
                <div class="form-group">
                    <label for="website">{{__('Website')}}*</label>
                    <input type="text" class="form-control"  id="website"  value="{{old('website')}}"  name="website" placeholder="{{__('Website')}}" required>
                </div>
            </div>
            <div class="col-md-12 ">
            
                <div class="form-group">
                    <label for="nature_of_business">{{__('Nature of Business')}}</label>
                    <input type="text" class="form-control"  id="nature_of_business"  value="{{old('nature_of_business')}}"  name="nature_of_business" placeholder="{{__('Nature of Business')}}" >
                </div>
            </div>
            <div class="col-md-12 ">
            
                <div class="form-group">
                    <label>{{__('Representative')}}</label>
                </div>
            </div>
            
            <div class="col-md-12">
                
                <div class="form-group">
                    <label for="representative_name">{{__('Name')}}</label>
                    <input type="text" class="form-control" id="representative_name" value="{{old('representative_name')}}" name="representative_name"  placeholder="{{__('(In English)')}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="representative_name_chi" value="{{old('representative_name_chi')}}" name="representative_name_chi"  placeholder="{{__('(In Chinese)')}}">
                
                </div>
            </div>
            
            <div class="col-md-12 ">
            
                <div class="form-group">
                    <label for="representative_position">{{__('Position')}}</label>
                    <input type="text" class="form-control"  id="representative_position"  value="{{old('representative_position')}}"  name="representative_position" placeholder="{{__('Position')}}" >
                </div>
            </div>
            <div class="col-md-6 ">
            
                <div class="form-group">
                    <label for="representative_tel">{{__('Tel')}}</label>
                    <input type="text" class="form-control"  id="representative_tel"  value="{{old('representative_tel')}}"  name="representative_tel" placeholder="{{__('Tel')}}" >
                </div>
            </div>
            <div class="col-md-6 ">
            
                <div class="form-group">
                    <label for="representative_mobile">{{__('Mobile')}}</label>
                    <input type="text" class="form-control"  id="representative_mobile"  value="{{old('representative_mobile')}}"  name="representative_mobile" placeholder="{{__('Mobile')}}" >
                </div>
            </div>
            <div class="col-md-12 ">
            
                <div class="form-group">
                    <label for="representative_email">{{__('Email')}}</label>
                    <input type="text" class="form-control"  id="representative_email"  value="{{old('representative_email')}}"  name="representative_email" placeholder="{{__('Email')}}" >
                </div>
            </div>
            <div class="col-md-4">

                <img class="img-captcha" style="cursor:pointer;
                width: 100%;
                height: 100%;" onclick="this.src = this.src"/>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" id="captcha" name="captcha" placeholder="{{__('Verify Code')}}*"   required>
                
            </div>
            <div class="col-md-12" style="padding-top:1.5em;">

                <div class="img-captcha-error edd_errors edd-alert edd-alert-error " style="display:none;">
                    <p class="edd_error" ><strong>{{__('Error')}}</strong>: {{__('Incorrect Verify Code')}}</p>
                </div>
            </div>
            <div class="col-md-12">
                
                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" style="width:100%;">{{__('Send Message')}}</button>
            </div>
            
            <div class="col-md-12">

                <input type="reset" class="btn btn-secondary mt-4 pr-4 pl-4" value="{{__('Reset')}}" style="width:100%;"/>
            </div>

    </div>
</form>
<script>


</script>