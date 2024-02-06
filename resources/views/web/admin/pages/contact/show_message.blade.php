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
        <div class="row">
            <div class="col-12  col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <h5 class="card-text d-block">{{ __('site/auth/profile.name') . ' : ' . $contact->name }}
                                </h5>
                                <p class="card-text d-block">{{ __('site/auth/profile.phone') . ' : ' . $contact->phone }}
                                </p>
                                <p class="card-text d-block">{{ __('site/auth/profile.email') . ' : ' . $contact->email }}
                                </p>
                                <p class="card-text d-block">{{ __('site/home/nav.subject') . ' : ' . $contact->subject }}
                                </p>
                                <p class="card-text">{{ __('site/home/nav.message') . ' : ' . $contact->message }}</p>
                                @if ($contact->status->value == 'unread')
                                    @can('message-read')
                                        <a href="{{ route('admin.contact.read', $contact->id) }}"
                                            class="card-link text-secondary">{{ __('admin/contact/index.markread') }}</a>
                                    @endcan
                                @elseif($contact->status->value == 'read')
                                    @can('message-unread')
                                        <a href="{{ route('admin.contact.unread', $contact->id) }}"
                                            class="card-link text-secondary">{{ __('admin/contact/index.markunread') }}</a>
                                    @endcan
                                @endif
                                @can('message-delete')
                                    <form class="d-inline" action="{{ route('admin.contact.destroy_message', $contact->id) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"
                                            type="submit">{{ __('admin/contact/index.delete') }}</button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->
@endsection

@push('script')
@endpush
