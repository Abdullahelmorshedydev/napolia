@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/contact/index.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/contact/index.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/contact/index.active') }}</span>
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
                    <h4 class="card-title mg-b-0">{{ __('admin/contact/index.label') }}</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('admin/contact/index.name') }}</th>
                                <th>{{ __('admin/contact/index.phone') }}</th>
                                <th>{{ __('admin/contact/index.email') }}</th>
                                <th>{{ __('admin/contact/index.subject') }}</th>
                                <th>{{ __('admin/contact/index.message') }}</th>
                                <th>{{ __('admin/contact/index.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $message)
                                <tr>
                                    <th scope="row">{{ $messages->firstItem() + $loop->index }}</th>
                                    <th>{{ $message->name }}</th>
                                    <th>{{ $message->phone }}</th>
                                    <th>{{ $message->email }}</th>
                                    <th>{{ $message->subject }}</th>
                                    <th>{{ Str::limit($message->message, 20, '...') }}</th>
                                    <td>
                                        <a href="{{ route('admin.contact.show_message', $message->id) }}"
                                            class="btn btn-secondary">
                                            {{ __('admin/contact/index.show') }}
                                        </a>
                                        @if ($message->status->value == 'unread')
                                            @can('message-read')
                                                <a href="{{ route('admin.contact.read', $message->id) }}"
                                                    class="btn btn-info">{{ __('admin/contact/index.markread') }}</a>
                                            @endcan
                                        @elseif($message->status->value == 'read')
                                            @can('message-unread')
                                                <a href="{{ route('admin.contact.unread', $message->id) }}"
                                                    class="btn btn-info">{{ __('admin/contact/index.markunread') }}</a>
                                            @endcan
                                        @endif
                                        @can('message-delete')
                                            <form class="d-inline"
                                                action="{{ route('admin.contact.destroy_message', $message->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"
                                                    type="submit">{{ __('admin/contact/index.delete') }}</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $messages->links() }}
            </div>
        </div>
    </div>
    <!--/div-->
@endsection

@push('script')
@endpush
