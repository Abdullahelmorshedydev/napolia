@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/country/index.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/country/index.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/country/index.active') }}</span>
            </div>
        </div>
        @include('web.admin.partials._rightSidebar')
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!--div-->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">{{ __('admin/country/index.label') }}</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('admin/country/index.name') }}</th>
                                <th>{{ __('admin/country/index.status') }}</th>
                                <th>{{ __('admin/country/index.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($countries as $country)
                                <tr>
                                    <th scope="row">{{ $countries->firstItem() + $loop->index }}</th>
                                    <th>{{ $country->name }}</th>
                                    <td>{{ $country->status->lang() }}</td>
                                    <td>
                                        <a href="{{ route('admin.countries.edit', $country->slug) }}" class="btn btn-info">
                                            {{ __('admin/country/index.edit') }}
                                        </a>
                                        <form class="d-inline"
                                            action="{{ route('admin.countries.destroy', $country->slug) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"
                                                type="submit">{{ __('admin/country/index.delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $countries->links() }}
            </div>
        </div>
    </div>
    <!--/div-->
@endsection

@push('script')
@endpush
