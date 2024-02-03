<div class="d-flex my-xl-auto right-content">
    @can('shipping-list')
        <div class="pr-1 mb-3 mb-xl-0">
            <a href="{{ route('admin.shippings.index') }}" type="button"
                class="btn btn-info mr-1">{{ __('admin/home/sidebar.shipping_title') }}</a>
        </div>
    @endcan
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
