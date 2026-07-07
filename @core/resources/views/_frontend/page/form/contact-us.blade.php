
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
            <div class="col-md-6">
            
                <div class="form-group">
                    <label for="name">{{__('Name')}}*</label>
                    <input type="text" class="form-control" id="name" value="{{old('name')}}" name="name" placeholder="{{__('Name')}}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="position">{{__('Position')}}</label>
                    <input type="text" class="form-control" id="position" value="{{old('position')}}" name="position" placeholder="{{__('Position')}}">
                </div>
            </div>
            <div class="col-md-12">
                
                <div class="form-group">
                    <label for="company">{{__('Company')}}*</label>
                    <input type="text" class="form-control" id="company" value="{{old('company')}}" name="company" required placeholder="{{__('Company')}}">
                </div>
                <div class="form-group">
                    <label for="address">{{__('Address')}}</label>
                    <textarea  class="form-control" id="address"  name="address" placeholder="{{__('Address')}}">{{old('address')}}</textarea>
                </div>
            </div>
            
            <div class="col-md-6 ">
            
                <div class="form-group">
                    <label for="tel">{{__('Tel')}}*</label>
                    <input type="text" class="form-control"  id="tel"  value="{{old('tel')}}"  name="tel" placeholder="{{__('Tel')}}" required>
                </div>
            </div>
            <div class="col-md-6">
                
                <div class="form-group">
                    <label for="email">{{__('Email')}}*</label>
                    <input type="text" class="form-control"  id="email"  value="{{old('email')}}"  name="email" placeholder="{{__('Email')}}" required>
                </div>
                
            </div>
                
            <div class="col-md-12 ">
            
            <div class="form-group">
                <label for="fax">{{__('WhatsApp (Join HKSC Whatsapp group)')}}</label>
                <input type="text" class="form-control"  id="fax"  value="{{old('fax')}}"  name="fax" placeholder="{{__('WhatsApp (Join HKSC Whatsapp group)')}}" >
            </div>
        </div>
            <div class="col-md-12 ">

                <div class="form-group">
                    <label for="remark">{{__('Your Message')}}*</label>
                    <textarea class="form-control" id="remark"  name="remark" placeholder="{{__('Your Message')}}" required>{{old('remark')}}</textarea>
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