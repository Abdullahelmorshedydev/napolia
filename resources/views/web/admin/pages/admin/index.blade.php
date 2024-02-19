@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/admin/index.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/admin/index.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/admin/index.active') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!--div-->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">{{ __('admin/admin/index.label') }}</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('admin/admin/index.name') }}</th>
                                <th>{{ __('admin/admin/index.email') }}</th>
                                <th>{{ __('admin/admin/index.role') }}</th>
                                <th>{{ __('admin/admin/index.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                                <tr>
                                    <th scope="row">{{ $admins->firstItem() + $loop->index }}</th>
                                    <th>{{ $admin->name }}</th>
                                    <th>{{ $admin->email }}</th>
                                    <td>
                                        @if (!empty($admin->getRoleNames()))
                                            @foreach ($admin->getRoleNames() as $role)
                                                {{ $role }}
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @can('admin-edit')
                                            <a href="{{ route('admin.admins.edit', $admin->id) }}" class="btn btn-info">
                                                {{ __('admin/admin/index.edit') }}
                                            </a>
                                        @endcan
                                        @can('admin-delete')
                                            <form class="d-inline" action="{{ route('admin.admins.destroy', $admin->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"
                                                    type="submit">{{ __('admin/admin/index.delete') }}</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $admins->links() }}
            </div>
        </div>
    </div>
    <!--/div-->
@endsection

@push('script')
@endpush
