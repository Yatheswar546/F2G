$('#logo').click(function () {

    var fullname = document.getElementById('fullname').value;

    var emails = document.getElementById('email').value;
    var passwords = document.getElementById('password').value;

    var phnnums = document.getElementById('phnnum').value;
    var adharnums = document.getElementById('adharnum').value;
    var volunteerID = document.getElementById('vid').value;

    var pincodes = document.getElementById('pincode').value;

    var regEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g;
    var regPhone = /^\d{10}$/;
    var regadhar = /^\d{12}$/;
    var regvid = /^\d{11}$/;
    var regName = /\d+$/g;
    var regpin = /^\d{6}$/;


    if (fullname == "" || regName.test(fullname)) {
        window.alert("Please enter your name properly.");


    }
    else if (emails == "" || !regEmail.test(emails)) {
        window.alert("Please enter a valid e-mail address.");


    }
    else if (passwords == "") {
        alert("Please enter your password");


    }

    else if (passwords.length < 6) {
        alert("Password should be atleast 6 character long");

    }
    else if (phnnums == "" || !regPhone.test(phnnums)) {
        alert("Please enter valid phone number.");

    }
    else if (adharnums == "" || !regadhar.test(adharnums)) {
        alert("Please enter valid adhaar number.");

    }
    else if (volunteerID == "" || !regavid.test(volunteerID)) {
        alert("Please enter valid adhaar number.");

    }

    else if (pincodes == "" || !regpin.test(pincodes)) {
        alert("Please enter valid adhaar number.");


    }
    else {
        alert("registered successfully")
    }


});