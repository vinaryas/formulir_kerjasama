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
                    {{ method_field('GET') }}
                    <div class="form-group">
                        <label for="level">Name</label>
                        <div class="input-value">
                            <input type="text" class="form-control form-control-sm" id="name" name="name">
                            <div id="feedback_name" class="feedback text-danger d-none"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="level">User ID</label>
                        <div class="input-value">
                            <input type="text" class="form-control form-control-sm" id="username" name="username">
                            <div id="feedback_username" class="feedback text-danger d-none"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="level">Email</label>
                        <div class="input-value">
                            <input type="email" class="form-control form-control-sm" id="email" name="email">
                            <div id="feedback_email" class="feedback text-danger d-none"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="level">Role</label>
                        <div class="input-value">
                            <select name="role_id" id="role_id" class="select2" style="width: 100%;"></select>
                            <div id="feedback_role_id" class="feedback text-danger d-none"></div>
                        </div>
                    </div>

                    {{-- <div class="form-group">
						<label for="level">Password <small class="text-muted">(Min. 8 karakter)</small></label>
                        <div class="input-value">
                            <input type="password" class="form-control form-control-sm" id="password" name="password" disabled>
							<div id="feedback_password" class="feedback text-danger d-none"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="level">Retype Password</label>
                        <div class="input-value">
                            <input type="password" class="form-control form-control-sm" id="password_confirmation" name="password_confirmation" disabled>
                            <div id="feedback_username" class="feedback text-danger d-none"></div>
                        </div>
                    </div> --}}

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
