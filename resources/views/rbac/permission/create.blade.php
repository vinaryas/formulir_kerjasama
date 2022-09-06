<div id="modal-form" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#" id="form_add">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" id="id" value="">
                    {{ method_field('POST') }}
                    <div class="form-group">
                        <label for="level">Name</label>
                        <div class="input-value">
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="level">Display Name</label>
                        <div class="input-value">
                            <input type="text" class="form-control" id="display_name" name="display_name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="level">Description</label>
                        <div class="input-value">
                            <input type="text" class="form-control" id="description" name="description" required>
                        </div>
                    </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn_add">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>