@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/state/index.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/state/index.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/state/index.active') }}</span>
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
                    <h4 class="card-title mg-b-0">{{ __('admin/state/index.label') }}</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('admin/state/index.name') }}</th>
                                <th>{{ __('admin/state/index.country_name') }}</th>
                                <th>{{ __('admin/state/index.city_name') }}</th>
                                <th>{{ __('admin/state/index.status') }}</th>
                                <th>{{ __('admin/state/index.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($states as $state)
                                <tr>
                                    <th scope="row">{{ $states->firstItem() + $loop->index }}</th>
                                    <th>{{ $state->name }}</th>
                                    <th>{{ $state->country->name }}</th>
                                    <th>{{ $state->city->name }}</th>
                                    <td>{{ $state->status->lang() }}</td>
                                    <td>
                                        <a href="{{ route('admin.states.edit', $state->id) }}" class="btn btn-info">
                                            {{ __('admin/state/index.edit') }}
                                        </a>
                                        <form class="d-inline"
                                            action="{{ route('admin.states.destroy', $state->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"
                                                type="submit">{{ __('admin/state/index.delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $states->links() }}
            </div>
        </div>
    </div>
    <!--/div-->
@endsection

@push('script')
@endpush
