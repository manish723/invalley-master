<div class="modal modal-default fade" id="modServiceBlockEditor">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="edtServiceBlock_Title"></h4>
            </div>
            <div class="modal-body" id="frmServiceBlockEditor">

                <div class="form-group">
                    <label for="edtServiceBlock_cboIcon">Icon</label>
                    <select id="edtServiceBlock_cboIcon" class="form-control input-sm">
                        <option value="">-- Please select --</option>
                        <option value="--upload-new--">Upload new icon</option>
                        @foreach ($iconList as $icon)
                            <option value="{{ $icon->getFilename() }}">{{ $icon->getFilename() }}</option>
                        @endforeach
                    </select>
                    <div id="msg_title" class="help-block small"></div>
                </div>

                <div id="serviceBlockIconUploader" class="hidden">
                    <form action="/cp/upload/service-block-icon" class="dropzone" id="serviceBlockIconUploaderDropzone"></form>
                </div>

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" id="edtServiceBlock_txtTitle" class="form-control input-sm">
                    <div id="msg_edtServiceBlock_txtTitle" class="help-block small"></div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Price ($)</label>
                            <input type="text" class="form-control input-sm" id="edtServiceBlock_txtPrice">
                            <div id="msg_edtServiceBlock_txtPrice" class="help-block small"></div>
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="form-group">
                            <label>Price Subheading</label>
                            <input type="text" class="form-control input-sm" id="edtServiceBlock_txtPriceSubheading">
                            <div id="msg_edtServiceBlock_txtPriceSubheading" class="help-block small"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <input type="text" id="edtServiceBlock_txtDescription" class="form-control input-sm">
                    <span class="small">Allows HTML</span>
                    <div id="msg_edtServiceBlock_txtDescription" class="help-block small"></div>
                </div>

                <div class="form-group">
                    <label>Button URL</label>
                    <input type="text" id="edtServiceBlock_txtButtonUrl" class="form-control input-sm">
                    <span class="small">Please include http:// or https:// if required in the URL, or start with / if a page on the Invalley website</span>
                    <div id="msg_edtServiceBlock_txtButtonUrl" class="help-block small"></div>
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="edtServiceBlock_chkHighlight">
                            Highlight
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="edtServiceBlock_chkActive">
                            Active
                        </label>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="edtServiceBlock_btnSave">Save changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" id="edtServiceBlock_btnClose">Cancel</button>
            </div>
        </div>
    </div>
</div>