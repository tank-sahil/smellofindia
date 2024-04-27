function valide() {
    var mail = document.getElementById('email').value;
    var password = document.getElementById('pwd').value;
    var no = document.getElementById('mn').value;z

    // MAIL
    if (mail == "") {
        document.getElementById('email').style.borderColor = "red";
        document.getElementById('email').style.boxShadow = "0px 0px 6px 6px #ff000066";


    } else {

        var email_match = /^[a-zA-Z0-9]+@([a-zA-Z])+\.+[A-Za-z]+$/;
        var mail_test = email_match.test(mail);

        if (mail_test) {
            document.getElementById('email').style.borderColor = "black";
            document.getElementById('email').style.boxShadow = "none";

            var mail_pass = true;
        } else {
            document.getElementById('email').style.borderColor = "darkred";
            document.getElementById('email').style.boxShadow = "0px 0px 6px 6px darkred";
            var mail_pass = false;
        }
    }
    // PASSWORD

    if (password == "") {

        document.getElementById('pwd').style.borderColor = "red";
        document.getElementById('pwd').style.boxShadow = "0px 0px 6px 6px #ff000066";


    } else {
        var password_match = /^[a-zA-Z0-9./@!*&+-]{4,8}$/;
        var password_test = password_match.test(password);

        if (password_test) {
            document.getElementById('pwd').style.borderColor = "black";
            document.getElementById('pwd').style.boxShadow = "none";

            var pass_pass = true;
        } else {
            document.getElementById('pwd').style.borderColor = "darkred";
            document.getElementById('pwd').style.boxShadow = "0px 0px 6px 6px darkred";
            var pass_pass = false;
        }
    }

    //NUMBER

    if (no == "") {

        document.getElementById('mn').style.borderColor = "red";
        document.getElementById('mn').style.boxShadow = "0px 0px 6px 6px #ff000066";


    } else {
        var no_match = /^[0-9]{10}$/;
        var no_test = no_match.test(no);

        if (no_test) {
            document.getElementById('mn').style.borderColor = "black";
            document.getElementById('mn').style.boxShadow = "none";

            var no_pass = true;
        } else {
            document.getElementById('mn').style.borderColor = "darkred";
            document.getElementById('mn').style.boxShadow = "0px 0px 6px 6px darkred";
            var no_pass = false;
        }
    }



    if (mail_pass == true && pass_pass == true && no_pass) {
        return true;
    } else {
        return false;
    }
}
/*
--------------------------------------NEW FUNCTION ---------------------------
*/
// ***********************************REFGISTER*******************************


function valide1() {

    var mail = document.getElementById('email1').value;
    var password = document.getElementById('pwd1').value;
    var name = document.getElementById('name1').value;
    var cp = document.getElementById('cp').value;
   
    // ***********************************NAME*******************************

    if (name == "") {
        document.getElementById('name1').style.borderColor = "#ff000066";
        document.getElementById('name1').style.boxShadow = "0px 0px 6px 6px #ff000066";


    } else {
        var name_match = /^[a-zA-Z]{4,15}$/;
        var name_test = name_match.test(name);

        if (name_test) {
            document.getElementById('name1').style.borderColor = "black";
            document.getElementById('name1').style.boxShadow = "none";

            var name_pass = true;
        } else {
            document.getElementById('name1').style.borderColor = "darkred";
            document.getElementById('name1').style.boxShadow = "0px 0px 6px 6px darkred";
            var name_pass = false;
        }
    }

    // ***********************************REFGISTER*******************************

    if (mail == "") {
        document.getElementById('email1').style.borderColor = "#ff000066";
        document.getElementById('email1').style.boxShadow = "0px 0px 6px 6px #ff000066";


    } else {
        var email_match = /^[a-zA-Z0-9]+@([a-zA-Z])+\.+[A-Za-z]+$/;
        var mail_test = email_match.test(mail);

        if (mail_test) {
            document.getElementById('email1').style.borderColor = "black";
            document.getElementById('email1').style.boxShadow = "none";

            var mail_pass = true;
        } else {
            document.getElementById('email1').style.borderColor = "darkred";
            document.getElementById('email1').style.boxShadow = "0px 0px 6px 6px darkred";
            var mail_pass = false;
        }
    }
// ***********************************PASSWORD*******************************

    if (password == "") {

        document.getElementById('pwd1').style.borderColor = "red";
        document.getElementById('pwd1').style.boxShadow = "0px 0px 6px 6px #ff000066";


    } else {
        var password_match = /^[a-zA-Z0-9./@!*&+-]{4,8}$/;
        var password_test = password_match.test(password);

        if (password_test) {
            document.getElementById('pwd1').style.borderColor = "black";
            document.getElementById('pwd1').style.boxShadow = "none";

            var pass_pass = true;
        } else {
            document.getElementById('pwd1').style.borderColor = "darkred";
            document.getElementById('pwd1').style.boxShadow = "0px 0px 6px 6px darkred";
            var pass_pass = false;
        }
    }
    // ***********************************CONFIRM PASSWORD*******************************

    if (cp == "") {

        document.getElementById('cp').style.borderColor = "red";
        document.getElementById('cp').style.boxShadow = "0px 0px 6px 6px #ff000066";


    } else {

        if (cp == password) {
            document.getElementById('cp').style.borderColor = "black";
            document.getElementById('cp').style.boxShadow = "none";

            var cp_pass = true;
        } else {
            document.getElementById('cp').style.borderColor = "darkred";
            document.getElementById('cp').style.boxShadow = "0px 0px 6px 6px darkred";
            var cp_pass = false;
        }
    }


    if (mail_pass == true && pass_pass == true && name_pass == true && cp_pass == true) {
        return true;
    } else {
        return false;
    }
}