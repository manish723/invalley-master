@extends('adminlte::page')

@section('content')
    <div class="box" id="frmBlogEditor">
        <div class="box-header with-border">
            <h3 class="box-title">Service Blocks</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" id="btnServiceBlockAdd"><i class="fa fa-plus"></i></button>
            </div>
        </div>

        <div class="box-body">
            <table id="tblServiceBlocks">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Highlighted</th>
                        <th>Active</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($serviceBlocks as $block)
                        <tr data-uuid="{{ $block->uuid }}">
                            <td>{{ $block->block_order }}</td>
                            <td class="reorder" style="text-align: left;">{{ $block->title }}</td>
                            <td>${{ $block->price }}</td>
                            <td>{{ $block->f_highlight ? 'Yes' : 'No' }}</td>
                            <td>{{ $block->f_active ? 'Yes' : 'No' }}</td>
                            <td>
                                <div class="pull-right">
                                    <button class="btn btn-sm btn-default btn-service-block-edit" data-uuid="{{ $block->uuid }}"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger btn-service-block-delete" data-uuid="{{ $block->uuid }}"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('cp.global-modals.dialog-confirm')
    @include('cp.service-blocks.modals.editor')
@stop

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.3/js/dataTables.rowReorder.min.js"></script>
    <script src="/vendor/dropzonejs/dropzone.min.js"></script>
    <script src="/js/cp/common.js"></script>
    <script src="/js/cp/service-blocks.js"></script>

    <script type="text/javascript">
        Dropzone.options.serviceBlockIconUploaderDropzone = {
            maxFilesize: 2,
            maxFiles: 1,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(file, response) {
                $('#edtServiceBlock_cboIcon').append(new Option(response.filename, response.filename));
                $('#edtServiceBlock_cboIcon').val(response.filename);

                $('#serviceBlockIconUploader').addClass('hidden');

                this.removeFile(file);
            },
            error: function(file, response) {
                if ($.type(response) === "string") {
                    var message = response;
                } else {
                    var message = response.message;
                }

                file.previewElement.classList.add("dz-error");
                _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
                _results = [];
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i];
                    _results.push(node.textContent = message);
                }
                return _results;
            },
            maxfilesexceeded: function() {
                alert('You can only upload one file');
            }
        };
    </script>
@endpush

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.3/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="/vendor/dropzonejs/dropzone.min.css">
@endpush