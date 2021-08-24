function orderSave() {
    let nev = document.getElementById("orderNameInput").value;
    let email = document.getElementById("orderEmailInput").value;
    let telefon = parseInt(document.getElementById("orderPhoneInput").value);
    let cim = document.getElementById("orderAdressInput").value;
    let fizetes = document.getElementById("orderSelect").value;
    let fizetendo = parseInt(document.getElementById("paySum").textContent);
    let datum = getFullDate();

    if ((nev != "" && email != "" && telefon != "" && cim != "" && fizetes != "")&&(validateEmail(email))) {
        if (fizetendo == 0) {
            alert("A bevásárló kosár üres!");
        }
        else{
            var formData = new FormData();
            formData.append("function", "orderSave");
            formData.append("nev",nev);
            formData.append("email",email);
            formData.append("telefon",telefon);
            formData.append("cim",cim);
            formData.append("fizetes",fizetes);
            formData.append("fizetendo",fizetendo);
            formData.append("datum",datum);
        
            fetch('db.php', {
                method: 'POST',
                body: formData,
                })
                .then(response => response.text())
                .then(request => {
                    if (request == "Sikeres rendelés!") {
                        successAlert(request);
                        variantsToOrder(nev,email,telefon,cim,fizetes,fizetendo,datum);
                    }
                    else{
                        errorAlert(request);
                    }
                })
                .catch(error => {
                console.error('Error:', error);
                });
        }
    }
    else{
        errorAlert("Töltsön ki minden adatot!");
    }
}


function variantsToOrder(nev,email,telefon,cim,fizetes,fizetendo,datum) {
    var formData = new FormData();

    let orderedProductsId = document.getElementsByClassName("orderHidden");

    for (let index = 0; index < orderedProductsId.length; index++) {
        formData.append("productsIds[]",orderedProductsId[index].id);
    }

    let orderedProductsDatas = document.getElementsByClassName("orderProductDatas");
    let productNames = new Array(orderedProductsDatas.length);

    for (let index = 0; index < orderedProductsDatas.length; index++) {
        formData.append("productsDatas[]",orderedProductsDatas[index].textContent);
        productNames.push(orderedProductsDatas[index].textContent.split(", ",1));
    }

    formData.append("function", "variantsToOrder");
    formData.append("email",email);
    formData.append("datum",datum);

    fetch('db.php', {
        method: 'POST',
        body: formData,
        })
        .then(response => response.text())
        .then(request => {
            if (request != "Sikertelen összefűzés!") {
                sendOrderEmail(request,nev,email,telefon,cim,fizetes,fizetendo,productNames);
            }
            else{
                console.log(request);
            }
        })
        .catch(error => {
        console.error('Error:', error);
        });
}




function getFullDate() {
    var today = new Date();
    var dd = today.getDate()+1;
    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear();
    var hh = today.getHours();
    var mimi = today.getMinutes();
    var ss = today.getSeconds();
    if(dd<10){
            dd='0'+dd;
        } 
    if(mm<10){
            mm='0'+mm;
        } 
    if(hh<10){
            hh='0'+hh;
        } 
    if(mimi<10){
            mimi='0'+mimi;
        }
    if(ss<10){
            ss='0'+ss;
        } 
    today = yyyy+'-'+mm+'-'+dd+' '+hh+':'+mimi+':'+ss;

    return today;
}