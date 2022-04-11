
// Variables des fonctions de test et d'ajout :
const imgOK = '<img class="img-fluid" src="img/ok.png alt="OK">';
const imgNOK = '<img class="img-fluid" src="img/nok.png alt="NOK">';
const regexEmail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const regexpasswd = /^(?=.*?[a-zA-Z])(?=.*?[\d])(?=.*?[²³&|é@"#'(§^è!ç{\-_à})°¨\[\]$*ù%µ£`´=+~:\/;.,?<>\\]).{8,}$/;
const regexnom = /^(\w{3,})/;

// initialisation des messages d'erreurs de chaque champ vérifié
let errorEmail = "Vous devez entrer un email correct.";
let errorEmailVerif ="Vous n'avez pas rempli correctement la vérification de l'email.";
let errorPasswd = "Vous devez entrer un mot de passe correct.";
let errorPasswdVerif = "Vous n'avez pas rempli correctement la vérification du mot de passe.";
let errorNom = "Vous devez remplir votre nom.";
let errorPrenom = "Vous devez remplir votre prénom.";
let errorAddress = "Vous devez remplir votre adresse.";
let errorLocalite = "Vous devez sélectionner votre localité.";
let errorCondition = "Vous devez accepter les conditions générales.";

//==============================================



// Récupération du dictionnaire http://fe.digitalinit.net/data/city.json
$.getJSON("./localites.json", function( data ){
//génération de la liste à partir du dictionnaire
    const city = data.localites;
    let cityid = "";
    let citycp = "";
    let cityville = "";
    let toadd = "";

    for(x in city){
        cityid = city[x].ID_VILLE;
        citycp = city[x].CPOST;
        cityville = city[x].VILLE;
        toadd = citycp + " - " + cityville;

// ajout des options 
        $("#inputlocalite").append('<option value="'+idcity+'">'+ toadd +'</option>');
    }
});
// ======================================================================

// fonction de test de modification:
/**
 * ClearChild : supprime tous les éléments enfant d'une balise
 * @param {String} IDelem : id d'une balise
 */
function clearChild(IDelem){
    const testdiv = document.getElementById(IDelem);
    while (testdiv.lastElementChild) {
        testdiv.removeChild(testdiv.lastElementChild);
    }
};
/**
 * Vérification de l'existence d'un id si il existe, execute clearChild(IDelem)
 * @param {String} IDelem : id d'une balise
 */
function isIDexist(IDelem){
    if($("#" + IDelem).length != 0) {
        clearChild(IDelem);
        return true;
    }
    else {
        console.log( IDelem +" does not exist.");
        return false;
    }
}

/**
 * Ajout d'un span si IDelem existe
 * @param {String} IDelem : id d'une balise 
 * @param {String} state : valeur ok ou nok
 */
function addSpan(IDelem, state){
    if(isIDexist(IDelem)){
        if(state == "ok"){
            $("#"+ IDelem).append('<span id="'+IDelem+'_'+state+'"> <img class="img-fluid" src="img/ok.png" alt="OK"> </span>');
        } else if (state == "nok"){
            $("#"+ IDelem).append('<span id="'+IDelem+'_'+state+'"> <img class="img-fluid" src="img/nok.png" alt="NOK"> </span>');
        }else {
            console.log("function addSpan only accept 'ok' or 'nok'.")
        } 
    }
};

// ======================================================================

//1. verification de l'email et de la confirmation de l'email :

// variables :
const checkEmail = document.getElementById("inputEmail") ;
const checkEmailVerif = document.getElementById("inputEmailVerif");
// ----------

// Si l'email correspond a la regex on affiche OK.png, sinon PASOK.png
checkEmail.addEventListener('keyup',function(e){
    if (regexEmail.test(String(e.target.value).toLowerCase())){
            addSpan("EmailChecked","ok");
            errorEmail = "";
    }else{
            addSpan("EmailChecked","nok");
            errorEmail = "Vous devez entrer un email correct.";
    }    
});

// Compare le champ email et le champ de vérification de l'email
// affiche OK.png, sinon PASOK.png
checkEmailVerif.addEventListener('keyup',function(e){
    let emailContent = document.getElementById("inputEmail");
    let emailVerifContent = document.getElementById("inputEmailVerif");
        if (emailContent.value === emailVerifContent.value ){
            addSpan("EmailVerifChecked","ok");
            errorEmailVerif ="";
        }else{
            addSpan("EmailVerifChecked","nok");
            errorEmailVerif ="Vous n'avez pas rempli correctement la vérification de l'email.";
        }
    });


//2. Vérification du mot de passe et de la confirmation du mot de passe

// Variables :
const passwordcheck = document.getElementById("inputpassword");
const passworVerifdcheck = document.getElementById("inputpasswordVerif");
// ----------

// Si le password correspond à la regex on affiche OK.png, sinon PASOK.png
passwordcheck.addEventListener('keyup', function(e){
    if (regexpasswd.test(String(e.target.value))){
        addSpan("passwordChecked","ok");
        errorPasswdVerif = "";
    }else{
        addSpan("passwordChecked","nok");
        errorPasswdVerif = "Vous ne remplissez pas toutes les conditions pour un bon mot de passe.";
    }  
});

// Compare le champ password et le champ de vérification de password
// affiche OK.png, sinon PASOK.png
passworVerifdcheck.addEventListener('keyup', function(e){
    if (passwordcheck.value === e.target.value){
        addSpan("passwordVerifChecked","ok");
        errorPasswd = "";
    }else{
        addSpan("passwordVerifChecked","nok");
        errorPasswd = "Vous devez entrer le même mot de passe.";
    }
});

// 3. Vérification du champ 'nom'; contient 1 valeur de minimum 3 lettres

//Variable :
const nom = document.getElementById("inputnom");
// ----------
nom.addEventListener('keyup', function(e){
    if (regexnom.test(String(e.target.value))){
        addSpan("nomChecked","ok");
        errorNom = "";
    }else{
        addSpan("nomChecked","nok");
        errorNom = "Vous devez remplir votre nom.";
    }
});

// 4. Vérification du champ 'prenom'; contient 1 valeur de minimum 3 lettres

//Variable :
const prenom = document.getElementById("inputprenom");
// ----------
prenom.addEventListener('keyup', function(e){
    if (regexnom.test(String(e.target.value))){
        addSpan("prenomChecked","ok");
        errorPrenom = "";
    }else{
        addSpan("nomChecked","nok");
        errorPrenom = "Vous devez remplir votre prénom.";
    }
});


// 4. Vérification de l'adresse 

// Variable :
const address = document.getElementById("inputaddress");
// ----------
address.addEventListener('keyup', function(e){

    if ( e.target.value !== ""){
        addSpan("addressChecked","ok");
        errorAddress = "";
    }else{
        addSpan("addressChecked","nok");
        errorAddress = "Vous devez remplir votre adresse.";
    }
});

// 5. Vérification de la localité
const localites = document.getElementById("inputlist");

localites.addEventListener('input', function(e){
    //console.log(e.target.value);
    if ( e.target.value !== ""){
        addSpan("localiteChecked","ok");
        errorLocalite = "";
    }else{
        addSpan("localiteChecked","nok");
        errorLocalite = "Vous devez sélectionner votre localité.";
    }
});


// 6. Vérification des conditions générales 

// Variable :
const checkcondition = document.getElementById("scales");
// ----------

checkcondition.addEventListener('click', function(e){
    const testdiv = document.getElementById('checkboxChecked');
    while (testdiv.lastElementChild) {
        testdiv.removeChild(testdiv.lastElementChild);
    }
    //console.log(e.target.checked);
    if(e.target.checked == true){
        $("#checkboxChecked").append('<span id="Checkbox_OK"> </span>');
        errorCondition = "";
        //console.log(e.target.checked);
    }else{
        $("#checkboxChecked").append('<span id="Checkbox_PASOK"> </span>');
        errorCondition = "Vous devez accepter les conditions générales.";
        //console.log(e.target.checked);

    }
})


// 7. Vérification du submit

// Variables:
const verifbutton = document.getElementById("verifbutton");
// ----------
verifbutton.addEventListener('click', function(e){
    // Récupération du contenu de chaque variable
    const errorlist = [
        errorEmail, 
        errorEmailVerif, 
        errorPasswd ,
        errorPasswdVerif, 
        errorNom ,
        errorPrenom,
        errorAddress, 
        errorLocalite, 
        errorCondition,
    ];

    // Génération de la liste des erreurs à afficher :
    for (x in errorlist){
        //console.log(errorlist[x]);
    }
    let errorToDisplay = [];
    for (x in errorlist){
        if (errorlist[x].length != 0){
            errorToDisplay.push(errorlist[x]);
        }
    }

    // Affichage des erreurs si présentes :
    if(errorToDisplay.length != 0){

        // afficher la list des erreurs dans la popup alert
        let alertMessage = "il vous reste quelques conditions à remplir : \n";
        for (x in errorToDisplay){
            alertMessage += errorToDisplay[x] +" \n";
            
        }
        window.alert(alertMessage);
    }
    //si pas d'erreur, on passe à la page immo.html
    else {
        window.open("./immo.php", "_self");
    }
});
