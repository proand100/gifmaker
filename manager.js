
var szakaszSzam = -1;
var load = 0;
var kepSorSzam = 0;
var picture1 = "";
var picture2 = "";
var picture3 = "";
var picture4 = "";
var picture5 = "";
var dataString = "";
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
    document.getElementById("kepSorszam").style.color = "black";
    document.getElementById("kepSorszam").value = kepSorSzam;
    document.getElementById("felirat").innerHTML = "JS: Please click on the First picture";
}
if (load == 1) {
    document.getElementById("felirat2").innerHTML = "JS:  (Load the saved GIF project!)";
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
function textImgSrc(be) { // Display all image from Gifproject/images folder
  mainImg.value = be;
  //document.write("textImgSrc");
    if (load == 0) {
         if(kepSorSzam >= 5){
            alert("Maximum 5 picture");
            return;
        }
       // projectData();
          
      /*   */
        kepSorSzam++;
        document.getElementById("kepSorszam").value = kepSorSzam ;//+ ". picture";
        document.getElementById("felirat").innerHTML = ".picture";

    }
    if (load == 1) {
        
        if (load == 0) {
           if(kepSorSzam >= 5){
                alert("Maximum 5 picture");
                return;
            }
        }
       
             /**/
        kepSorSzam++;

       // document.getElementById("kepSorszam").innerHTML = "Loaded project picture-szamozas kidolgozasa itt.";
    }
   

    ctx.fillStyle = "white";
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    ctx.globalAlpha = 1.0;
    var a = document.getElementById(be);
    ctx.drawImage(a, 5, 5);

    height.value = a.height;
    width.value = a.width;
    
//-------------
tartam.value = "";
delay.value = "";
startFr.value = "";
endFr.value = "";//
startX.value = "";//
startY.value = "";//
startOp.value = "";//
startLight.value = "";//
endX.value = "";//
endY.value = "";//
endOp.value = "";//
endLight.value = "";//
mod.value = "0";//

//--------------
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

function showGif(){
    document.write("showGif(){ -ben!");
    /*
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
    dataString += "&save=1";
    /*
          
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    ctx.fillStyle = "white";
                    ctx.fillRect(0, 0, canvas.width, canvas.height);
                    ctx.globalAlpha = 0.0;
                   var img_gif = document.getElementById("gifPlace");
    
                   var img = new Image();
                    
                    img.src = this.responseText;
                    img_gif.style.backgroundColor="white";
                    img_gif.style.width = img.width;
                    img_gif.style.height = img.height;
                    img_gif.style.zIndex = 120;
                    img_gif.src = this.responseText;
    
                }
            };
            //xhttp.open("GET", "gifProject.php?setAdat=" + setAdatKi, false);
            xhttp.open("POST", "gifProject.php?" + dataString, false);
            xhttp.send();
 */
}

function projectData(){
    var dataStringActual = '';

    dataStringActual = "kepSorszam=" + document.getElementById("kepSorszam").value;
    dataStringActual += "&mainImg=" + document.getElementById("mainImg").value;

  
    dataStringActual += "&height=" + document.getElementById("height").value;
    dataStringActual += "&width=" + document.getElementById("width").value;
    dataStringActual += "&mod=" + document.getElementById("mod").value;
    dataStringActual += "&tartam=" + document.getElementById("tartam").value;
    dataStringActual += "&delay=" + document.getElementById("delay").value;
    dataStringActual += "&startFr=" + document.getElementById("startFr").value;
    dataStringActual += "&endFr=" + document.getElementById("endFr").value;
    
    dataStringActual += "&startX=" + document.getElementById("startX").value;
    dataStringActual += "&startY=" + document.getElementById("startY").value;
    dataStringActual += "&startOp=" + document.getElementById("startOp").value;
    dataStringActual += "&startLight=" + document.getElementById("startLight").value;
    dataStringActual += "&endX=" + document.getElementById("endX").value;
    dataStringActual += "&endY=" + document.getElementById("endY").value;
    dataStringActual += "&endOp=" + document.getElementById("endOp").value;
    dataStringActual += "&endLight=" + document.getElementById("endLight").value;
    dataStringActual += "&save=1|";
    
    
    if(kepSorSzam == 1){ 
       dataString = '';
       picture1 = '';
       picture1 = dataStringActual;
       dataString = dataStringActual;
        //dataString = dataStringActual;

    }
    if(kepSorSzam == 2){
        picture2 = '';
         picture2 = dataStringActual;
         dataString = picture1 + picture2;
        }
    if(kepSorSzam == 3){
        picture3 = '';
         picture3 = dataStringActual;
         dataString = picture1 + picture2+ picture3;
        }
    if(kepSorSzam == 4){ 
        picture4 = '';
        picture4 = dataStringActual;
        dataString = picture1 + picture2+ picture3 + picture4;
    }
    if(kepSorSzam == 5){
        picture5 = '';
         picture5 = dataStringActual;
         dataString = picture1 + picture2+ picture3 + picture4 + picture5;
        }


}

function pictureSave() {
 
   projectData();


        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if(kepSorSzam == 4){ document.write(this.responseText); }
                     }
        };
        //xhttp.open("GET", "gifProject.php?setAdat=" + setAdatKi, false); key value fusion
       xhttp.open("POST", "gifProject.php?" + dataString, false);
       // xhttp.open("POST", "gifProject.php?mainImg=miEz", false);
        xhttp.send();
   }
    //}

    function szakaszStShow() {

        var  dataString = "mainImg=" + document.getElementById("mainImg").value;
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
            /* document.write(this.responseText);

              */
               // document.getElementById("startFr").value =
               var imggif = document.createElement('img');
               imggif.src = this.responseText;
               ctx.fillStyle = "white";
               ctx.fillRect(0, 0, canvas.width, canvas.height);
               ctx.globalAlpha = 1.0;
               //ctx.zIndex = 30;
               var img_gif = document.getElementById("gifPlace");
               //img_gif.style.width = "0px";
               //img_gif.style.height = "0px";
               img_gif.style.zIndex = 0;
               ctx.drawImage(imggif, 5, 5);
            
          }
       };
       xhttp.open("POST", "range.php?" + dataString, false);
       xhttp.send();




    }
    function szakaszEndShow() {
        var  dataString = "mainImg=" + document.getElementById("mainImg").value;
        dataString += "&kepSorszam=" + document.getElementById("kepSorszam").value;
        dataString += "&height=" + document.getElementById("height").value;
        dataString += "&width=" + document.getElementById("width").value;
        dataString += "&mod=" + document.getElementById("mod").value;
        dataString += "&startFr=" + document.getElementById("startFr").value;
         dataString += "&startX=" + document.getElementById("startX").value;
        dataString += "&startY=" + document.getElementById("startY").value;
        dataString += "&startOp=" + document.getElementById("startOp").value;
        dataString += "&startLight=" + document.getElementById("startLight").value;
        dataString += "&startE=0" ;// <<<<<<<<<<<<<<<<
/*
       var setAdatKi = document.getElementById("endX").value;
        document.getElementById("delay").value = setAdatKi;
        */

       var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function () {
           if (this.readyState == 4 && this.status == 200) {
               // document.getElementById("startFr").value =
               var imggif = document.createElement('img');
/*document.write(this.responseText);
*/

               imggif.src = this.responseText;
               ctx.fillStyle = "white";
               ctx.fillRect(0, 0, canvas.width, canvas.height);
               ctx.globalAlpha = 1.0;
               //imggif.style.zIndex = 0;
              // ctx.style.zIndex = 10;
              var img_gif = document.getElementById("gifPlace");
              img_gif.style.zIndex = 00;

               ctx.drawImage(imggif, 5, 5);
               
           }
       };
       xhttp.open("POST", "range.php?" + dataString, false);
       xhttp.send();

    }




