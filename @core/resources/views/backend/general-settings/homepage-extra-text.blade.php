@extends('backend.admin-master')
@section('site-title')
    {{__('Homepage Extra Text')}}
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <x-flash-msg/>
                <x-error-msg/>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('Homepage Extra Text')}}</h4>
                        <p class="text-muted">{{__('This text appears above the announcement banner on the homepage. Set status to Draft to hide it.')}}</p>

                        <form action="{{route('admin.general.homepage.extra.text')}}" method="POST">
                            @csrf

                            <ul class="nav nav-tabs mb-3" id="hetTabs" role="tablist">
                                @foreach($all_languages as $i => $lang)
                                    <li class="nav-item">
                                        <a class="nav-link @if($i == 0) active @endif" data-toggle="tab" href="#het_tab_{{$lang->slug}}" role="tab">{{$lang->name}}</a>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="tab-content">
                                @foreach($all_languages as $i => $lang)
                                    @php $record = $records[$lang->slug] ?? null; @endphp
                                    <div class="tab-pane fade @if($i == 0) show active @endif" id="het_tab_{{$lang->slug}}" role="tabpanel">

                                        <div class="form-group">
                                            <label>{{__('Status')}}</label>
                                            <select name="status_{{$lang->slug}}" class="form-control" style="max-width:200px;">
                                                <option value="publish" @if(optional($record)->status == 'publish') selected @endif>{{__('Publish (Visible)')}}</option>
                                                <option value="draft" @if(!$record || optional($record)->status == 'draft') selected @endif>{{__('Draft (Hidden)')}}</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>{{__('Content')}}</label>
                                            <div class="editor">
                                                <input type="hidden" name="content_{{$lang->slug}}" value="{{optional($record)->content}}">
                                                <div class="_summernote" data-content='@php echo str_replace("'","&#39;",optional($record)->content) @endphp'></div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>

                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Save Changes')}}</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
