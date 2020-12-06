<script>
    function update_status(){
        var updateID = '1234';
        firebase.database().ref('tes/' + updateID).on('value', function (snapshot) {
            var values = snapshot.val();
            var postData = {
                username: values.username,
                email: values.email,
                jeniskelamin: "0",
                nohp: values.nohp,
                id: values.id,
                karyawan: "Psikolog",
                password: values.password,
                umur: "0",
            };
            var updates = {};
            updates['/tes/' + updateID] = postData;
            firebase.database().ref().update(updates);
        });
    }

    update_status();
</script>