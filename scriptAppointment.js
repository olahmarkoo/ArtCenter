function dateToday() {
var today = new Date();
var dd = today.getDate()+1;
var mm = today.getMonth()+1;
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("appointDate").setAttribute("min", today);
document.getElementById("appointDate").setAttribute("value", today);
}



function insertAppointment() {
    var formData = new FormData();

    let nev = document.getElementById("appointName").value;
    let email = document.getElementById("appointEmail").value;
    let telefon = document.getElementById("appointPhone").value;
    let datum = document.getElementById("appointDate").value;
    let idopont = document.getElementById("appointSelect").value;

    if ((nev != "" && email != "" && telefon != "" && datum != "" && idopont != "")&&(validateEmail(email))) {
        formData.append("function", "insertAppointment");
        formData.append("nev",nev);
        formData.append("email",email);
        formData.append("telefon",telefon);
        formData.append("datum",datum);
        formData.append("idopont",idopont);
        fetch('db.php', {
            method: 'POST',
            body: formData,
            })
            .then(response => response.text())
            .then(request => {
                sendAppointmentEmail(request,nev,email,telefon,datum,idopont);
            })
            .catch(error => {
            console.error('Error:', error);
            });
    }
    else{
        errorAlert("Hiányzó, hibás adatok!");
    }
}