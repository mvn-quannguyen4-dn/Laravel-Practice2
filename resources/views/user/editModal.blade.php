<!-- Modal Edit-->
<div class="modal fade" id="Modal-edit" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit User</h4>
            </div>
            <form action=""  enctype="multipart/form-data" id="update-form">
            <div class="modal-body">
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="name">ID</label>
                        <input type="text" readonly class="form-control" name="id" id="id" >
                    </div>
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Your email</label>
                        <input type="text" class="form-control" readonly name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="age">Your Age</label>
                        <input type="text" class="form-control" name="age" id="age">
                    </div>
                    <div class="form-group">
                        <label for="birthday">Your BirthDay</label>
                        <input type="date" class="form-control" name="birthday" id="birthday">
                    </div>
                    <div class="form-group">
                        <label for="avatar">Avatar</label>
                        <input type="file" class="form-control" name="avatar" id="avatar">
                    </div>
            </div>
            <div class="modal-footer">
            <button type="button" id="finish-update" class="btn btn-success" data-dismiss="modal">Update</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>

