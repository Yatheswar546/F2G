$('#logon').click(function () {
    var uid = document.getElementById("usrid").value;

    var pwd = document.getElementById("pwd1").value;
    var phnnums = document.getElementById('phnnum').value;
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var regPhone = /^\d{10}$/;
    if (uid == '') {
        alert("please enter user name.");
    }
    if (uid.length < 12) {
        alert("please enter valid user ID.");
    }
    else if (phnnums == "" || !regPhone.test(phnnums)) {
        alert("Please enter valid phone number.");

    }
    else if (pwd == '') {
        alert("enter the password");
    }
    else if (!filter.test(uname)) {
        alert("Enter valid email id.");
    }
    else if (pwd.length < 6) {
        alert("Password min length is 6.");
    }
    else {
        alert('Thank You for Login ');
    }
});
