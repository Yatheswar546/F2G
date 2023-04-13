function myFunction() {
  alert('payment Successfull')
  
    
  }
  $('#logon').click(function () {

    var fullname = document.getElementById('fullname').value;

    var emails = document.getElementById('email').value;
    var passwords = document.getElementById('password').value;

    var phnnums = document.getElementById('phnnum').value;
    var adharnums = document.getElementById('adharnum').value;
    var bankaccnums = document.getElementById('bankaccnum').value;
    var ifscs = document.getElementById('ifsc').value;
    var address = document.getElementById('address').value;
    var city = document.getElementById('city').value;
    var nameoncard = document.getElementById('name on card').value;
    var creditcardno = document.getElementById('creditcardno').value;
    var expmonth = document.getElementById('expmonth').value;
    var cvv = document.getElementById('cvv').value;
    

    var pincodes = document.getElementById('pincode').value;
    var regEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g;
    var regPhone = /^\d{10}$/;
    var regadhar = /^\d{12}$/;
    var regabankacc = /^\d{11}$/;
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
    else if (bankaccnums == "" || !regabankacc.test(bankaccnums)) {
        alert("Please enter valid adhaar number.");

    }
    else if (ifscs == "" || !regabankacc.test(ifscs)) {
        alert("Please enter valid adhaar number.");


    }
    else if (address == "" || !regabankacc.test(address)) {
      alert("Please enter your address.");


  }
  else if (city == "" || !regabankacc.test(city)) {
    alert("Please enter city name.");



  }

  else if (nameoncard == "" || !regabankacc.test(nameoncard)) {
    alert("Please enter your name on card.");


}
else if (creditcardno== "" || !regabankacc.test(creditcardno)) {
  alert("Please enter your credit card number.");


}
else if (expmonth == "" || !regabankacc.test(expmonth)) {
  alert("Please enter expiry month on your card.");


}
else if (cvv == "" || !regabankacc.test(cvv)) {
  alert("Please enter cvv number.");


}
    else if (pincodes == "" || !regpin.test(pincodes)) {
        alert("Please enter valid adhaar number.");


    }
  
    else {
        alert("registered successfully")
    }


});