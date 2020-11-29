
<div class="content-body">
    <div class="container" style="margin-top: 50px;">

        <h5># Tambah Siswa</h5>
        <div class="card card-default">
            <div class="card-body">
                <form id="addStudent" class="form-inline" method="POST" action="">
                    <div class="form-group mb-2">
                        <label for="nis" class="sr-only">Nomor Induk Siswa</label>
                        <input id="nis" type="text" class="form-control" name="nis" placeholder="Nomor Induk Siswa" required autofocus>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="name" class="sr-only">Nama Siswa</label>
                        <input id="name" type="text" class="form-control" name="name" placeholder="Nama Siswa" required autofocus>
                    </div>
                    <div class="form-group mb-2">
                        <label for="age" class="sr-only">Usia</label>
                        <input id="age" type="text" class="form-control" name="age" placeholder="Usia" required autofocus>
                    </div>
                    <button id="submitStudent" type="button" class="btn btn-primary mx-sm-3 mb-2">Tambah</button>
                </form>
            </div>
        </div>
    </div>
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
        firebase.database().ref('Users/' + userID).set({
            email: 'fajar',
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
        firebase.database().ref('students/' + updateID).on('value', function (snapshot) {
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
        updates['/students/' + updateID] = postData;
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
        firebase.database().ref('students/' + id).remove();
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
