<div class="container">
    <div class="row header-content">
        <div class="col-12">
            <div class="left-part">
                <a href="{{ route('index') }}">
                    <img class="siteLogo" src="{{ asset('storage/' . settings()->get('site_logo')) }}" class=" img-fluid"
                        alt="">
                </a>
            </div>
            <div class="nav-right">
                @include('web.site.layouts.header.navbar.main_nav')
                {{-- @include('web.site.layouts.header.navbar.search_bar') --}}
                @include('web.site.layouts.header.navbar.nav_icon')
            </div>
        </div>
    </div>
</div>
