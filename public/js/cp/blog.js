$(document).ready(function() {
    $('#btnBlogPublish').on('click', function() {
        var btn = $(this);

        btn.attr('disabled', true).text('Publishing...');

        axios({
            method: 'post',
            url: '/cp/blog/edit-post',
            data: {
                mode: edtBlogPostMode,
                uuid: edtBlogPostUuid,

                title: $('#title').val(),
                summary: $('#summary').val(),
                content: $('#content').val(),
                metaDescription: '',

                published: $('#chkBlogPublished').is(':checked') ? true : false
            }
        }).then(function(ret) {
            window.location = ret.data.location;

        }).catch(function(ret) {
            reset_form_errors('frmBlogEditor');
            form_errors(ret.response.data.errors, true);
            btn.attr('disabled', false).text('Publish');

        });
    });

    $('#tblBlogPosts').on('.btn-blog-post-delete', 'click', function(e) {
        var uuid = $(this).data('uuid');

        e.preventDefault();

        $('#lblDialogConfirm_Title').text('Delete Blog Post');
        $('#lblDialogConfirm_Message').html('Are you sure you wish to delete this blog post? This action cannot be undone.');
        $('#btnDialogConfirm_Confirm').text('Delete');

        $('#modDialogConfirm').modal({
            backdrop: 'static',
            keyboard: false
        }).one('click', '#btnDialogConfirm_Confirm', function(e) {
            axios({
                method: 'delete',
                url: '/cp/blog/a/' + uuid,
                data: {
                    uuid: uuid
                }
            }).then(function(ret) {
                window.location = ret.data.location;

            }).catch(function(ret) {


            });
        });
    });
});