
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

function szakaszHide() {
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
        // document.write(document.getElementById("mainImg"));
       // document.getElementById("kiire").innerHTML = "kiir";
        var setAdatKi = document.getElementById("mainImg").value;
       
        document.getElementById("tartam").value = setAdatKi;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // document.getElementById("startFr").value =
                var imggif = document.createElement('img');
                imggif.src = this.responseText;
                ctx.globalAlpha = 1.0;
                ctx.drawImage(imggif, 5, 5);

               /*  document.getElementById("kiire").innerHTML =
                    this.responseText;
                 
                    var a = this.responseText;
                    ctx.drawImage(a, 5, 5); */
                    //--------
//var imggif = document.createElement('img');
//imggif.src = 'https://localhost/php_1/gifmaker/GIFproject/Gif/e_e.gif';
//ctx.drawImage(imggif, 5, 5);

                    //----------------
                    
            }
        };
        xhttp.open("GET", "gifProject.php?setAdat=" + setAdatKi, false);
        xhttp.send();

// "GIFproject/images/lila.png"  MainCanvasfalse

    }
    function szakaszHide() {

    }
    function szakaszShow() {

    }




