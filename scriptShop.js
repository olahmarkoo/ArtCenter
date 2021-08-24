function priceChanges() {
    let sizes = document.getElementsByClassName("sizePrice");
    let materials = document.getElementsByClassName("materialPrice");
    let priceFinal = 1.0;
    let priceTemp = 1.0;

    for (let index = 0; index < sizes.length; index++) {
        const element = sizes[index];
        if (element.checked) {
            priceTemp = Math.round(basicPrice * parseFloat(element.id));
        }
    }
    for (let index = 0; index < materials.length; index++) {
        const element = materials[index];
        if (element.checked) {
            priceFinal = Math.round(priceTemp * parseFloat(element.id));
        }
    }
    document.getElementById("productPrice").innerHTML = "Ár: " + priceFinal + " Ft";
}




function backToShop() {
    document.getElementById("theProduct").style.visibility ="hidden";
    document.getElementById("bluredBackGround").style.display = "none";
    document.getElementById("1.00").checked = true;
    document.getElementById("1.0").checked = true;
}
function openProduct(id) {
    document.getElementById("1.00").checked = true;
    document.getElementById("1.0").checked = true;
    shopProduct(id);
    document.getElementById("theProduct").style.visibility ="visible";
    document.getElementById("bluredBackGround").style.display = "block";
}



function osszesCheck() {
    document.getElementById("Összes").checked = true;
}
function tajkepCheck() {
    document.getElementById("Tájkép").checked = true;
}
function portreCheck() {
    document.getElementById("Portré").checked = true;
}
function architekturaCheck() {
    document.getElementById("Architektúra").checked = true;
}

function sorting() {
    if (document.getElementById("Összes").checked) {
        shopProducts("Összes",document.getElementById("sortSelect").value);
    }
    if (document.getElementById("Tájkép").checked) {
        shopProducts("Tájkép",document.getElementById("sortSelect").value);
    }
    if (document.getElementById("Portré").checked) {
        shopProducts("Portré",document.getElementById("sortSelect").value);
    }
    if (document.getElementById("Architektúra").checked) {
        shopProducts("Architektúra",document.getElementById("sortSelect").value);
    }
}



function shopProduct(id) {
    let adat;
    var formData = new FormData();
    formData.append("function", "product");
    formData.append("id",id);
    fetch('db.php', {
        method: 'POST',
        body: formData,
        })
        .then(response => response.text())
        .then(request => {
            console.log(request);
            adat = JSON.parse(request);
            shopProductWrite(adat);
        })
        .catch(error => {
        console.error('Error:', error);
        });
}

function shopProductWrite(data) {
    document.getElementById("productId").innerHTML =""+data[0].id+"";
    document.getElementById("productImg").innerHTML ="<img class='productImg' src=pics/"+data[0].fajl+">";
    document.getElementById("productName").innerHTML =""+data[0].nev+"";
    basicPrice = data[0].ar;
    document.getElementById("productPrice").innerHTML ="Ár: "+data[0].ar+" Ft";
    document.getElementById("productDescription").innerHTML =""+data[0].leiras+"";
}



function shopProducts(sort,order) {
    let adat;
    var formData = new FormData();
    formData.append("function", "products");
    formData.append("order",order);
    fetch('db.php', {
        method: 'POST',
        body: formData,
        })
        .then(response => response.text())
        .then(request => {
            console.log(request);
            adat = JSON.parse(request);
            shopProductsWrite(adat,sort);
            if (!variantsCreated) {
                variantsDelete();
                createVariants(adat);
                variantsCreated = true;
            }
        })
        .catch(error => {
        console.error('Error:', error);
        });
}
function shopProductsWrite(data,sort) {
    let html_kod='';
    for (let index = 0; index < data.length; index++) {
        if (sort=="Tájkép") { 
            if (data[index].tipus == sort) {
                html_kod+='<div class="box">'
                +'<div class="slide-img">'
                +'<img src="pics/'+data[index].fajl+'">'
                +'<div class="overlay">'
                +'<a href="#" class="buy-btn" onclick="openProduct('+data[index].id+')">Részletek</a>'
                +'</div>'
                +'</div>'
                +'<div class="detail-box">'
                +'<div class="type">'
                +'<a href="#">'+data[index].tipus+'</a>'
                +'</div>'
                +'<a href="#" class="price">'+data[index].ar+' Ft</a>'
                +'</div>'
                +'</div>';
            }
        }
        else if (sort=="Portré") {
            if (data[index].tipus == sort) {
                html_kod+='<div class="box">'
                +'<div class="slide-img">'
                +'<img src="pics/'+data[index].fajl+'">'
                +'<div class="overlay">'
                +'<a href="#" class="buy-btn" onclick="openProduct('+data[index].id+')">Részletek</a>'
                +'</div>'
                +'</div>'
                +'<div class="detail-box">'
                +'<div class="type">'
                +'<a href="#">'+data[index].tipus+'</a>'
                +'</div>'
                +'<a href="#" class="price">'+data[index].ar+' Ft</a>'
                +'</div>'
                +'</div>';
            }    
        }
        else if (sort=="Architektúra") {
            if (data[index].tipus == sort) {
                html_kod+='<div class="box">'
                +'<div class="slide-img">'
                +'<img src="pics/'+data[index].fajl+'">'
                +'<div class="overlay">'
                +'<a href="#" class="buy-btn" onclick="openProduct('+data[index].id+')">Részletek</a>'
                +'</div>'
                +'</div>'
                +'<div class="detail-box">'
                +'<div class="type">'
                +'<a href="#">'+data[index].tipus+'</a>'
                +'</div>'
                +'<a href="#" class="price">'+data[index].ar+' Ft</a>'
                +'</div>'
                +'</div>';
            }
        }
        else if (sort=="Összes") {
            html_kod+='<div class="box" >'
            +'<div class="slide-img">'
            +'<img src="pics/'+data[index].fajl+'">'
            +'<div class="overlay">'
            +'<div class="buy-btn" onclick="openProduct('+data[index].id+')">Részletek</div>'
            +'</div>'
            +'</div>'
            +'<div class="detail-box">'
            +'<div class="type">'
            +'<a href="#">'+data[index].tipus+'</a>'
            +'</div>'
            +'<a href="#" class="price">'+data[index].ar+' Ft</a>'
            +'</div>'
            +'</div>';
        }
    }
    console.log(html_kod);
    document.getElementById("shopProducts").innerHTML=html_kod;
}



function addProductToOrder() {
    let current = parseInt(document.getElementById("numberShop").textContent);
    current++;
    document.getElementById("numberShop").innerHTML = current;
    if (current != 0) {
        document.getElementById("numberShop").style.display = "flex";
    }


    currentProductPics = document.querySelector(".productImg").src;
    currentProductNumber++;
    currentProductName = document.getElementById("productName").textContent;
    currentProductId = document.getElementById("productId").textContent;
    let radios1 = document.getElementsByClassName("sizePrice");
    for (let index = 0; index < radios1.length; index++) {
        const element = radios1[index];
       if (element.checked) {
           currentProductSize = element.value;
       } 
    }
    let radios2 = document.getElementsByClassName("materialPrice");
    for (let index = 0; index < radios2.length; index++) {
        const element = radios2[index];
       if (element.checked) {
           currentProductMaterial = element.value;
       } 
    }
    let priceString = document.getElementById("productPrice");
    currentProductPrice = priceString.textContent.split(" ")[1];
    currentPriceSum = parseInt(currentProductPrice);



    let contentHTML = "";

    contentHTML += '<div class="orderProduct" id="order'+currentProductNumber+'">'
    +'<div class="orderProductPics">'
        +'<img src="'+currentProductPics+'">'
        +'<hidden class="orderHidden" id="'+currentProductId+'">'
    +'</div>'
    +'<div class="orderProductName">'
        +'<p class="orderProductDatas">'+currentProductName+', '+currentProductSize+', '+currentProductMaterial+'</p>'
    +'</div>'
    +'<div class="orderProductPrice">'
        +'<p id="orderProductPrice'+currentProductNumber+'">'+currentProductPrice+' ft</p>'
    +'</div>'
    +'<div class="orderProductDelete buttons" onclick="deleteOrder(event);" id="'+currentProductNumber+'">'
        +'<i class="fa fa-trash"></i>'
    +'</div>'
    +'</div>';

    document.querySelector(".paySum").innerHTML = (parseInt(document.querySelector(".paySum").textContent) + currentPriceSum) + " Ft";
    document.getElementById("orderProducts").innerHTML += contentHTML;
    successAlert("Termék kosárhoz adva!");
}

function deleteOrder(e) {
    let currentAmount = parseInt(document.getElementById("numberShop").textContent);
    if (currentAmount != 0) {
        currentAmount--;
    }
    if (currentAmount == 0) {
        document.getElementById("numberShop").style.display = "none";
    }
    document.getElementById("numberShop").innerHTML = currentAmount;

    let currentPrice = parseInt(document.getElementById("orderProductPrice"+e.currentTarget.id+"").textContent);
    document.querySelector(".paySum").innerHTML = (parseInt(document.querySelector(".paySum").textContent) - currentPrice) + " Ft";

    document.getElementById("order"+e.currentTarget.id+"").remove();
}