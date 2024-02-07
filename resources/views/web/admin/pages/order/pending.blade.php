@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/order.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/order.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/order.all_pending') }}</span>
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
                    <h4 class="card-title mg-b-0">{{ __('admin/order.all_pending') }}</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap">
                        <thead>
                            <tr>
                                <th>{{ __('admin/order.id') }}</th>
                                <th>{{ __('admin/order.address') }}</th>
                                <th>{{ __('admin/order.status') }}</th>
                                <th>{{ __('admin/order.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <th>{{ $order->id }}</th>
                                    <th>{{ $order->address . '|' . $order->state->name . '|' . $order->city->name . '|' . $order->country->name }}
                                    </th>
                                    <td>{{ $order->status->lang() }}</td>
                                    <td>
                                        <a href="{{ route('admin.orders.show_order', $order->id) }}"
                                            class="btn btn-secondary">
                                            {{ __('admin/order.show') }}
                                        </a>
                                        @can('order-edit')
                                            @if ($order->status->value != 'canceled' || $order->status->value != 'completed')
                                                <form class="d-inline"
                                                    action="{{ route($order->status->adminButtonLink(), $order->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="{{ $order->status->adminButtonClass() }}"
                                                        type="submit">{{ $order->status->adminButtonLang() }}</button>
                                                </form>
                                            @endif
                                        @endcan
                                        @can('order-delete')
                                            <form class="d-inline" action="{{ route('admin.orders.delete', $order->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"
                                                    type="submit">{{ __('admin/order.delete') }}</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $orders->links() }}
            </div>
        </div>
    </div>
    <!--/div-->
@endsection

@push('script')
@endpush
