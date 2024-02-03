@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/shipping/index.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/shipping/index.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/shipping/index.active') }}</span>
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
                    <h4 class="card-title mg-b-0">{{ __('admin/shipping/index.label') }}</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('admin/shipping/index.price') }}</th>
                                <th>{{ __('admin/shipping/index.state_name') }}</th>
                                <th>{{ __('admin/shipping/index.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shippings as $shipping)
                                <tr>
                                    <th scope="row">{{ $shippings->firstItem() + $loop->index }}</th>
                                    <th>{{ $shipping->price }}</th>
                                    <th>{{ $shipping->state->name }}</th>
                                    <td>
                                        @can('shipping-edit')
                                            <a href="{{ route('admin.shippings.edit', $shipping->id) }}" class="btn btn-info">
                                                {{ __('admin/shipping/index.edit') }}
                                            </a>
                                        @endcan
                                        @can('shipping-delete')
                                            <form class="d-inline"
                                                action="{{ route('admin.shippings.destroy', $shipping->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"
                                                    type="submit">{{ __('admin/shipping/index.delete') }}</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $shippings->links() }}
            </div>
        </div>
    </div>
    <!--/div-->
@endsection

@push('script')
@endpush
