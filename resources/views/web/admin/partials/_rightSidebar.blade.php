<div class="d-flex my-xl-auto right-content">
    @can('country-list')
        <div class="mr-1">
            @include('web.admin.partials._countryPartials')
        </div>
    @endcan
    @can('city-list')
        <div class="mr-1">
            @include('web.admin.partials._cityPartials')
        </div>
    @endcan
    @can('state-list')
        <div class="mr-1">
            @include('web.admin.partials._statePartials')
        </div>
    @endcan
</div>
