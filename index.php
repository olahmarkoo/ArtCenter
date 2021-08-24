<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="styleBasic.css">
    <link rel="stylesheet" type="text/css" href="styleHeader.css">
    <link rel="stylesheet" type="text/css" href="styleFonts.css">
    <link rel="stylesheet" type="text/css" href="styleFooter.css">
    <link rel="stylesheet" type="text/css" href="styleTeachers.css">
    <link rel="stylesheet" type="text/css" href="styleShop.css">
    <link rel="stylesheet" type="text/css" href="styleAppointment.css">
    <link rel="stylesheet" type="text/css" href="styleShopProduct.css">
    <link rel="stylesheet" type="text/css" href="styleProfile.css">
    <link rel="stylesheet" type="text/css" href="styleModal.css">
    <link rel="stylesheet" type="text/css" href="styleMobileMenu.css">
    <link rel="stylesheet" type="text/css" href="styleAlert.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <title>ArtCenter</title>
</head>
<body>

    <div class="alertBox success">
        <span class="fa fa-check"></span>
        <h1 id="successText">Siker!</h1>

        <a href="#" class="close button" id="succesAlert">Bezár</a>
    </div>
    <div class="alertBox error">
        <span class="fa fa-times"></span>
        <h1 id="errorText">Hiba!</h1>

        <a href="#" class="close button" id="errorAlert">Bezár</a>
    </div>

    <div class="container">

            <div class="section">
                <a name="chapter1"></a>

            <div id="header">
                <div id="mobileOptions">
                    <div id="home">
                        <i class="fa fa-home"></i>
                    </div>
                    <div class="mobileAction">
                        <div class="mobileProfile buttons" id="mobileMenuAction">
                            <i class="fa fa-bars"></i>
                        </div>
                        <div class="mobileMenu">
                                <h3>Oldalak</h3>
                            <ul>
                                <a href="#chapter1" id="mobileMenuOne"><li class="buttons"><p>Főoldal</p></li></a>
                                <a href="#chapter2" id="mobileMenuTwo"><li class="buttons"><p>Kurzus</p></li></a>
                                <a href="#chapter3" id="mobileMenuThree"><li class="buttons"><p>Oktatók</p></li></a>
                                <a href="#chapter4" id="mobileMenuFour"><li class="buttons"><p>Shop</p></li></a>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="menuBar">
                    <a href="#chapter1" class="menuLink">
                        <div class="menuButton buttons">
                            <span>Főoldal</span>
                        </div>
                    </a>
                    <a href="#chapter2" class="menuLink">
                        <div class="menuButton buttons">
                            <span>Terem</span>
                        </div>
                    </a>
                    <a href="#chapter3" class="menuLink">
                        <div class="menuButton buttons">
                            <span>Oktatók</span>
                        </div>
                    </a>
                    <a href="#chapter4" class="menuLink">
                        <div class="menuButton buttons">
                            <span>Shop</span>
                        </div>
                    </a>
                </div>

                <div id="options">
                    <div class="action">
                        <div class="shoppingCart buttons" id="orderToggleAction">
                            <div class="shopIcon">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            <div class="numberShop" id="numberShop">
                                0
                            </div>
                        </div>
                        <div class="profile buttons">
                                <img src="pics/profile.png" id="menuToggleAction">
                                <div class="hiddenProfile" id="modalToggleAction">

                                </div>
                        </div>
                        <div class="menu">
                                <h3 id="currentUser">Someone Famous</h3>
                            <ul>
                                <li id="dataModify" class="buttons"><i class="fa fa-user"></i><p>Profil adatok</p></li>
                                <li id="logOut" class="buttons"><i class="fa fa-sign-out"></i><p>Kijelentkezés</p></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contentBox">
                <div class="mainText">
                    <div class="title">
                        ArtCenter
                    </div>
                    <div class="companyDescription">
                            <h1>Mi az ArtCenter?</h1>
                            <p>Emlékszel milyen élmény volt gyerekként játszótérre menni,
                             ahol szabadon játszhattál és kreativkodhattál?</p>
                            <h3>Nem kell hogy ez a múlté legyen!</h3>
                            <p>A nagyok is megérdemlik a kikapcsolódást és közben akár még értéket is teremthetsz.
                            Nálunk egy hosszú nap után kiélheted a gyermeki fantáziádat és közben még tanulhatsz is
                            profi művészeinktől ha szeretnéd. Ha felkeltettük érdeklődésedet, akkor <span class="scrollText">görgess leljebb!</span> :)</p>
                    </div>
                </div>

                <div class="modalBox">
                    <div class="modalBack buttons" id="menuCloseAction">
                        <p id="modalProductBack"><i class="fa fa-arrow-left"></i></p>
                    </div>

                    <div class="loginModalBox">
                        <div class="otherModals">
                            <a class="otherModalLink">
                                <div class="otherModalButton buttons">
                                    <span class="linkText" id="otherPassword1">Elfelejtett Jelszó</span>
                                </div>
                            </a>
                            <a class="otherModalLink">
                                <div class="otherModalButton buttons">
                                    <span class="linkText" id="otherSignin1">Regisztráció</span>
                                </div>
                            </a>
                        </div>

                        <div class="modalText">
                            <span>Bejelentkezés</span>
                        </div>
                        <div class="modalInputs">
                            <div class="loginEmail">
                                <input type="email" name="loginEmailInput" placeholder="E-mail cim" id="loginEmailInput">
                            </div>
                            <div class="loginPass">
                                <input type="password" name="loginPasswordInput" placeholder="Jelszó" id="loginPasswordInput">
                            </div>
                            <div class="modalButton buttons" id="logIn">
                                <a href="#" class="modalSubmit" id="loginButton">Belép</a>
                            </div>
                        </div>
                    </div>






                    <div class="signinModalBox">
                        <div class="otherModals">
                            <a class="otherModalLink">
                                <div class="otherModalButton buttons" id="otherPassword2">
                                    <span class="linkText">Elfelejtett Jelszó</span>
                                </div>
                            </a>
                            <a class="otherModalLink">
                                <div class="otherModalButton buttons" id="otherLogin2">
                                    <span class="linkText">Bejelentkezés</span>
                                </div>
                            </a>
                        </div>

                        <div class="modalText">
                            <span>Regisztráció</span>
                        </div>
                        <div class="modalInputs">
                            <div class="signinEmail">
                                <input type="email" name="signinEmailInput" placeholder="E-mail cim (valós email cím szükséges)" id="signinEmailInput">
                            </div>
                            <div class="signinPass">
                                <input type="password" name="signinPasswordInput" placeholder="Jelszó (szám, nagybetű, 8 karakter)" id="signinPasswordInput">
                            </div>
                            <div class="signinPass">
                                <input type="password" name="signinPasswordAgaiInput" placeholder="Jelszó ismét" id="signinPasswordAgainInput">
                            </div>
                            <div class="signinName">
                                <input type="text" name="signinNameInput" placeholder="Teljes név" id="signinNameInput">
                            </div>
                            <div class="signinPhone">
                                <input type="text" name="signinPhoneInput" placeholder="06204592638" id="signinPhoneInput">
                            </div>
                            <div class="signinAdress">
                                <input type="text" name="signinAdressInput" placeholder="Szállitási cim" id="signinAdressInput">
                            </div>
                            <div class="lawThings">
                                <p class="lawThingsP">A regisztrációval elfogadom a <a href="Documents/ASZFminta.pdf" target="_blank">Felhasználási feltételeket</a> és az <a href="Documents/Adatvedelem.pdf" target="_blank">Adatvédelmi nyilatkozatot</a>.</p>
                            </div>
                            <div class="modalButton buttons" id="signIn">
                                <a href="#" class="modalSubmit" id="signinButton">Regisztrál</a>
                            </div>
                        </div>
                    </div>





                    <div class="passwordModalBox">
                        <div class="otherModals">
                            <a class="otherModalLink">
                                <div class="otherModalButton buttons" id="otherSignin2">
                                    <span class="linkText">Regisztráció</span>
                                </div>
                            </a>
                            <a class="otherModalLink">
                                <div class="otherModalButton buttons" id="otherLogin1">
                                    <span class="linkText">Bejelentkezés</span>
                                </div>
                            </a>
                        </div>

                        <div class="modalText">
                            <span>Emlékeztető</span>
                        </div>
                        <div class="modalInputs">
                            <div class="passwordEmail">
                                <input type="email" name="passwordEmailInput" placeholder="E-mail cim" id="passwordEmailInput">
                            </div>
                            <div class="modalButton buttons" id="passwordToEmail">
                                <a href="#" class="modalSubmit" id="passwordButton">Emlékeztető</a>
                            </div>
                        </div>
                    </div>





                </div>

                    <div class="orderModalBox">

                        <div class="orderModalBack buttons" id="orderMenuCloseAction">
                            <p id="orderModalProductBack"><i class="fa fa-arrow-left"></i></p>
                        </div>

                        <div class="modalText">
                            <span>Rendelés</span>
                        </div>

                        <div class="orderModalProducts" id="modalProducts">

                            <div class="orderProducts" id="orderProducts">

                            </div>

                        </div>

                            <div class="orderSum">
                                <p class="textSum">Végösszeg:</p>
                                <p class="paySum" id="paySum">0 Ft</p>
                            </div>
                        
                        <div class="modalInputs">
                            <div class="orderName">
                                <input type="text" name="orderNameInput" placeholder="Teljes név" id="orderNameInput">
                            </div>
                            <div class="orderEmail">
                                <input type="email" name="orderEmailInput" placeholder="E-mail cim" id="orderEmailInput">
                            </div>
                            <div class="orderPhone">
                                <input type="text" name="orderPhoneInput" placeholder="Telefonszám" id="orderPhoneInput">
                            </div>
                            <div class="orderAdress">
                                <input type="email" name="orderAdressInput" placeholder="Szállitási cim" id="orderAdressInput">
                            </div>
                            <div class="orderPay">
                                <select name="orderSelect" id="orderSelect">
                                    <option value="">--Kérlek válassz fizetési módszert--</option>
                                    <option value="szemelyes">Személyes átvétel</option>
                                    <option value="bankkartya">Bankkártyás fizetés</option>
                                    <option value="futar">Futárnál fizetés</option>
                                    <option value="utalas">Átutalás</option>
                                </select>
                            </div>
                            <div class="modalButton buttons" id="orderSave">
                                <a href="#" class="modalSubmit" id="orderButton">Rendelés</a>
                            </div>
                        </div>
                    </div>

                    <div class="dataModalBox">

                        <div class="dataModalBack buttons" id="dataMenuCloseAction">
                            <p id="dataModalProductBack"><i class="fa fa-arrow-left"></i></p>
                        </div>

                        <div class="modalText">
                            <span>Adatok</span>
                        </div>
                        <div class="modalInputs">
                            <div class="signinEmail">
                                <input type="email" name="dataEmailInput" placeholder="E-mail cim" id="dataEmailInput">
                            </div>
                            <div class="signinPass">
                                <input type="password" name="dataPasswordInput" placeholder="Jelszó" id="dataPasswordInput">
                            </div>
                            <div class="signinPass">
                                <input type="password" name="dataPasswordAgaiInput" placeholder="Jelszó ismét" id="dataPasswordAgainInput">
                            </div>
                            <div class="signinName">
                                <input type="text" name="dataNameInput" placeholder="Teljes név" id="dataNameInput">
                            </div>
                            <div class="signinPhone">
                                <input type="text" name="dataPhoneInput" placeholder="06204592638" id="dataPhoneInput">
                            </div>
                            <div class="signinAdress">
                                <input type="text" name="dataAdressInput" placeholder="Szállitási cim" id="dataAdressInput">
                            </div>
                            <div class="modalButton buttons" id="dataModifyButton">
                                <a href="#" class="modalSubmit" id="signinButton">Módosít</a>
                            </div>
                        </div>
                    </div>
            </div>
            <a name="chapter2"></a>
        </div>








        <div class="section" id="appointmentSection">
        <div class="bluredBackGround"></div>
        <div class="appointmentContainer">
        <div class="appointmentFormContainer">

            <div class="appointmentHeader">
                <h2 class="appointmentHeaderTitle">Időpont foglalás</h2>
                <p class="appointmentHeaderSubTitle">Foglalj hozzánk időpontot kreativ termünkbe az alábbi űrlapon</p>
            </div>

            <form class="appointmentForm">
                <div class="inputContainer appointFormName">
                    <i class="fa fa-user icon"></i>
                    <input class="inputField" type="text" placeholder="Teljes név" name="appointName" id="appointName">
                  </div>
                
                <div class="appointFormSecond">
                    <div class="inputContainer">
                        <input class="inputField" type="text" placeholder="Email" name="appointEmail" id="appointEmail">
                        <i class="fa fa-envelope icon"></i>
                    </div>
                          
                    <div class="inputContainer">
                        <i class="fa fa-phone icon"></i>
                        <input class="inputField" type="text" placeholder="Telefon szám" name="appointPhone" id="appointPhone">
                    </div>

                    <div class="inputContainer">
                        <input type="date" value="" min='' name="appointDate" id="appointDate">
                    </div>
    
                    <div class="inputContainer">
                        <i class="fa fa-book icon"></i>
                        <select name="appointSelect" id="appointSelect">
                            <option value="">--Kérlek válassz időpontot--</option>
                            <option value="9:00-12:00">9:00-12:00</option>
                            <option value="12:00-15:00">12:00-15:00</option>
                            <option value="15:00-18:00">15:00-18:00</option>
                            <option value="18:00-21:00">18:00-21:00</option>
                        </select>
                    </div>
                </div>

                  <div class="appointFormThird">
                      <div class="inputContainer appointButton buttons" id="appointButton">
                        <a href="#" class='appointSubmit'>Foglalás</a>
                      </div>
                  </div>

            </form>
        </div>
        <div class="appointmentAlternativesContainer">
            <div class="alternatives">
                <p class="appointmentHeaderSubTitle">Vagy jelentkezz következő elérhetőségeink egyikén</p>
            </div>
            <div class="alternatives">
                <p>1324 Budapest Setőfi Pándor utca 42. 3. em 7. ajtó</p>
            </div>
            <div class="alternatives">
                <p>06-90/432-5362</p>
            </div>
            <div class="alternatives">
                <p>kamuEmail@kamu.com</p>
            </div>
        </div>
    </div>
    <a name="chapter3"></a>
        </div>
        










        <div class="section" id="teacherSection">
        <div class="teacherContainer">
                <div class="teacherBox">
                    <div class="teacherImgBox">
                        <img src="pics/tchr1.jpg">
                            <div class="teacherTextBox">
                                <h2 class="teacherName">András - Grafikus</h2>
                                    <div class="teacherDescription">
                                            
                                            <p class="teacherText">
                                                "Szenvedélyem a grafika, és hiszem hogy mindenkiben ott a művész!"
                                            </p>
                                    </div>
                            </div>
                    </div>
                </div>
                <div class="teacherBox">
                    <div class="teacherImgBox">
                        <img src="pics/tchr2.jpg">
                            <div class="teacherTextBox">
                                <h2 class="teacherName">Márk - Festő</h2>
                                    <div class="teacherDescription">
                                            
                                            <p class="teacherText">
                                                "Művészet úgy ahogy a régi mesterek csinálták."
                                            </p>
                                    </div>
                            </div>
                    </div>
                </div>
                <div class="teacherBox">
                    <div class="teacherImgBox">
                        <img src="pics/tchr3.jpg">
                            <div class="teacherTextBox">
                                <h2 class="teacherName">János - Animátor</h2>
                                    <div class="teacherDescription">
                                            
                                            <p class="teacherText">
                                                "Keltsd életre a képzeletet."
                                            </p>
                                    </div>
                            </div>
                    </div>
                </div>
                <div class="teacherBox">
                    <div class="teacherImgBox">
                        <img src="pics/tchr4.jpg">
                            <div class="teacherTextBox">
                                <h2 class="teacherName">Eszter - Fotós</h2>
                                    <div class="teacherDescription">
                                            
                                            <p class="teacherText">
                                                "Az élet maga a művészet. Csak meg kell látni."
                                            </p>
                                    </div>
                            </div>
                    </div>
                </div>
            </div>
            <a name="chapter4"></a>
        </div>








        <div class="section containerShop">
        <div class="bluredBackGroundProduct" id="bluredBackGround"></div>
            <div id="theProduct">
                <input type="hidden" id="productId">
                <p id="productBack" class="buttons"><i class="fa fa-arrow-left"></i></p>
                    <div class="theProductImg" id="productImg"></div>
                    <div class="theProductDetails">
                        <div class="theProductSettings">

                            <div class="theProductName" id="productName">Név</div>

                            <div class="theProductRadios" id="theProductRadiosSize">
                            <p>Méret:</p>
                                <div class="theProductRadio buttons">
                                    10x20
                                    <input type="radio" name="radioSize" class="sizePrice" value="10x20" id="1.00" checked>
                                </div>                                   
                                <div class="theProductRadio buttons">
                                    20x30
                                    <input type="radio" name="radioSize" class="sizePrice" value="20x30" id="1.2">
                                </div>                                  
                                <div class="theProductRadio buttons">
                                    30x40
                                    <input type="radio" name="radioSize" class="sizePrice" value="30x40" id="1.4">
                                </div>
                            </div>

                            <div class="theProductRadios" id="theProductRadiosMaterial">
                            <p>Anyag:</p>
                                <div class="theProductRadio buttons">
                                    Papir
                                    <input type="radio" name="radioMaterial" class="materialPrice" value="Papir" id="1.0" checked>
                                </div>
                                    
                                <div class="theProductRadio buttons">
                                    Vászon
                                    <input type="radio" name="radioMaterial" class="materialPrice" value="Vászon" id="1.3">
                                </div>                                    
                            </div>

                            <div class="theProductPrice" id="productPrice"></div>

                        </div>
                        <div class="theProductDescription" id="productDescription"></div>
                        <div class="theProductButton buttons">
                            <a href="#" class="buyButton" id="buyButton">Kosárba</a>
                        </div>
                    </div>
            </div>

        <div class="containerSort" id="sorting">
            <label for="sortRadioOsszes" class="sort buttons" id="osszesButton">Összes</label>
            <input type="radio" name="sortRadio" id="Összes" checked="checked">
            <label for="sortRadioPortre" class="sort buttons" id="portreButton">Portré</label>
            <input type="radio" name="sortRadio" id="Portré">
            <label for="sortRadioTajkep" class="sort buttons" id="tajkepButton">Tájkép</label>
            <input type="radio" name="sortRadio" id="Tájkép">
            <label for="sortRadioAchitecture" class="sort buttons" id="architektúraButton">Architektúra</label>
            <input type="radio" name="sortRadio" id="Architektúra">

            <div class="sortSelectBox">
            <label for="sortSelect"><i class="fa fa-sort"></i>Rendezés:</label>
            <select id="sortSelect">
                <option value="abc">ABC sorrend</option>
                <option value="asc">Ár szerint, Növekvő</option>
                <option value="desc">Ár szerint, Csökkenő</option>
            </select>
            </div>
        </div>
        <div class="containerProduct" id="shopProducts">
    
        </div>
    </div>









        <div class="section">
            <div id="footer">
                <div id="footerHead" class="footers">
                    <p>Alkossunk együtt!</p>
                </div>
                <div id="footerButton" class="footers buttons">
                    <p>kamu.email@mail.hu</p>
                </div>
                <div id="footerQuote" class="footers">
                    <p>"A művészet nem meghódolás, hanem hódítás."<br> - A. Malraux</p>
                </div>
                <div class="footers social-menu">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></i></a></li>
                    </ul>
                </div>
                <div id="footerAddress" class="footers">
                    <p>Magyarország, 1132 Budapest Setőfi Pándor u. 302 </p>
                </div>
            </div>
        </div>
    </div>

    <script src="myScript.js"></script>
    <script src="scriptShop.js"></script>
    <script src="scriptInteraction.js"></script>
    <script src="scriptAppointment.js"></script>
    <script src="scriptOrder.js"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script> 
    <script src="scriptEmail.js"></script>
    <script src="scriptVariants.js"></script>
    <script src="scriptStart.js"></script>
</body>
</html>