@extends('adminlte::page')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">{{ ucfirst($mode) }} Blog Post</h3>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <br>

                    <div class="form-group">
                        <label>Post Title</label>
                        <input type="text" class="form-control input-lg" id="title" value="{{ !is_null($post) ? $post->title : '' }}">
                        <div id="msg_title" class="help-block small"></div>
                    </div>

                    <div class="form-group">
                        <label>Summary</label>
                        <textarea id="summary">{!! !is_null($post) ? $post->postContent->summary : '' !!}</textarea>
                        <div id="msg_summary" class="help-block small"></div>
                    </div>

                    <label>Post Body</label>
                    <div class="form-group">
                        <textarea id="content">{!! !is_null($post) ? $post->postContent->content : '' !!}</textarea>
                        <div id="msg_content" class="help-block small"></div>
                    </div>

                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="chkBlogPublished" {!! !is_null($post) && $post->f_published ? 'checked="checked"' : '' !!}>
                                Published
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-footer">
            <div class="pull-right">
                <button class="btn btn-sm btn-primary" id="btnBlogPublish">Publish</button>
            </div>
        </div>
    </div>
@stop

@push('css')
    <link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@endpush

@push('js')
    <script src="/js/cp/common.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
    <script src="/js/cp/blog.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

    <script type="text/javascript">
        var edtBlogPostMode = '{{ $mode }}';
        var edtBlogPostUuid = '{{ !is_null($post) ? $post->uuid : '' }}';

        $(document).ready(function() {
            $('#summary').summernote({
                height: 150
            });

            $('#content').summernote({
                height: 400
            });
        });
    </script>
@endpush