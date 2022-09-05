<div class="modal fade" id="modal-permission-role" tabindex="-1" role="dialog"
aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <form action="#" id="form_add_permission" width="100%">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="role_id" id="role_id" value="">
                    
                    <div id="mymenu"></div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn_add_permission">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                
            </div>
        </div>
    </form>
</div>