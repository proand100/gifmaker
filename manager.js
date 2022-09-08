
var szakaszSzam = -1;
var load = 0;
var kepSorSzam = 0;
var picture1 = "";
var picture2 = "";
var picture3 = "";
var picture4 = "";
var picture5 = "";
var dataString = "";
var picturesData = new Array(5);
var j = 0;

var pictImprove = "0";
var beforeImprove = "0";
var firstLoad = "1";


while(j < 5){
    picturesData[j] = new Array(21);


    j++;
}
//var canvas = document.getElementById("MainCanvas");
//document.getElementById("showGif").onclick = function() {showGif()};

var canvas = document.getElementById("canvasIMG");
//var ctx = canvas.getContext("2d");
var szakaszShowTime = "&fileTime=0";

ctx.font = "20px Arial";
ctx.globalAlpha = 1.0;
//ctx.fillText("Click on the next picture!", 10, 30);
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
    if(firstLoad == "1"){firstLoad = "0";}
    else{
        if(alertShow_Save() == "0"){ return; }
    }

  mainImg.value = be; // text.substring(2)

  var a = document.getElementById(be);

  //document.getElementById(height).innerHTML = a.height;
  height.value = a.height;
 //document.getElementById(width).innerHTML = a.width;
  width.value = a.width;
  // //mainImg.value = be.substring(4);
  
  szakaszShowTime = "&fileTime=0";


  //document.write("textImgSrc");
    if (load == 0) {
         if(kepSorSzam >= 5){
            alert("Maximum 5 picture");
            return;
        }

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
   
   
    
  
    // document.write(be);
 

   var imageURL = "https://localhost/php_1/gifmaker/GIFproject/images/" + be;
            // document.write(imageURL);
  

// canvas.src = imageURL;
   /////////  document.getElementById("canvasIMG").src = imageURL;
  fillCanvas();
  projectData("0");
 
 // if(kepSorSzam > 1){
  document.getElementById("imgBtn_" + (kepSorSzam )).style.display = "inline";
  //}
   // document.getElementById("canvasIMG") = a; "imgBtn_1" kepSorszam
//canvas.src = a.src;
 //document.write(imageURL + "(kepSorSzam )).style.display ");
    
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

function picturesImprove(){
    if(firstLoad == "1"){ return; }
    if(alertShow_Save() == "0"){ return; }

if(pictImprove == "0"){ // false

     projectData("0");
    pictImprove = "1";
    beforeImprove = "0"
    document.getElementById("imgBtnKeret").style.display = "inline";
   // document.getElementById("imgSwitch").style.backgroundColor = "rgb(186, 49, 81);";
    document.getElementById("imgSwitch").style.color = "rgb(255,0,0)";
    document.getElementById("showGif").style.display = "none";//width = "0px";
    document.getElementById("saveProject").style.display = "none";
    document.getElementById("saveBtn").style.display = "none";
    document.getElementById("uploadedPictures").style.display = "none";

 
 //document.write("style.display = ");

}
else{ //true
   
     projectData("0");
    pictImprove = "0";
   // document.write("check_0");
    document.getElementById("imgSwitch").style.backgroundColor = "rgb(49, 147, 186)";
    document.getElementById("imgSwitch").style.color = "rgb(250, 235, 215)";
    document.getElementById("imgBtnKeret").style.display = "none";
  
    document.getElementById("showGif").style.display = "inline";//width = "0px";
    document.getElementById("saveProject").style.display = "inline";
    document.getElementById("saveBtn").style.display = "inline";
    document.getElementById("uploadedPictures").style.display = "inline";
}

}
//  uploadedPictures

function switchPict(pictureNum){
  
        if(alertShow_Save() == "0"){ return; }
        projectData("0");
        beforeImprove = pictureNum;

    
    //projectData("0"); //save=="0" : showGif
      document.getElementById("kepSorszam").value = picturesData[pictureNum - 1][0] ;
      //document.write("check");
     document.getElementById("mainImg").value = picturesData[pictureNum - 1][1]  ;
      document.getElementById("height").value = picturesData[pictureNum - 1][2] ;
      document.getElementById("width").value = picturesData[pictureNum - 1][3] ;
      document.getElementById("mod").value = picturesData[pictureNum - 1][4] ;
    document.getElementById("tartam").value = picturesData[pictureNum - 1][5]  ;
    document.getElementById("delay").value = picturesData[pictureNum - 1][6]  ;
      document.getElementById("startFr").value = picturesData[pictureNum - 1][7] ;
      document.getElementById("endFr").value =  picturesData[pictureNum - 1][8];
      document.getElementById("startX").value =  picturesData[pictureNum - 1][9];
      document.getElementById("startY").value =  picturesData[pictureNum - 1][10];
    
      document.getElementById("startOp").value = picturesData[pictureNum - 1][11] ;
      document.getElementById("startLight").value =  picturesData[pictureNum - 1][12];
      document.getElementById("endX").value = picturesData[pictureNum - 1][13] ;
      document.getElementById("endY").value =  picturesData[pictureNum - 1][14];
      document.getElementById("endOp").value = picturesData[pictureNum - 1][15] ;
     document.getElementById("endLight").value =  picturesData[pictureNum - 1][16] ;
      document.getElementById("projLength").value =  picturesData[pictureNum - 1][17];
      document.getElementById("mainDelay").value = picturesData[pictureNum - 1][18] ;
//----------------
//textImgSrc(picturesData[pictureNum][1]);
fillCanvas();

}


/*
function openImgSet() {
    // dovument.write("openImgSet()-ben")

    document.getElementById("setSaav").style.height = "300px"; // "menu0"
    document.getElementById("menu0").style.opacity = "0.0";
}

function closeImgSet() {
    document.getElementById("setSaav").style.height = "0px"; // "menu0"
    document.getElementById("menu0").style.opacity = "1.0";
}
*/



function projectData(save){
    var sorszam;
    if(pictImprove == "1" && beforeImprove != "0"){
        sorszam = beforeImprove;
    }
    else{
        sorszam = kepSorSzam;
    }
   
    picturesData[sorszam - 1][0] = document.getElementById("kepSorszam").value;
      //document.write("check");
    picturesData[sorszam - 1][1] = document.getElementById("mainImg").value;
    picturesData[sorszam - 1][2] = document.getElementById("height").value;
    picturesData[sorszam - 1][3] = document.getElementById("width").value;
    picturesData[sorszam - 1][4] = document.getElementById("mod").value;
    picturesData[sorszam - 1][5] = document.getElementById("tartam").value;
    picturesData[sorszam - 1][6] = document.getElementById("delay").value;
    picturesData[sorszam - 1][7] = document.getElementById("startFr").value;
    picturesData[sorszam - 1][8] = document.getElementById("endFr").value;
    picturesData[sorszam - 1][9] = document.getElementById("startX").value;
    picturesData[sorszam - 1][10] = document.getElementById("startY").value;
    
    picturesData[sorszam - 1][11] = document.getElementById("startOp").value;
    picturesData[sorszam - 1][12] = document.getElementById("startLight").value;
    picturesData[sorszam - 1][13] = document.getElementById("endX").value;
    picturesData[sorszam - 1][14] = document.getElementById("endY").value;
    picturesData[sorszam - 1][15] = document.getElementById("endOp").value;
    picturesData[sorszam - 1][16] = document.getElementById("endLight").value;
    picturesData[sorszam - 1][17] = document.getElementById("projLength").value;
    picturesData[sorszam - 1][18] = document.getElementById("mainDelay").value;
    picturesData[sorszam - 1][19] = save + "|";// projLength mainDelay
  /*
    if(save == "0"){picturesData[kepSorSzam - 1][19] =  "0|";}
    if(save == "2"){picturesData[kepSorSzam - 1][19] =  "2|";}
   */
    //-----------------
  
    var dataStringActual = '';
var i = 0;
while(i < kepSorSzam){
    /*
if(i == 0){
    dataStringActual = "kepSorszam=" + picturesData[i][0];
}
else{
    dataStringActual = "&kepSorszam=" + picturesData[i][0];
}
*/


dataStringActual = "kepSorszam=" + picturesData[i][0];
    dataStringActual += "&mainImg=" + picturesData[i][1];
    dataStringActual += "&height=" + picturesData[i][2];
    dataStringActual += "&width=" + picturesData[i][3];
    dataStringActual += "&mod=" + picturesData[i][4];
    dataStringActual += "&tartam=" + picturesData[i][5];
    dataStringActual += "&delay=" + picturesData[i][6];
    dataStringActual += "&startFr=" + picturesData[i][7];
    dataStringActual += "&endFr=" + picturesData[i][8];
    dataStringActual += "&startX=" + picturesData[i][9];
    dataStringActual += "&startY=" + picturesData[i][10];
    dataStringActual += "&startOp=" + picturesData[i][11];
    dataStringActual += "&startLight=" + picturesData[i][12];
    dataStringActual += "&endX=" + picturesData[i][13];
    dataStringActual += "&endY=" + picturesData[i][14];
    dataStringActual += "&endOp=" + picturesData[i][15];
    dataStringActual += "&endLight=" + picturesData[i][16];
    dataStringActual += "&projLength=" + picturesData[i][17];
    dataStringActual += "&mainDelay=" + picturesData[i][18];
    dataStringActual += "&save=" + picturesData[i][19];
     /*   
    if(save == "1"){dataStringActual += "&save=1|";} // projLength mainDelay
  if(save == "0"){dataStringActual += "&save=0|";}
  if(save == "2"){dataStringActual += "&save=2|";}   
    

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
*/
if(i == 0){ 
    dataString = '';
    picture1 = '';
    picture1 = dataStringActual;
    dataString = dataStringActual;
     //dataString = dataStringActual;

 }
 if(i == 1){
     picture2 = '';
      picture2 = dataStringActual;
      dataString = picture1 + picture2;
     }
 if(i == 2){
     picture3 = '';
      picture3 = dataStringActual;
      dataString = picture1 + picture2+ picture3;
     }
 if(i == 3){ 
     picture4 = '';
     picture4 = dataStringActual;
     dataString = picture1 + picture2+ picture3 + picture4;
 }
 if(i == 4){
     picture5 = '';
      picture5 = dataStringActual;
      dataString = picture1 + picture2+ picture3 + picture4 + picture5;
     }
    i++;
}
}

function pictureSave() {
   // document.write("pictureSave(){ -ben!");
   projectData("1");
   if(alertShow_Save() == "0"){ return;};

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                   document.write(this.responseText); 
               }
               else{
                document.write("Nem 4 es 200!");
               }
        };
        //xhttp.open("GET", "gifProject.php?setAdat=" + setAdatKi, false); key value fusion
        xhttp.open("POST", "gifProject.php?" + dataString, false);
        xhttp.send();
   }


function saveProj(){
    //document.write("saveProj()"); 
    projectData("2");
    if(alertShow_Save() == "0"){ return;};

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
               document.write(this.responseText); 
           }
           else{
            document.write("Nem 4 es 200!");
           }
    };
    //xhttp.open("GET", "gifProject.php?setAdat=" + setAdatKi, false); key value fusion
    xhttp.open("POST", "gifProject.php?" + dataString, false);
    xhttp.send();




}   
    
function showGif2() {
   
   projectData("0");
  // document.write("showGif(){ -ben!");
   /* */
   //--------------- warning check
   /*alert( "Please fill out both the 'Gif long' and the 'Frame/sec'!" );
   exit(0);*/
  //document.write(document.getElementById("projLength").value +', ' + document.getElementById("mainDelay").value);
  if(alertShow_Save() == "0"){ return;};
   //----------------------document.getElementById("endY").value;

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function () {
       if (this.readyState == 4 && this.status == 200) {
               // document.write(this.responseText); 
              var imageURL = "https://localhost/php_1/gifmaker/GIFproject/Gif/animation.gif";
                document.getElementById("canvasIMG").src = imageURL;
              
          }
          else{
          // document.write("showGif2(): Nem 4 es 200!");
          }
   };
   //xhttp.open("GET", "gifProject.php?setAdat=" + setAdatKi, false); key value fusion
  xhttp.open("POST", "gifProject.php?" + dataString, false);
  // xhttp.open("POST", "gifProject.php?mainImg=miEz", false);
   xhttp.send();
}

function fillCanvas(){
    //document.write("szakaszStShow");
   // var szakaszShowTime = "0";
        var  dataString = "mainImg=" + document.getElementById("mainImg").value;
        dataString += "&kepSorszam=" + document.getElementById("kepSorszam").value;
        dataString += "&height=" + document.getElementById("height").value;
        dataString += "&width=" + document.getElementById("width").value;
        dataString += "&mod=" + document.getElementById("mod").value;
        dataString += "&startFr=" + document.getElementById("startFr").value;
         dataString += "&startX=0";
        dataString += "&startY=0";
        dataString += "&startOp=" + document.getElementById("startOp").value;
        dataString += "&startLight=" + document.getElementById("startLight").value;
        dataString += "&startE=1" ;// <<<<<<<<<<<<<<<<
        //dataString += szakaszShowTime ;

       var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function () {
           if (this.readyState == 4 && this.status == 200) {
             //document.write(this.responseText);

  
               var resp = this.responseText.trim();
               var imageURL = "https://localhost/php_1/gifmaker/GIFproject/rangeImg/ranged" + resp + ".png";
                document.getElementById("canvasIMG").src = imageURL;
        
            
          }
       };
       xhttp.open("POST", "range.php?" + dataString, false);
       xhttp.send();




    }

    function alertShow_Save(){
        if(document.getElementById("projLength").value == "" || document.getElementById("mainDelay").value == ""){
            alert( "Please fill out both the 'Gif long' and the 'Frame/sec'!" );
            return "0";
        }
        if(document.getElementById("kepSorszam").value == "0" ){
            alert( "Please load into one picture!" );
            return "0";
        }
        if(document.getElementById("startX").value == "" || document.getElementById("startY").value == ""
            || document.getElementById("endX").value == "" || document.getElementById("endY").value == ""){
            alert( "Please fill these all: 'startX', 'startY', 'endX', 'endY'!" );
            return "0";
        }

    return"1";

    }


function szakaszStShow() {
    //document.write("szakaszStShow");
   // var szakaszShowTime = "0";
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
        //dataString += szakaszShowTime ;

       var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function () {
           if (this.readyState == 4 && this.status == 200) {
             //document.write(this.responseText);

             //  var imggifH = document.createElement('img');
               var resp = this.responseText.trim();
               var imageURL = "https://localhost/php_1/gifmaker/GIFproject/rangeImg/ranged" + resp + ".png";
              // imggifH.src = imageURL;
              //document.write(imageURL);
              // src="https://localhost/php_1/gifmaker/canvasImg/canvasIMG0.png"
              //document.getElementById("canvasIMG").src = "https://localhost/php_1/gifmaker/canvasImg/canvasIMG0.png";
               document.getElementById("canvasIMG").src = imageURL;
               //-------------
               //var imggifH = document.getElementById("rangShowImg");
               //imggifH.src = imageURL;
               //--------------
               
              // szakaszShowTime = "&fileTime=" + resp;
               
 
              // ctx.fillStyle = "white";
                
              // ctx.fillRect(0, 0, canvas.width, canvas.height);
             // ctx.globalAlpha = 1.0;
              //ctx.putImageData(imggifH, 0,0);
             // document.write(szakaszShowTime );
              // ctx.drawImage(imggifH, 0, 0);
              ////////////////// ctx.drawImage(imggifH, 0, 0);
            
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
        dataString += "&endFr=" + document.getElementById("endFr").value;
        dataString += "&endX=" + document.getElementById("endX").value;
        dataString += "&endY=" + document.getElementById("endY").value;
        dataString += "&endOp=" + document.getElementById("endOp").value;
        dataString += "&endLight=" + document.getElementById("endLight").value;
        dataString += "&startE=0" ;// <<<<<<<<<<<<<<<<
        //dataString += szakaszShowTime ;


       var xhttp = new XMLHttpRequest();
       xhttp.onreadystatechange = function () {
           if (this.readyState == 4 && this.status == 200) {
               // document.getElementById("startFr").value =
               var imggif = document.createElement('img');
//document.write(this.responseText);


//var imggifH = document.createElement('img');
var resp = this.responseText.trim();
var imageURL = "https://localhost/php_1/gifmaker/GIFproject/rangeImg/ranged" + resp + ".png";
//imggifH.src = imageURL;
//document.getElementById("canvasIMG").src = "https://localhost/php_1/gifmaker/canvasImg/canvasIMG0.png";
document.getElementById("canvasIMG").src = imageURL;
//szakaszShowTime = "&fileTime=" + resp;
/*
ctx.fillStyle = "white";
ctx.fillRect(0, 0, canvas.width, canvas.height);

ctx.drawImage(imggifH, 0, 0);
*/
               
           }
       };
       xhttp.open("POST", "range.php?" + dataString, false);
       xhttp.send();

    }




