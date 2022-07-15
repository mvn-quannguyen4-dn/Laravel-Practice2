$(document).ready(function() {

    let ID;
    $(document).on('click', "#btn-edit", async function() {
        await $(this).addClass('edit-item-trigger-clicked'); 
        var options = {
        'backdrop': 'static'
        };
        $('#Modal-edit').modal(options)
    })

    $('#Modal-edit').on('show.bs.modal', function() {        
        setTimeout(function(){ 
            var el = $(".edit-item-trigger-clicked"); 
            var row = el.closest(".data-row");
    
            var id = el.data('item-id');
            var name = row.children(".name").text();
            var age = row.children(".age").text();
            var email = row.children(".email").text();
            ID = id;
    
            $("#id").val(id);
            $("#name").val(name);
            $("#age").val(age);
            $("#email").val(email);    
        },1);
    })


    $('#Modal-edit').on('hide.bs.modal', function() {
        $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
        $("#Modal-edit").trigger("reset");
    })

// delete modal
    $(document).on('click', "#btn-delete", async function() {
        await $(this).addClass('delete-item-trigger-clicked'); 
        var options = {
        'backdrop': 'static'
        };
        $('#Modal-delete').modal(options)
    })

    $('#Modal-delete').on('show.bs.modal', function() {        
        setTimeout(function(){ 
            var el = $(".delete-item-trigger-clicked");
            var id = el.data('item-id');
            ID = id; 
        },1);
    })


    $('#Modal-delete').on('hide.bs.modal', function() {
        $('.delete-item-trigger-clicked').removeClass('delete-item-trigger-clicked')
        $("#Modal-delete").trigger("reset");
    })
    
// send update api
    $('#finish-update').on('click', function() {
        var form = new FormData($('#update-form')[0]);
        $.ajax({
            url: '/api/users/'+ID,
            type: 'POST',
            dataType: 'json',
            data: form,
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
                alert("success");
                window.location.reload();
            },
            error: function(e) {
                alert("something went wrong!!");
                console.log(e);
            }
        });
    })

// send delete api
$('#confirm-delete').on('click', function() {
    $.ajax({
        url: '/api/users/'+ID,
        type: 'DELETE',
        contentType: false,
        processData: false,
        success: function(data) {
            alert("success");
            console.log(data);
            window.location.reload();
        },
        error: function(e) {
            alert("something went wrong!!");
            console.log(e);
        }
    });
})
// send add api
    $('#finish-add').on('click', function() {
        var form = new FormData($('#add-form')[0]);
        $.ajax({
            url: '/api/users',
            type: 'POST',
            dataType: 'json',
            data: form,
            contentType: false,
            processData: false,
            success: function(data) {
                alert("success");
                console.log(data);
                window.location.reload();
            },
            error: function(e) {
                alert("something went wrong!!");
                console.log(e);
            }
        });
    })
})