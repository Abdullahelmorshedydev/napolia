@extends('web.admin.layouts.app')

@push('style')
@endpush

@section('title', __('admin/comment/index.title'))

@section('breadcrumb')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('admin/comment/index.header') }}</h4>
                <span class="text-muted mt-1 tx-13 ml-2 mb-0">/ {{ __('admin/comment/index.active') }}</span>
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
                    <h4 class="card-title mg-b-0">{{ __('admin/comment/index.label') }}</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('admin/comment/index.name') }}</th>
                                <th>{{ __('admin/comment/index.email') }}</th>
                                <th>{{ __('admin/comment/index.comment') }}</th>
                                <th>{{ __('admin/comment/index.status') }}</th>
                                <th>{{ __('admin/comment/index.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $comment)
                                <tr>
                                    <th scope="row">{{ $comments->firstItem() + $loop->index }}</th>
                                    <td>{{ $comment->name }}</td>
                                    <td>{{ $comment->email }}</td>
                                    <td>{{ $comment->comment }}</td>
                                    <td>{{ $comment->status->lang() }}</td>
                                    <td>
                                        @can('blog-edit')
                                            @if ($comment->status->value == 'active')
                                                <a href="{{ route('admin.blogs.hide_comment', $comment->id) }}"
                                                    class="btn btn-info">
                                                    {{ __('admin/blog/index.hide') }}
                                                </a>
                                            @elseif ($comment->status->value == 'desactive')
                                                <a href="{{ route('admin.blogs.show_comment', $comment->id) }}"
                                                    class="btn btn-info">
                                                    {{ __('admin/blog/index.show') }}
                                                </a>
                                            @endif
                                        @endcan
                                        @can('blog-delete')
                                            <form class="d-inline"
                                                action="{{ route('admin.blogs.destroy_comment', $comment->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"
                                                    type="submit">{{ __('admin/blog/index.delete') }}</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $comments->links() }}
            </div>
        </div>
    </div>
    <!--/div-->
@endsection

@push('script')
@endpush
