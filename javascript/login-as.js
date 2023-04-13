$('#logon').click(function () {
    var uid = document.getElementById("usrid").value;
    var uname = document.getElementById("email").value;
    var pwd = document.getElementById("pwd1").value;
    var log = document.getElementById("logon").value;
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (uid == '') {
        alert("please enter user name.");
    }
    if (uid.length < 11) {
        alert("please enter valid user ID.");
    }
    else if (uname == '') {
        alert("please enter user name.");
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
    else if (value == 'LOGIN') {
        alert("successfull");

    }
});
