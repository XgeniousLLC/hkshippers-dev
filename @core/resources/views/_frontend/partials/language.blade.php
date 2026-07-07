
@if(!empty(get_static_option('language_select_option')))
    <li class="dropdown" >
        <a>
        <select id="langchange">
            @foreach($all_language as $lang)
                <option @if($user_select_lang_slug == $lang->slug) selected @endif value="{{$lang->slug}}" class="lang-option">{{explode('(',$lang->name)[0] ?? $lang->name}}</option>
            @endforeach
        </select>
        </a>
    </li>
@endif