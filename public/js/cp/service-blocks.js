$(document).ready(function() {
    var edtServiceBlockMode = 'add';
    var edtServiceBlockUuid = '';

    var tblServiceBlocks = $('#tblServiceBlocks').DataTable({
        'paging'      : false,
        'lengthChange': false,
        'searching'   : false,
        'info'        : true,
        'autoWidth'   : false,
        rowReorder: true,
        aoColumns: [
            {
                target: 0,
                bSortable: false,
                bVisible: false
            },
            {
                target: 1,
                bSortable: false,
                bVisible: true
            },
            {
                target: 2,
                bSortable: false,
                bVisible: true
            },
            {
                target: 3,
                bSortable: false,
                bVisible: true
            },
            {
                target: 4,
                bSortable: false,
                bVisible: true
            },
            {
                target: 5,
                bSortable: false,
                bVisible: true
            }
        ]
    });

    tblServiceBlocks.on('row-reorder', function (e, diff, edit) {
        var result = [];

        for ( var i = 0, ien = diff.length; i < ien; i++) {
            result.push($(diff[i].node).data('uuid') + ':' + diff[i].newPosition);
        }

        axios({
            method: 'post',
            url: '/cp/service-blocks/order',
            data: {
                result: result
            }
        });
    });

    $('#btnServiceBlockAdd').on('click', function() {
        editor_service_block_reset();

        $('#edtServiceBlock_Title').text('Add Service Block');
        $('#edtServiceBlock_btnSave').text('Create');

        $('#modServiceBlockEditor').modal('show');
    });

    $('#edtServiceBlock_cboIcon').change(function() {
        switch ($(this).val()) {
            case '--upload-new--':
                $('#serviceBlockIconUploader').removeClass('hidden');
                break;

            default:
                $('#serviceBlockIconUploader').addClass('hidden');
                break;
        }
    });

    tblServiceBlocks.on('click', '.btn-service-block-edit', function() {
        var uuid = $(this).data('uuid');

        axios({
            method: 'get',
            url: '/cp/service-blocks/a/' + uuid
        }).then(function(ret) {
            var block = ret.data;

            editor_service_block_reset();

            edtServiceBlockMode = 'edit';
            edtServiceBlockUuid = block.uuid;

            $('#edtServiceBlock_Title').text('Edit Service Block');
            $('#edtServiceBlock_btnSave').text('Save Changes');

            $('#edtServiceBlock_cboIcon').val(block.icon);
            $('#edtServiceBlock_txtTitle').val(block.title);
            $('#edtServiceBlock_txtPrice').val(block.price);
            $('#edtServiceBlock_txtPriceSubheading').val(block.priceSubheading);
            $('#edtServiceBlock_txtDescription').val(block.description);
            $('#edtServiceBlock_txtButtonUrl').val(block.buttonUrl);

            if (block.fHighlight) {
                $('#edtServiceBlock_chkHighlight').prop('checked', true);
            }

            if (block.fActive) {
                $('#edtServiceBlock_chkActive').prop('checked', true);
            }

            $('#modServiceBlockEditor').modal('show');

        }).catch(function(ret) {
            alert('Service block not found');

        });

    }).on('click', '.btn-service-block-delete', function(e) {
        var uuid = $(this).data('uuid');

        e.preventDefault();

        $('#lblDialogConfirm_Title').text('Delete Service Block');
        $('#lblDialogConfirm_Message').html('Are you sure you wish to delete this service block? This action cannot be undone.');
        $('#btnDialogConfirm_Confirm').text('Delete');

        $('#modDialogConfirm').modal({
            backdrop: 'static',
            keyboard: false
        }).one('click', '#btnDialogConfirm_Confirm', function(e) {
            axios({
                method: 'delete',
                url: '/cp/service-blocks/a/' + uuid,
                data: {
                    uuid: uuid
                }
            }).then(function(ret) {
                window.location = ret.data.location;

            }).catch(function(ret) {


            });
        });
    });

    $('#edtServiceBlock_btnSave').on('click', function() {
        var btn = $(this);
        var btnText = btn.text();

        btn.attr('disabled', true).text('Saving...');

        axios({
            method: 'post',
            url: '/cp/service-blocks',
            data: {
                mode: edtServiceBlockMode,
                uuid: edtServiceBlockUuid,
                edtServiceBlock_cboIcon: $('#edtServiceBlock_cboIcon').val(),
                edtServiceBlock_txtTitle: $('#edtServiceBlock_txtTitle').val(),
                edtServiceBlock_txtPrice: $('#edtServiceBlock_txtPrice').val(),
                edtServiceBlock_txtPriceSubheading: $('#edtServiceBlock_txtPriceSubheading').val(),
                edtServiceBlock_txtDescription: $('#edtServiceBlock_txtDescription').val(),
                edtServiceBlock_txtButtonUrl: $('#edtServiceBlock_txtButtonUrl').val(),
                edtServiceBlock_chkHighlight: $('#edtServiceBlock_chkHighlight').is(':checked') ? true : false,
                edtServiceBlock_chkActive: $('#edtServiceBlock_chkActive').is(':checked') ? true : false,
            }
        }).then(function(ret) {
            window.location = ret.data.location;

        }).catch(function(ret) {
            reset_form_errors('frmServiceBlockEditor');
            form_errors(ret.response.data.errors, true);
            btn.attr('disabled', false).text(btnText);

        });
    });
});

function editor_service_block_reset() {
    reset_form_errors('frmServiceBlockEditor');

    $('#edtServiceBlock_Title').text('Add Service Block');
    $('#edtServiceBlock_btnSave').attr('disabled', false).text('Create');
    $('#edtServiceBlock_cboIcon').val('');
    $('#edtServiceBlock_txtTitle').val('');
    $('#edtServiceBlock_txtPrice').val('');
    $('#edtServiceBlock_txtPriceSubheading').val('');
    $('#edtServiceBlock_txtDescription').val('');
    $('#edtServiceBlock_txtButtonUrl').val('');
    $('#edtServiceBlock_chkHighlight').prop('checked', false);
    $('#edtServiceBlock_chkActive').prop('checked', false);

    edtServiceBlockMode = 'add';
    edtServiceBlockUuid = '';
}