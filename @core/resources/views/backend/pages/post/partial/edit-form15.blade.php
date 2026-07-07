<div class="row">
    <div class="col-lg-8">
        <div class="form-group">
            <label for="language"><strong>{{__('Language')}}</strong></label>
            <select name="lang" id="language" class="form-control">
                @foreach($all_languages as $lang)
                    <option @if($lang->slug == $post->lang) selected @endif value="{{$lang->slug}}">{{$lang->name}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="title">{{__('Title')}}</label>
            <textarea type="text" class="form-control" id="title" name="title" value="">{{$post->title}}</textarea>
        </div>
        
        <div class="form-group">
            <label for="content">{{__('Content URL')}}</label>
            <input type="url" class="form-control" id="content" name="post_content" value="{{$post->content}}" placeholder="https://example.com">
        </div>

        
        <x-media-upload :id="$post->attachment" :name="'attachment'" :type="'jpg|png|gif|jpeg'" :dimentions="'1920x1280'" :title="__('Icon')"/>
        
    </div>
    
    <div class="col-lg-4">
        <div class="form-group" style="display:none;">
            <label for="slug">{{__('Slug')}}</label>
            <input type="text" class="form-control" id="slug" value="{{$post->slug}}" name="slug" placeholder="{{__('Slug')}}">
        </div>
        
        <div class="form-group">
            <label for="seq_no">{{__('Seq No.')}}</label>
            <input type="text" class="form-control" id="seq_no" value="{{$post->seq_no}}" name="seq_no" placeholder="{{__('Seq No.')}}">
        </div>
        
        <div class="form-group">
            <label for="publish_at">{{__('Publish At')}}</label>
            <input type="date" class="form-control datepicker" value="{{$post->publish_at}}" id="publish_at" name="publish_at" placeholder="{{__('Publish At')}}">
        </div>
        
        <div class="form-group">
            <label for="created_at">{{__('Created At')}}</label>
            <input disabled type="date" class="form-control datepicker" value="{{date('Y-m-d',strtotime($post->created_at))}}" id="created_at" name="created_at">
        </div>
        
        <div class="form-group">
            <label for="status">{{__('Status')}}</label>
            <select name="status" id="status" class="form-control">
                <option @if($post->status == 'publish') selected @endif value="publish">{{__('Publish')}}</option>
                <option @if($post->status == 'draft') selected @endif value="draft">{{__('Draft')}}</option>
            </select>
        </div>
        
        <x-media-upload :id="$post->image" :name="'image'" :type="'jpg|png|gif|jpeg'" :dimentions="'1920x1280'" :title="__('Image')"/>

        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Item')}}</button>
    </div>
</div>
