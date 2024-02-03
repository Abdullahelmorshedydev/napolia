<div class="mb-3 mb-xl-0">
    <div class="btn-group dropdown">
        <button type="button" class="btn btn-primary">{{ __('admin/home/sidebar.country_title') }}</button>
        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="sr-only"></span>
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
            <a class="dropdown-item"
                href="{{ route('admin.countries.index') }}">{{ __('admin/home/sidebar.country_all') }}</a>
            @can('country-create')
                <a class="dropdown-item"
                    href="{{ route('admin.countries.create') }}">{{ __('admin/home/sidebar.country_create') }}</a>
            @endcan
        </div>
    </div>
</div>
