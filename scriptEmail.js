function sendAppointmentEmail(valasz,nev,email,telefon,datum,idopont) {
      if (valasz == "Sikertelen foglalás!") {
        errorAlert(valasz + " Ellenőrizze az adatokat!");
      }
      else{
        Email.send({ 
          Host: "smtp.gmail.com", 
          Username: "olah.markoo@gmail.com", 
          Password: "fasxqdfadbrenedz", 
          To: email, 
          From: "olah.markoo@gmail.com", 
          Subject: "ArtCenter - Időpont foglalás", 
          Body: "<h2>Az időpont foglalás adatai:</h2> <br>" + 
          "Név: "+nev+"<br>" + 
          "Email: "+email+"<br>" + 
          "Telefonszám: "+telefon+"<br>" + 
          "Dátum: "+datum+ ", " + idopont + " <br>",
        }) 
          .then(function (message) { 
            successAlert(valasz);
          });
      }
}





function sendOrderEmail(orderId,nev,email,telefon,cim,fizetes,fizetendo,termekek) {

  Email.send({ 
    Host: "smtp.gmail.com", 
    Username: "olah.markoo@gmail.com", 
    Password: "fasxqdfadbrenedz", 
    To: email, 
    From: "olah.markoo@gmail.com", 
    Subject: "ArtCenter - Rendelés", 
    Body: "<h2>Az ön rendelésének adatai:</h2> <br>" + 
    "Rendelés száma: "+orderId+"<br>" + 
    "Név: "+nev+"<br>" + 
    "Email-cim: "+email+"<br>" + 
    "Telefonszám: "+telefon+" <br>" +
    "Cim: "+cim+"<br>" + 
    "Fizetési módszer: "+fizetes+"<br>" + 
    "Fizetendő összeg: "+fizetendo+" Ft<br>" + 
    "Rendelt termékek: <br><br>" +
    termekek + "<br><br>" +
    "Amennyiben az átutalásos vagy bankkártyás fizetést válaszotta, akkor a következő linket rendezheti: http://www.nemMukodoFizetesOldal.com. A rendelés leadását követő 24 órán belül nem kerül kifizetésre az összeg akkor rendelését töröljük.",
  }) 
    .then(function (message) { 
    });
}







function sendPasswordEmail(mail,pass) {
        if (pass == "Sikertelen email küldés!") {
          errorAlert("Nincs ilyen felhasználó!");
        }
        else{
          Email.send({ 
            Host: "smtp.gmail.com", 
            Username: "olah.markoo@gmail.com", 
            Password: "fasxqdfadbrenedz", 
            To: mail, 
            From: "olah.markoo@gmail.com", 
            Subject: "ArtCenter - jelszó emlékeztető", 
            Body: "Az ön jelszava: <h2>" + pass + "</h2>",
          }) 
            .then(function (message) { 
              successAlert("Emlékeztető elküldve!") 
            });
        }
}

function passwordToEmail() {
    let requestedEmail = document.getElementById("passwordEmailInput").value;
    let jelszo;
    var formData = new FormData();
    formData.append("function", "passwordToEmail");
    formData.append("requestedEmail",requestedEmail);
    fetch('db.php', {
        method: 'POST',
        body: formData,
        })
        .then(response => response.text())
        .then(request => {
            jelszo = request;
            sendPasswordEmail(requestedEmail,jelszo);
        })
        .catch(error => {
        console.error('Error:', error);
        });
}