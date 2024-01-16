<div class="d-flex my-xl-auto right-content">
    <div class="pr-1 mb-3 mb-xl-0">
        <a href="{{ route('admin.shippings.index') }}" type="button"
            class="btn btn-info mr-1">{{ __('admin/home/sidebar.shipping_title') }}</a>
    </div>
    <div class="mr-1">
        @include('web.admin.partials._countryPartials')
    </div>
    <div class="mr-1">
        @include('web.admin.partials._cityPartials')
    </div>
    <div class="mr-1">
        @include('web.admin.partials._statePartials')
    </div>
</div>