
var szakaszSzam = -1;
var load = 0;
var kepSorSzam = 0;
var canvas = document.getElementById("MainCanvas");
var ctx = canvas.getContext("2d");
ctx.font = "20px Arial";
ctx.globalAlpha = 0.1;
ctx.fillText("Click on the next picture!", 10, 30);
/* kepSorszam */
//document.getElementById(kepSorszam).innerHTML = "JS: 1 (Start New GIF project!)";
if (document.getElementById("kepSorszam").innerHTML == "1") {
    load = 0;
}
if (document.getElementById("kepSorszam").innerHTML == "0") {
    load = 1;
}
/**/
if (load == 0) {
    document.getElementById("kepSorszam").style.fontWeight = "900";
    document.getElementById("kepSorszam").style.color = "#fcdef3";
    document.getElementById("kepSorszam").innerHTML = "JS: Please click on the First picture";
}
if (load == 1) {
    document.getElementById("kepSorszam").innerHTML = "JS:  (Load the saved GIF project!)";
}


function szakaszShow() {
    if (szakaszSzam < 1) { szakaszSzam++; }
    //var x = document.getElementById("szakasz_" + szakaszSzam.toString());
    //document.write("szakasz_" + szakaszSzam.toString());
    //ctx.globalAlpha= 1.0;
    //ctx.fillText("szakasz_" + szakaszSzam, 10, 30);
    document.getElementById("szakasz_" + szakaszSzam).style.height = "110px";
    document.getElementById("szakasz_" + szakaszSzam).style.opacity = "1.0"; // height: 0px



}

function szakaszHide() { // jelenleg az elsot - meretben es atlatszatlanul - megjeleniti a PHP 220830
    //ctx.globalAlpha= 1.0;
    //ctx.fillText("szakasz_" + szakaszSzam.toString(), 10, 30);
    document.getElementById("szakasz_" + (szakaszSzam)).style.height = "0px";
    document.getElementById("szakasz_" + (szakaszSzam)).style.opacity = "0.0";

    if (szakaszSzam >= 0) { szakaszSzam--; }



}


function textChange(be1) {
    mainImg.value = be1;
}
function textChange2(be2) {
    subImg.value = be2;
}
function textImgSrc(be) {
    mainImg.value = be;
    if (load == 0) {
        kepSorSzam++;
        document.getElementById("kepSorszam").innerHTML = kepSorSzam + ". picture";
    }
    if (load == 1) {
        kepSorSzam++;
        document.getElementById("kepSorszam").innerHTML = "Loaded project picture-szamozas kidolgozasa itt.";
    }

    ctx.fillStyle = "white";
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    ctx.globalAlpha = 1.0;
    var a = document.getElementById(be);
    ctx.drawImage(a, 5, 5);

    height.value = a.height;
    width.value = a.width;
}
function openImgSet() {
    // dovument.write("openImgSet()-ben")

    document.getElementById("setSaav").style.height = "300px"; // "menu0"
    document.getElementById("menu0").style.opacity = "0.0";
}

function closeImgSet() {
    document.getElementById("setSaav").style.height = "0px"; // "menu0"
    document.getElementById("menu0").style.opacity = "1.0";
}

function pictureSave() {
var dataString = "mainImg=" + document.getElementById("mainImg").value;
dataString += "&kepSorszam=" + document.getElementById("kepSorszam").value;
dataString += "&height=" + document.getElementById("height").value;
dataString += "&width=" + document.getElementById("width").value;
dataString += "&mod=" + document.getElementById("mod").value;
dataString += "&tartam=" + document.getElementById("tartam").value;
dataString += "&delay=" + document.getElementById("delay").value;
dataString += "&startFr=" + document.getElementById("startFr").value;
dataString += "&endFr=" + document.getElementById("endFr").value;

dataString += "&startX=" + document.getElementById("startX").value;
dataString += "&startY=" + document.getElementById("startY").value;
dataString += "&startOp=" + document.getElementById("startOp").value;
dataString += "&startLight=" + document.getElementById("startLight").value;
dataString += "&endX=" + document.getElementById("endX").value;
dataString += "&endY=" + document.getElementById("endY").value;
dataString += "&endOp=" + document.getElementById("endOp").value;
dataString += "&endLight=" + document.getElementById("endLight").value;
/*
        var setAdatKi = document.getElementById("mainImg").value;
       document.getElementById("tartam").value = setAdatKi;
       */
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // document.getElementById("startFr").value =
                var imggif = document.createElement('img');
                imggif.src = this.responseText;
                ctx.fillStyle = "white";
                ctx.fillRect(0, 0, canvas.width, canvas.height);
                ctx.globalAlpha = 1.0;
                ctx.drawImage(imggif, 5, 5);
            }
        };
        //xhttp.open("GET", "gifProject.php?setAdat=" + setAdatKi, false);
        xhttp.open("POST", "gifProject.php?" + dataString, false);
        xhttp.send();

// "GIFproject/images/lila.png"  MainCanvasfalse

    }
    function szakaszStShow() {

        var dataString = "mainImg=" + document.getElementById("mainImg").value;
        dataString += "&kepSorszam=" + document.getElementById("kepSorszam").value;
        dataString += "&height=" + document.getElementById("height").value;
        dataString += "&width=" + document.getElementById("width").value;
        dataString += "&mod=" + document.getElementById("mod").value;
        dataString += "&startFr=" + document.getElementById("startFr").value;
         dataString += "&startX=" + document.getElementById("startX").value;
        dataString += "&startY=" + document.getElementById("startY").value;
        dataString += "&startOp=" + document.getElementById("startOp").value;
        dataString += "&startLight=" + document.getElementById("startLight").value;
        dataString += "&startE=1" ;// <<<<<<<<<<<<<<<<

/*
       var setAdatKi = document.getElementById("startX").value;
       document.getElementById("tartam").value = setAdatKi;
       */
       var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function () {
           if (this.readyState == 4 && this.status == 200) {
               // document.getElementById("startFr").value =
               var imggif = document.createElement('img');
               imggif.src = this.responseText;
               ctx.fillStyle = "white";
               ctx.fillRect(0, 0, canvas.width, canvas.height);
               ctx.globalAlpha = 1.0;
               ctx.drawImage(imggif, 5, 5);
          }
       };
       xhttp.open("POST", "range.php?" + dataString, false);
       xhttp.send();




    }
    function szakaszEndShow() {
var dataString = "mainImg=" + document.getElementById("mainImg").value;
dataString += "&kepSorszam=" + document.getElementById("kepSorszam").value;
dataString += "&height=" + document.getElementById("height").value;
dataString += "&width=" + document.getElementById("width").value;
dataString += "&mod=" + document.getElementById("mod").value;
dataString += "&endFr=" + document.getElementById("endFr").value;
dataString += "&endX=" + document.getElementById("endX").value;
dataString += "&endY=" + document.getElementById("endY").value;
dataString += "&endOp=" + document.getElementById("endOp").value;
dataString += "&endLight=" + document.getElementById("endLight").value;
dataString += "&startE=0"; // <<<<<<<<<<<<<<<<
/*
       var setAdatKi = document.getElementById("endX").value;
        document.getElementById("delay").value = setAdatKi;
        */

       var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function () {
           if (this.readyState == 4 && this.status == 200) {
               // document.getElementById("startFr").value =
               var imggif = document.createElement('img');
               imggif.src = this.responseText;
               ctx.fillStyle = "white";
               ctx.fillRect(0, 0, canvas.width, canvas.height);
               ctx.globalAlpha = 1.0;
               ctx.drawImage(imggif, 5, 5);
           }
       };
       xhttp.open("POST", "range.php?" + dataString, false);
       xhttp.send();

    }




