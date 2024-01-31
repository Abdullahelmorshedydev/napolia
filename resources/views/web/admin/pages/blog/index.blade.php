@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/blog/index.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/blog/index.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/blog/index.active') }}</span>
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
                    <h4 class="card-title mg-b-0">{{ __('admin/blog/index.label') }}</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('admin/blog/index.image') }}</th>
                                <th>{{ __('admin/blog/index.title_label') }}</th>
                                <th>{{ __('admin/blog/index.admin_name') }}</th>
                                <th>{{ __('admin/blog/index.status') }}</th>
                                <th>{{ __('admin/blog/index.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <th scope="row">{{ $blogs->firstItem() + $loop->index }}</th>
                                    <td>
                                        <img style="width: 50px;" src="{{ asset($blog->image->image) }}" alt="blog_image">
                                    </td>
                                    <th>{{ $blog->title }}</th>
                                    <th>{{ $blog->admin->name }}</th>
                                    <td>{{ $blog->status->lang() }}</td>
                                    <td>
                                        <a href="{{ route('admin.blogs.show', $blog->slug) }}"
                                            class="btn btn-secondary">
                                            {{ __('admin/blog/index.show') }}
                                        </a>
                                        <a href="{{ route('admin.blogs.edit', $blog->slug) }}" class="btn btn-info">
                                            {{ __('admin/blog/index.edit') }}
                                        </a>
                                        <form class="d-inline"
                                            action="{{ route('admin.blogs.destroy', $blog->slug) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"
                                                type="submit">{{ __('admin/blog/index.delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
    <!--/div-->
@endsection

@push('script')
@endpush
