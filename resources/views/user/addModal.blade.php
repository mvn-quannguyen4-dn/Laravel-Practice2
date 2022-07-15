<!-- Modal add-->
<div class="modal fade" id="Modal-add" tabindex="-1" role="dialog" aria-labelledby="add-modal-label" aria-hidden="true">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add User</h4>
            </div>
            <form action=""  enctype="multipart/form-data" id="add-form">
            <div class="modal-body">
                    <div class="form-group">
                        <label for="name">New Name</label>
                        <input type="text" class="form-control" name="name" id="add-name">
                    </div>
                    <div class="form-group">
                        <label for="email">New email</label>
                        <input type="text" class="form-control" name="email" id="add-email">
                    </div>
                    <div class="form-group">
                        <label for="name">New Password</label>
                        <input type="password" class="form-control" name="password" id="add-password">
                    </div>
                    <div class="form-group">
                        <label for="age">New Age</label>
                        <input type="text" class="form-control" name="age" id="add-age">
                    </div>
                    <div class="form-group">
                        <label for="birthday">New BirthDay</label>
                        <input type="date" class="form-control" name="birthday" id="add-birthday">
                    </div>
                    <div class="form-group">
                        <label for="avatar">Avatar</label>
                        <input type="file" class="form-control" name="avatar" id="add-avatar">
                    </div>
                    <div class="form-group">
                        <label for="name">New address</label>
                        <input type="text" class="form-control" name="address" id="add-address">
                    </div>
                    <div class="form-group">
                        <label for="name">New tel</label>
                        <input type="text" class="form-control" name="tel" id="add-tel">
                    </div>
                    <div class="form-group">
                        <label for="name">New province</label>
                        <input type="text" class="form-control" name="province" id="add-province">
                    </div>
            </div>
            <div class="modal-footer">
            <button type="button" id="finish-add" class="btn btn-success" data-dismiss="modal">Create new user</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>

