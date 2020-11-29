<div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Psychologist</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Psychologist</a></li>
                    </ol>
                </div>
                <!-- row -->
                <form action="<?=base_url('psikolog/insert');?>" enctype="multipart/form-data" method="post">
                <div class="row">
                    
                    <div class="col-xl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form Personal</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="form-group">
                                        <label for="">Full Name</label>
                                        <input type="text" name="fullname" class="form-control input-default " placeholder="Office Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="number" name="phone" class="form-control input-rounded" placeholder="Phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea class="form-control" name="address" rows="4" id="comment"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Photo</label>
                                        <input type="file" name="file" class="form-control input-default " placeholder="Office Name">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Insert</button>
                                    <a href="<?=base_url()?>/psikolog" class="btn btn-primary">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form Account</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" name="email" class="form-control input-default " placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" name="password" class="form-control input-rounded" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                </form>
            </div>
        </div>

        <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
<script>
    // Initialize Firebase
    var firebaseConfig = {
        apiKey: "AIzaSyA4dHoTfOlsUufN-lDvlBMYJRmY2N6lzow",
        authDomain: "insightful-official.firebaseapp.com",
        databaseURL: "https://insightful-official.firebaseio.com",
        projectId: "insightful-official",
        storageBucket: "insightful-official.appspot.com",
        messagingSenderId: "336431121966",
        appId: "1:336431121966:web:3496f51a4c7f73725a81bf",
        measurementId: "G-931FEK227N"
    };
    firebase.initializeApp(firebaseConfig);

    var database = firebase.database();

    var lastIndex = 0;

    // Get Data
    firebase.database().ref('PsikologStatus/').on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function (index, value) {
            if (value) {
                htmls.push('<tr>\
                <td>' + value.nis + '</td>\
                <td>' + value.name + '</td>\
                <td>' + value.age + '</td>\
                <td><button data-toggle="modal" data-target="#update-modal" class="btn btn-info updateStudent" data-id="' + index + '">Update</button>\
                <button data-toggle="modal" data-target="#remove-modal" class="btn btn-danger removeStudent" data-id="' + index + '">Delete</button></td>\
            </tr>');
            }
            lastIndex = index;
        });
        $('#tbody').html(htmls);
        $("#submitStudent").removeClass('disabled');
    });

    // Add Data
    $('#submitStudent').on('click', function () {
        var values = $("#addStudent").serializeArray();
        var nis = values[0].value;
        var name = values[1].value;
        var age = values[2].value;
        

        //logic random
        var result           = '';
        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < 28; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }

        var userID = result;
        firebase.database().ref('PsikologStatus/' + userID).set({
            email: name,
            login: 'false',
            status: 1,
        });

        // Reassign lastID value
        lastIndex = userID;
        $("#addStudent input").val("");
        // menampilkan alert
        alert("Berhasil menambah data");
    });

    // Update Data
    var updateID = 0;
    $('body').on('click', '.updateStudent', function () {
        updateID = $(this).attr('data-id');
        firebase.database().ref('PsikologStatus/' + updateID).on('value', function (snapshot) {
            var values = snapshot.val();
            var updateData = '<div class="form-group">\
                <label for="edit_nis" class="col-md-12 col-form-label">Nomor Induk Siswa</label>\
                <div class="col-md-12">\
                    <input id="edit_nis" type="text" class="form-control" name="edit_nis" value="' + values.nis + '" placeholder="Nomor Induk Siswa" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="edit_name" class="col-md-12 col-form-label">Nama Lengkap</label>\
                <div class="col-md-12">\
                    <input id="edit_name" type="text" class="form-control" name="edit_name" value="' + values.name + '" placeholder="Nama Siswa" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="edit_age" class="col-md-12 col-form-label">Usia</label>\
                <div class="col-md-12">\
                    <input id="edit_age" type="text" class="form-control" name="edit_age" value="' + values.age + '" placeholder="Usia" required autofocus>\
                </div>\
            </div>';

            $('#updateBody').html(updateData);
        });
    });

    $('.updateStudent').on('click', function () {
        var values = $(".users-update-record-model").serializeArray();
        var postData = {
            nis: values[0].value,
            name: values[1].value,
            age: values[2].value,
        };
        var updates = {};
        updates['/PsikologStatus/' + updateID] = postData;
        firebase.database().ref().update(updates);
        // menyembunyikan modal 
        $("#update-modal").modal('hide');
        // menampilkan alert
        alert("Berhasil mengubah data");
    });

    // Remove Data
    $("body").on('click', '.removeStudent', function () {
        var id = $(this).attr('data-id');
        $('body').find('.users-remove-record-model').append('<input name="id" type="hidden" value="' + id + '">');
    });

    $('.deleteStudent').on('click', function () {
        var values = $(".users-remove-record-model").serializeArray();
        var id = values[0].value;
        firebase.database().ref('PsikologStatus/' + id).remove();
        $('body').find('.users-remove-record-model').find("input").remove();
        // menyembunyikan modal
        $("#remove-modal").modal('hide');
        // menampilkan alert
        alert("Berhasil menghapus data");
    });
    $('.remove-data-from-delete-form').click(function () {
        $('body').find('.users-remove-record-model').find("input").remove();
    });
</script>