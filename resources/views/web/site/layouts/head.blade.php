<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ settings()->get('site_description_' . app()->currentLocale()) }}">
    <meta name="keywords" content="{{ settings()->get('site_keywords_' . app()->currentLocale()) }}">
    <meta name="author" content="Abdullah Elmorshedy">
    <link rel="icon" href="{{ asset('storage/' . settings()->get('favicon')) }}" type="image/x-icon" />
    <title>{{ settings()->get('site_name_' . app()->currentLocale()) }}</title>

    @include('web.site.layouts.style')

</head>
