

<li class="dropdown" data-animation="fadeIn">

    <a  href="{{route('homepage')}}" data-title="Home"> {{__('Home')}} </a>

</li>

<li class="dropdown" data-animation="fadeIn">

    <a class="dropdown-toggle" data-toggle="dropdown" href="#" data-title="About Council"> {{__('About Council')}} </a>

    <ul class="dropdown-menu no-border-radius">

        <li><a href="{{route('frontend.page',['type'=>'council-background'])}}"> {{__('Council Background')}} </a></li>

        <li><a href="{{route('frontend.page',['type'=>'chairman-message'])}}"> {{__('Chairman\'s Message')}} </a></li>

        <li><a href="{{route('frontend.page',['type'=>'council-service-activities'])}}"> {{__('Council Services & Activities')}} </a></li>

        <li><a href="{{route('frontend.page',['type'=>'internatioinal-representation'])}}" target="_blank"> {{__('International Representation')}} </a></li>

        <li><a href="{{route('frontend.page',['type'=>'activity'])}}" target="_blank"> {{__('Activity')}} </a></li>

        <li><a href="{{route('frontend.page',['type'=>'logisitcs-mission-speaking-occasions'])}}" target="_blank"> {{__('Logisitcs Mission & Speaking Occasions')}} </a></li>

        <li><a href="{{route('frontend.page',['type'=>'annual-report'])}}" target="_blank"> {{__('Annual Report')}} </a></li>

    </ul>

</li>

<li class="dropdown" data-animation="fadeIn">

    <a class="dropdown-toggle" data-toggle="dropdown" href="#" data-title="Members"> {{__('Members')}} </a>

    <ul class="dropdown-menu no-border-radius">

        <li><a href="{{route('frontend.page',['type'=>'honorary-chairman'])}}"> {{__('Honorary Chairman')}} </a></li>

        <li><a href="{{route('frontend.page',['type'=>'chairman'])}}"> {{__('Chairman')}} </a></li>

        <li><a href="{{route('frontend.page',['type'=>'executive-committee'])}}"> {{__('Executive Committee')}} </a></li>

        <li><a href="{{route('frontend.page',['type'=>'specialised-sub-committee'])}}"> {{__('Specialised Sub-Committee')}} </a></li>

        <li><a href="{{route('frontend.page',['type'=>'founders-ordinary-members'])}}"> {{__('Founders\' and Ordinary Members')}} </a></li>

        <li><a href="{{route('frontend.page',['type'=>'associate-members'])}}"> {{__('Associate Members')}} </a></li>

    </ul>

</li>

<li class="dropdown" data-animation="fadeIn">

    <a class="dropdown-toggle" data-toggle="dropdown" href="#" data-title="Market Information"> {{__('Market Information')}} </a>

    <ul class="dropdown-menu no-border-radius">

        <li><a href="{{route('frontend.page',['type'=>'economic-indicator'])}}"> {{__('Economic Indicator')}} </a></li>

        <li><a href="{{route('frontend.page',['type'=>'trade-economic-outlook'])}}"> {{__('Trade Economic Outlook')}} </a></li>

        <li><a href="{{route('frontend.page',['type'=>'study-report'])}}"> {{__('Study Report')}} </a></li>

        <li><a href="{{route('frontend.page',['type'=>'survey-report'])}}"> {{__('Survey Report')}} </a></li>

        <li><a href="{{route('frontend.page',['type'=>'other-useful-information'])}}"> {{__('Other Useful Information')}} </a></li>

    </ul>

</li>

<li class="dropdown" data-animation="fadeIn">

    <a class="dropdown-toggle" data-toggle="dropdown" href="#" data-title="Events"> {{__('Events')}} </a>

    <ul class="dropdown-menu no-border-radius">

        <li><a href="{{route('frontend.page',['type'=>'councils-events'])}}"> {{__('Councils Events')}} </a></li>

        <li><a href="{{route('frontend.page',['type'=>'industry-events'])}}"> {{__('Industry Events')}} </a></li>

        <li><a href="{{route('frontend.page',['type'=>'project-info'])}}"> {{__('Project')}} </a></li>
    
    </ul>
</li>

<li class="dropdown" data-animation="fadeIn">

    <a class="dropdown-toggle" data-toggle="dropdown" href="#" data-title="Events"> {{__('What\'s News')}} </a>

    <ul class="dropdown-menu no-border-radius">

        <li><a href="{{route('frontend.page',['type'=>'from-the-council'])}}"> {{__('From The Council')}} </a></li>

        <li><a  href="{{route('frontend.page',['type'=>'what-new'])}}" data-title="News"> {{__('News')}} </a></li>

    </ul>

</li>

{{-- <li data-animation="fadeIn">

    <a class="" href="{{route('frontend.page',['type'=>'biz-links'])}}" data-title="Biz Links"> {{__('Biz Links')}} </a>

</li> --}}

<li  data-animation="fadeIn">

    <a class=""  href="{{route('frontend.page.form',['type'=>'contact-us'])}}" data-title="Contact Us"> {{__('Contact Us')}} </a>

</li>

<li  data-animation="fadeIn">

    <a class=""  href="{{route('frontend.page.form',['type'=>'join-us'])}}" data-title="Join Us"> {{__('Join Us')}} </a>

</li>

@include('_frontend.partials.language')

