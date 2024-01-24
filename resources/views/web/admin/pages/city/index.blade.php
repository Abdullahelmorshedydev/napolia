@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/city/index.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/city/index.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/city/index.active') }}</span>
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
                    <h4 class="card-title mg-b-0">{{ __('admin/city/index.label') }}</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('admin/city/index.name') }}</th>
                                <th>{{ __('admin/city/index.country_name') }}</th>
                                <th>{{ __('admin/city/index.status') }}</th>
                                <th>{{ __('admin/city/index.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cities as $city)
                                <tr>
                                    <th scope="row">{{ $cities->firstItem() + $loop->index }}</th>
                                    <th>{{ $city->name }}</th>
                                    <th>{{ $city->country->name }}</th>
                                    <td>{{ $city->status->lang() }}</td>
                                    <td>
                                        <a href="{{ route('admin.cities.edit', $city->slug) }}" class="btn btn-info">
                                            {{ __('admin/city/index.edit') }}
                                        </a>
                                        <form class="d-inline"
                                            action="{{ route('admin.cities.destroy', $city->slug) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"
                                                type="submit">{{ __('admin/city/index.delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $cities->links() }}
            </div>
        </div>
    </div>
    <!--/div-->
@endsection

@push('script')
@endpush
