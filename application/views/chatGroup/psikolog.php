<div class="content-body">

<div class="container" style="margin-top: 50px;">
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
<form action="<?=base_url('chatGroup/insert');?>" method="POST" class="users-update-record-model form-horizontal">
    <div id="update-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width:55%;">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Lengkapi Topic</h4>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body" id="updateBody">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close
                    </button>
                    <button type="submit" class="btn btn-success">Update
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
                <td><button data-toggle="modal" data-target="#update-modal" class="btn btn-info updateStudent" data-id="' + value.id + '">Pilih</button>\
            </tr>');
            }
            lastIndex = index;
        });
        $('#tbody').html(htmls);
        $("#submitStudent").removeClass('disabled');
    });

    
    var updateID = 0;
    $('body').on('click', '.updateStudent', function () {
        updateID = $(this).attr('data-id');
        firebase.database().ref('Users/' + updateID).on('value', function (snapshot) {
            var values = snapshot.val();
            var updateData = '<div class="form-group">\
                <label for="edit_nis" class="col-md-12 col-form-label">Topic</label>\
                <div class="col-md-12">\
                    <input id="topic" type="text" class="form-control" name="title" placeholder="Topic" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="date" class="col-md-12 col-form-label">Date</label>\
                <div class="col-md-12">\
                    <input id="date" type="date" class="form-control" name="date" placeholder="Date" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="time" class="col-md-12 col-form-label">Time</label>\
                <div class="col-md-12">\
                    <input id="time" type="time" class="form-control" name="time" placeholder="Time" required autofocus>\
                </div>\
            </div>\
            <input id="id" type="hidden" class="form-control" name="id" value="' + values.email + '" required autofocus>\
            <input id="username" type="hidden" class="form-control" name="username" value="' + values.username + '" required autofocus>\
            <input id="token" type="hidden" class="form-control" name="token" value="' + values.token + '" required autofocus>';
            
            $('#updateBody').html(updateData);
        });
    });

    
</script>
