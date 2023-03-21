$(document).ready(function () {

    $("#login").click(function (e) {
        e.preventDefault();


        const email = $("#email").val();
        const password = $("#password").val();
        const _token = $("#_token").val();

        if (email == "" || password == "") {
            alert('Please fill the field')
        } else {
            $.ajax({
                url: '/admin/login/post',
                type: 'POST',
                data: { email, password, "_token": _token },
                success: (data) => {
                    if (data == 1) {
                        window.location.href = '/admin/dashboard'
                    } else {
                        alert("Invalid email and password");
                    }
                }
            })
        }
    });


    // create employee

    $("#create_emp").submit( function (e) {
        console.log(e)
        e.preventDefault();
        const formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '/admin/employee/crate',
            data: formData,
            dataType:'json',
            contentType: false,
            processData: false,
            success: (data) => {
                if(data.success==true){
                    alert(data.message)
                }else{
                    alert(data.message)
                }
            }
        })

    })
})