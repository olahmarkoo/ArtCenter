function successAlert(text) {
    const alertSuccess = document.querySelector('.success');
    document.getElementById("successText").innerHTML = text;
    alertSuccess.style.display = "block";
}
function errorAlert(text) {
    const alertError = document.querySelector('.error');
    document.getElementById("errorText").innerHTML = text;
    alertError.style.display = "block";
}
function closeAlert() {
    const alertSuccess = document.querySelector('.success');
    const alertError = document.querySelector('.error');
    alertSuccess.style.display = "none";
    alertError.style.display = "none";
}









function mobileMenuToggle() {
    const toggleMenu = document.querySelector('.mobileMenu');
    toggleMenu.classList.toggle('active');
}
function mobileMenuClose() {
    const toggleMenu = document.querySelector('.mobileMenu');
    toggleMenu.classList.toggle('active');
}


function menuToggle() {
    const toggleMenu = document.querySelector('.menu');
    toggleMenu.classList.toggle('active');
}


function modalToggle() {
    const modal = document.querySelector('.modalBox');
    modal.classList.toggle('active');
}
function menuClose() {
    const modal = document.querySelector('.modalBox');
    modal.classList.toggle('active');
}


function orderToggle() {
    const modal = document.querySelector('.orderModalBox');
    modal.classList.toggle('active');
}
function orderMenuClose() {
    const modal = document.querySelector('.orderModalBox');
    modal.classList.toggle('active');
}


function openLogin() {
    const signModal = document.querySelector('.signinModalBox');
    const logModal = document.querySelector('.loginModalBox');
    const passModal = document.querySelector('.passwordModalBox');
    logModal.style.display ="flex";
    passModal.style.display ="none";
    signModal.style.display ="none";
}
function openSignin() {
    const signModal = document.querySelector('.signinModalBox');
    const logModal = document.querySelector('.loginModalBox');
    const passModal = document.querySelector('.passwordModalBox');
    logModal.style.display ="none";
    passModal.style.display ="none";
    signModal.style.display ="flex";
}
function openPassword() {
    const signModal = document.querySelector('.signinModalBox');
    const logModal = document.querySelector('.loginModalBox');
    const passModal = document.querySelector('.passwordModalBox');
    logModal.style.display ="none";
    passModal.style.display ="flex";
    signModal.style.display ="none";
}


function openDataModify() {
    const modal = document.querySelector('.dataModalBox');
    modal.classList.toggle('active');
}
function dataMenuClose() {
    const modal = document.querySelector('.dataModalBox');
    modal.classList.toggle('active');
}







function logIn() {
    let email = document.getElementById("loginEmailInput").value;
    let pass = document.getElementById("loginPasswordInput").value;
    if (email != "" && pass != "") {
        let adat;
        var formData = new FormData();
        formData.append("function", "login");
        formData.append("email",email);
        formData.append("pass",pass);
        fetch('db.php', {
            method: 'POST',
            body: formData,
            })
            .then(response => response.text())
            .then(request => {
                if (request == "Nincs ilyen felhasználó!") {
                    errorAlert(request);
                }
                else{
                    adat = JSON.parse(request);
                    logInChanges(adat);
                }
            })
            .catch(error => {
            console.error('Error:', error);
            });
    }
    else{
        errorAlert("Hibás bemenet!");
    }
}

function logInChanges(data) {
    document.querySelector('.hiddenProfile').style.visibility = "hidden";
    modalToggle();

    userId = data[0].id;
    userEmail = data[0].email;
    userPassword = data[0].jelszo;
    userName = data[0].nev;
    userPhone = data[0].telefon;
    userAdress = data[0].cim;

    document.getElementById("currentUser").innerHTML = userName;

    document.getElementById("appointName").value = data[0].nev;
    document.getElementById("appointEmail").value = data[0].email;
    document.getElementById("appointPhone").value = data[0].telefon;

    document.getElementById("orderNameInput").value = data[0].nev;
    document.getElementById("orderEmailInput").value = data[0].email;
    document.getElementById("orderPhoneInput").value = data[0].telefon;
    document.getElementById("orderAdressInput").value = data[0].cim;

    document.getElementById("dataEmailInput").value = data[0].email;
    document.getElementById("dataPasswordInput").value = data[0].jelszo;
    document.getElementById("dataPasswordAgainInput").value = data[0].jelszo;
    document.getElementById("dataNameInput").value = data[0].nev;
    document.getElementById("dataPhoneInput").value = data[0].telefon;
    document.getElementById("dataAdressInput").value = data[0].cim;

    successAlert("Sikeres Belépés");
}




function validateEmail(mail) 
{
    let reg = /^[0-9a-z\.-]+@([0-9a-z-]+\.)+[a-z]{2,4}$/i;
    return reg.test(mail);
}

function validatePassword(pass) 
{
    let reg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/g;
    return reg.test(pass);
}

function signIn() {
    let email = document.getElementById("signinEmailInput").value;
    let pass1 = document.getElementById("signinPasswordInput").value;
    let pass2 = document.getElementById("signinPasswordAgainInput").value;
    let name = document.getElementById("signinNameInput").value;
    let phone = document.getElementById("signinPhoneInput").value;
    let adress = document.getElementById("signinAdressInput").value;

    let validEmail = validateEmail(email);
    let validPass = validatePassword(pass1);
    if ((email != "" && pass1 != "" && pass2 != "" && name != "" && phone != "" && adress != "")&&(pass1 == pass2)&&validEmail&&validPass) {
        let adat;
        var formData = new FormData();
        formData.append("function", "signin");
        formData.append("email",email);
        formData.append("pass1",pass1);
        formData.append("name",name);
        formData.append("phone",phone);
        formData.append("adress",adress);
        fetch('db.php', {
            method: 'POST',
            body: formData,
            })
            .then(response => response.text())
            .then(request => {
                if (request == "Sikeres regisztáció!") {
                    successAlert(request);
                }
                else{
                    errorAlert(request);
                }
            })
            .catch(error => {
            console.error('Error:', error);
            });
    }
    else{
        let error = "";
        if (email != "" && !validEmail) {
            error+="Hibás email! ";
        }
        if (pass1 != "" && pass2 != "" && !validPass) {
            error+="Hibás jelszó! ";
        }
        if (pass1 != "" && pass2 != "" && pass1 != pass2) {
            error+="Jelszavak nem egyeznek! ";
        }
        if (error == "") {
            errorAlert("Töltsön ki minden mezőt!")
        }
        else{
            errorAlert(error);
        }
    }
}




function dataModify() {
    let idMod = userId;
    let emailMod = document.getElementById("dataEmailInput").value;
    let pass1Mod = document.getElementById("dataPasswordInput").value;
    let pass2Mod = document.getElementById("dataPasswordAgainInput").value;
    let nameMod = document.getElementById("dataNameInput").value;
    let phoneMod = document.getElementById("dataPhoneInput").value;
    let adressMod = document.getElementById("dataAdressInput").value;

    let validEmail = validateEmail(emailMod);
    let validPass = validatePassword(pass1Mod);

    if ((emailMod != "" && pass1Mod != "" && pass2Mod != "" && nameMod != "" && phoneMod != "" && adressMod != "")&&(pass1Mod == pass2Mod)&&(validateEmail(emailMod)&&(validatePassword(pass1Mod)))) {
        let adat;
        var formData = new FormData();
        formData.append("function", "dataModify");
        formData.append("idMod", idMod);
        formData.append("emailMod",emailMod);
        formData.append("pass1Mod",pass1Mod);
        formData.append("nameMod",nameMod);
        formData.append("phoneMod",phoneMod);
        formData.append("adressMod",adressMod);
        fetch('db.php', {
            method: 'POST',
            body: formData,
            })
            .then(response => response.text())
            .then(request => {
                if (request == "Sikeres módosítás!") {
                    userId = idMod;
                    userEmail = emailMod;
                    userPassword = pass1Mod;
                    userName = nameMod;
                    userPhone = phoneMod;
                    userAdress = adressMod;
                    successAlert(request);
                }
                else{
                    errorAlert(request);
                }
            })
            .catch(error => {
            console.error('Error:', error);
            });
    }
    else{
        let error = "";
        if (emailMod != "" && !validEmail) {
            error+="Hibás email! ";
        }
        if (pass1Mod != "" && pass2Mod != "" && !validPass) {
            error+="Hibás jelszó! ";
        }
        if (pass1Mod != "" && pass2Mod != "" && pass1Mod != pass2Mod) {
            error+="Jelszavak nem egyeznek! ";
        }
        if (error == "") {
            errorAlert("Töltsön ki minden mezőt!")
        }
        else{
            errorAlert(error);
        }
    }
}




function logOut() {
    menuToggle();
    document.querySelector('.hiddenProfile').style.visibility = "visible";

    document.getElementById("appointName").value = "";
    document.getElementById("appointEmail").value = "";
    document.getElementById("appointPhone").value = "";

    document.getElementById("orderNameInput").value = "";
    document.getElementById("orderEmailInput").value = "";
    document.getElementById("orderPhoneInput").value = "";
    document.getElementById("orderAdressInput").value = "";

    document.getElementById("dataEmailInput").value = "";
    document.getElementById("dataPasswordInput").value = "";
    document.getElementById("dataPasswordAgainInput").value = "";
    document.getElementById("dataNameInput").value = "";
    document.getElementById("dataPhoneInput").value = "";
    document.getElementById("dataAdressInput").value = "";

    document.getElementById("loginEmailInput").value = "";
    document.getElementById("loginPasswordInput").value = "";
}
