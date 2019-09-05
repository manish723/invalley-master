@extends('adminlte::page')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Blog Posts</h3>
            <div class="box-tools pull-right">
                <a href="/cp/blog/new-post" class="btn btn-box-tool" id="btnServiceBlockAdd"><i class="fa fa-plus"></i></a>
            </div>
        </div>

        <div class="box-body">
            <table id="tblBlogPosts">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Published</th>
                        <th>Post Date</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->author->name }}</td>
                            <td>{{ $post->f_published ? 'Yes' : 'No' }}</td>
                            <td>{{ $post->post_date_at }}</td>
                            <td>
                                <div class="pull-right">
                                    <a href="/cp/blog/edit-post/{{ $post->uuid }}" class="btn btn-sm btn-default btn-blog-post-edit"><i class="fa fa-edit"></i></a>
                                    <button class="btn btn-sm btn-danger btn-blog-post-delete" data-uuid="{{ $post->uuid }}"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('cp.global-modals.dialog-confirm')
@stop

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
    <script src="/js/cp/blog.js"></script>

    <script type="text/javascript">
        $('#tblBlogPosts').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    </script>
@endpush