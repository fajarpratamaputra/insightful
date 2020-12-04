<div class="content-body">

<div class="container" style="margin-top: 50px;">

    <h5># Tambah Psikolog</h5>
    <div class="card card-default">
        <div class="card-body">
            <form id="addStudent" class="form-inline" method="POST" action="">
                <div class="form-group mb-2">
                    <label for="username" class="sr-only">Username</label>
                    <input id="username" type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="email" class="sr-only">Email</label>
                    <input id="email" type="text" class="form-control" name="email" placeholder="Email" required autofocus>
                </div>
                <div class="form-group mb-2">
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required autofocus>
                </div>
                <button id="submitStudent" type="button" class="btn btn-primary mx-sm-3 mb-2">Tambah</button>
            </form>
        </div>
    </div>

    <br>

    <h5># Data Psikolog</h5>
    
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-responsive-sm">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th width="280" class="text-center">Action</th>
                        </tr>
                    </thead>
                    
                    <tbody id="tbody">
                    
                    </tbody>
                </table>
            </div>
        </div>    
    </div>

</div>

<!-- Update Model -->
<form action="" method="POST" class="users-update-record-model form-horizontal">
    <div id="update-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width:55%;">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Update</h4>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body" id="updateBody">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close
                    </button>
                    <button type="button" class="btn btn-success updateStudent">Update
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Delete Model -->
<form action="" method="POST" class="users-remove-record-model">
    <div id="remove-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Delete</h4>
                    <button type="button" class="close remove-data-from-delete-form" data-dismiss="modal" aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data siswa ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Close
                    </button>
                    <button type="button" class="btn btn-danger waves-effect waves-light deleteStudent">Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

</div>

<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
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
    firebase.database().ref('Users/').orderByChild("karyawan").equalTo("Psikolog").on('value', function (snapshot) {
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function (index, value) {
            if (value) {
                htmls.push('<tr>\
                <td>' + value.username + '</td>\
                <td>' + value.email + '</td>\
                <td>' + value.karyawan + '</td>\
                <td><button data-toggle="modal" data-target="#update-modal" class="btn btn-info updateStudent" data-id="' + value.id + '">Update</button>\
                <button data-toggle="modal" data-target="#remove-modal" class="btn btn-danger removeStudent" data-id="' + value.id + '">Delete</button></td>\
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
        var username = values[0].value;
        var email = values[1].value;
        var password = values[2].value;
        
        firebase.auth().createUserWithEmailAndPassword(email, password).then((success) => {
            var user = firebase.auth().currentUser;
            var uid;
            if (user != null) {
                uid = user.uid;
            }
            var firebaseRef = firebase.database().ref('Users/');
            var userData = {
                email: email,
                id: uid,
                jeniskelamin: "0",
                karyawan: "Psikolog",
                nohp: "0",
                password: password,
                umur: "0",
                username: username
            }
            firebaseRef.child(uid).set(userData);
            swal('Your Account Created','Your account was created successfully, you can log in now.')
        }).catch((error) => {
            // Handle Errors here.
            var errorCode = error.code;
            var errorMessage = error.message;
            swal({
                type: 'error',
                title: 'Error',
                text: "Error",
            })
        });
        
        // Reassign lastID value
        // lastIndex = userID;
        $("#addStudent input").val("");
        // menampilkan alert
        alert("Berhasil menambah data");
    });

    // Update Data
    var updateID = 0;
    $('body').on('click', '.updateStudent', function () {
        updateID = $(this).attr('data-id');
        firebase.database().ref('Users/' + updateID).on('value', function (snapshot) {
            var values = snapshot.val();
            var updateData = '<div class="form-group">\
                <label for="edit_nis" class="col-md-12 col-form-label">Username</label>\
                <div class="col-md-12">\
                    <input id="edit_nis" type="text" class="form-control" name="edit_nis" value="' + values.username + '" placeholder="Username" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="edit_name" class="col-md-12 col-form-label">Email</label>\
                <div class="col-md-12">\
                    <input id="edit_name" type="text" class="form-control" name="edit_name" value="' + values.email + '" placeholder="Email" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="edit_age" class="col-md-12 col-form-label">Phone</label>\
                <div class="col-md-12">\
                    <input id="edit_age" type="number" class="form-control" name="edit_age" value="' + values.phone + '" placeholder="Phone" required autofocus>\
                </div>\
            </div>\
            <input id="edit_age" type="hidden" class="form-control" name="edit_age" value="' + values.id + '" required autofocus>\
            <input id="edit_age" type="hidden" class="form-control" name="edit_age" value="' + values.password + '" required autofocus>';

            $('#updateBody').html(updateData);
        });
    });

    $('.updateStudent').on('click', function () {
        var values = $(".users-update-record-model").serializeArray();
        var postData = {
            username: values[0].value,
            email: values[1].value,
            jeniskelamin: "0",
            nohp: values[2].value,
            id: values[3].value,
            karyawan: "Psikolog",
            password: values[4].value,
            umur: "0",
        };
        var updates = {};
        updates['/Users/' + updateID] = postData;
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
            
        firebase.database().ref('Users/' + id).on('value', function (snapshot) {
            var values = snapshot.val();
            firebase.auth().signInWithEmailAndPassword(values.email, values.password)
                .then((user) => {
                    firebase.auth().currentUser.delete();              
                })
                .catch((error) => {
                    var errorCode = error.code;
                    var errorMessage = error.message;
                });

        });
        firebase.database().ref('Users/' + id).remove();  
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
