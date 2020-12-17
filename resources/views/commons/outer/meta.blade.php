<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title }}</title>

<link rel="shortcut icon" href="{{asset('inf/favicon.ico')}}" type="image/x-icon"/>
<link rel="icon" href="{{asset('inf/favicon.ico')}}" type="image/x-icon"/>

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<![endif]-->
<!-- <script charset="UTF-8" src="//web.webpushs.com/js/push/49234d57d25fceb6a9cd691bf77c9199_1.js" async></script> -->

<meta name="description"  content="{{ $desc }}" />

<link rel="canonical" href="{{ $route }}" />
<!-- /all in one seo pack -->
<link rel='dns-prefetch' href='//ajax.googleapis.com' />
<link rel='dns-prefetch' href='//s.w.org' />
@if(strlen($custom))
<link rel='stylesheet' id='styles-css'  href="{{asset('inf/' . $custom)}}" type='text/css' media='all'/>
@endif
<link rel='stylesheet' id='styles-css'  href="{{asset('inf/style.min.css')}}" type='text/css' media='all'/>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
    .log-btn {
        min-width: 50% !important;
    }
    .first-screen-wrap {
        background-image: url({{asset('inf/first-screen-bg.jpg')}});
    }
</style>