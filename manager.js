
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
var improveTurnOn = "0";
var firstLoad = "1";

while (j < 5) {
    picturesData[j] = new Array(21);
    j++;
}



function szakaszShow() {
    if (szakaszSzam < 1) { szakaszSzam++; }
    document.getElementById("szakasz_" + szakaszSzam).style.height = "110px";
    document.getElementById("szakasz_" + szakaszSzam).style.opacity = "1.0"; // height: 0px
}

function szakaszHide() { // jelenleg az elsot - meretben es atlatszatlanul - megjeleniti a PHP 220830
    document.getElementById("szakasz_" + (szakaszSzam)).style.height = "0px";
    document.getElementById("szakasz_" + (szakaszSzam)).style.opacity = "0.0";

    if (szakaszSzam >= 0) { szakaszSzam--; }
}

/*
function textChange(be1) {
    mainImg.value = be1;
}
function textChange2(be2) {
    subImg.value = be2;
}
*/
function textImgSrc(be) { // Display all image from Gifproject/images folder
   // document.write("textImgSrc(be)");
    if (firstLoad == "1") { firstLoad = "0"; }
    else {
        if (alertShow_Save() == "0") { return; }
    }

    mainImg.value = be; 

    var a = document.getElementById(be);
    height.value = a.height;
    width.value = a.width;

    if (load == 0) {
        if (kepSorSzam >= 5) {
            alert("Maximum 5 picture");
            return;
        }

        kepSorSzam++;
        document.getElementById("kepSorszam").value = kepSorSzam;//+ ". picture";
        document.getElementById("felirat").innerHTML = ".picture";

    }
    if (load == 1) {

        if (load == 0) {
            if (kepSorSzam >= 5) {
                alert("Maximum 5 picture");
                return;
            }
        }
         kepSorSzam++;
     }

    var imageURL = "https://localhost/php_1/gifmaker/GIFproject/images/" + be;
  
    fillCanvas();
    projectData("0");
    document.getElementById("imgBtn_" + (kepSorSzam)).style.display = "inline";
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

function picturesImprove() {
    //document.write(firstLoad);
  // impNum++;
   
    if (firstLoad == "1") { return; }
    if (alertShow_Save() == "0") { return; }
    
    if (improveTurnOn == "0") { // false bekapcsolas
          improveTurnOn = "1";
             projectData("0");
            beforeImprove = "0"
        
        document.getElementById("imgBtnKeret").style.display = "inline";
        document.getElementById("imgSwitch").style.color = "rgb(255,0,0)";
        document.getElementById("showGif").style.display = "none";//width = "0px";
        document.getElementById("saveProject").style.display = "none";
        document.getElementById("uploadedPictures").style.display = "none";

    }
    else { //true  kikapcsolas pictImprove == "1";
        
        if(beforeImprove != "0"){ // if there was any picture opened.
            projectData("0"); // melyik picture?  pictImprove == "1";
           
                switchPict(kepSorSzam, "0", kepSorSzam); // Last opened picture datas
        }
        beforeImprove = "0";

        improveTurnOn = "0";

        document.getElementById("imgSwitch").style.backgroundColor = "rgb(49, 147, 186)";
        document.getElementById("imgSwitch").style.color = "rgb(250, 235, 215)";
        document.getElementById("imgBtnKeret").style.display = "none";

        document.getElementById("showGif").style.display = "inline";//width = "0px";
        document.getElementById("saveProject").style.display = "inline";
         document.getElementById("uploadedPictures").style.display = "inline";
    }

}
//  uploadedPictures

function switchPict(pictureNum, projectLoad, kikapcsolas) {

    if (projectLoad == '0') {// if it is not projectload, some button is activated AND NOT turn off improve
        if (alertShow_Save() == "0") { return; }
       if(improveTurnOn = "2"){ //Untill Improve is opened.

                projectData("0");//<===// Elso kepmegnyitasnal kepsorszamot tolti
                if(pictureNum == "2"){
                }
        }
        if(improveTurnOn == "1"){ improveTurnOn = "2"; }

    }
    else { // case of projectload
       
        kepSorSzam = picturesData[pictureNum - 1][0];
    }
    beforeImprove = pictureNum;
     if(kikapcsolas != "0"){
        kepSorSzam = kikapcsolas;
    }
     //document.write("check");
    document.getElementById("kepSorszam").value = picturesData[pictureNum - 1][0];
    document.getElementById("mainImg").value = picturesData[pictureNum - 1][1];
    document.getElementById("height").value = picturesData[pictureNum - 1][2];
    document.getElementById("width").value = picturesData[pictureNum - 1][3];
    document.getElementById("mod").value = picturesData[pictureNum - 1][4];
    document.getElementById("tartam").value = picturesData[pictureNum - 1][5];
    document.getElementById("delay").value = picturesData[pictureNum - 1][6];
    document.getElementById("startFr").value = picturesData[pictureNum - 1][7];
    document.getElementById("endFr").value = picturesData[pictureNum - 1][8];
    document.getElementById("startX").value = picturesData[pictureNum - 1][9];
    document.getElementById("startY").value = picturesData[pictureNum - 1][10];

    document.getElementById("startOp").value = picturesData[pictureNum - 1][11];
    document.getElementById("startLight").value = picturesData[pictureNum - 1][12];
    document.getElementById("endX").value = picturesData[pictureNum - 1][13];
    document.getElementById("endY").value = picturesData[pictureNum - 1][14];
    document.getElementById("endOp").value = picturesData[pictureNum - 1][15];
    document.getElementById("endLight").value = picturesData[pictureNum - 1][16];
    document.getElementById("projLength").value = picturesData[pictureNum - 1][17];
    document.getElementById("mainDelay").value = picturesData[pictureNum - 1][18];
    //----------------
     fillCanvas();
}

function projectData(save) {
    var sorszam;

    if(beforeImprove == 2){
      //  document.write("sorszam = " + sorszam );
           }
    if(improveTurnOn == "0" || improveTurnOn == "1") //  improve bekapcsolása vagy kikapcsolasa.
    { // improve bekapcsolas és 
        sorszam = kepSorSzam;
        }
    else{ // If improve bekapcsolva
        if ( beforeImprove != "0") { // 1. kep batoltodes utan (2...)
            sorszam = beforeImprove;
        }
        else{ // 1. kepbetoltodesnel it already filled when the imporve has opened. 
            return;
        }
    }

    picturesData[sorszam - 1][0] = document.getElementById("kepSorszam").value;
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

    //-----------------

    var dataStringActual = '';
    var i = 0;
    while (i < kepSorSzam) {
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

        if (i == 0) {
            dataString = '';
            picture1 = '';
            picture1 = dataStringActual;
            dataString = dataStringActual;
 
        }
        if (i == 1) {
            picture2 = '';
            picture2 = dataStringActual;
            dataString = picture1 + picture2;
        }
        if (i == 2) {
            picture3 = '';
            picture3 = dataStringActual;
            dataString = picture1 + picture2 + picture3;
        }
        if (i == 3) {
            picture4 = '';
            picture4 = dataStringActual;
            dataString = picture1 + picture2 + picture3 + picture4;
        }
        if (i == 4) {
            picture5 = '';
            picture5 = dataStringActual;
            dataString = picture1 + picture2 + picture3 + picture4 + picture5;
        }
        i++;
    }
    if(improveTurnOn == "0" ){ // When improve turn off event it loads kepszam element

    }
}

function pictureSave() {
    projectData("1");
    if (alertShow_Save() == "0") { return; };

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // document.write(this.responseText); 
        }
        else {
            // document.write("Nem 4 es 200!");
        }
    };
    xhttp.open("POST", "gifProject.php?" + dataString, false);
    xhttp.send();
}


function saveProj() {
    //document.write("saveProj()"); 
    projectData("2");
    if (alertShow_Save() == "0") { return; };

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // document.write(this.responseText); 
        }
        else {
            // document.write("Nem 4 es 200!");
        }
    };
     xhttp.open("POST", "gifProject.php?" + dataString, false);
    xhttp.send();




}

function showGif2() {
   // document.write("showGif2()");
    projectData("0");
    // document.write("showGif(){ -ben!");
    if (alertShow_Save() == "0") { return; };

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
           // document.write(this.responseText);
            var imageURL = "https://localhost/php_1/gifmaker/GIFproject/Gif/animation.gif";
            document.getElementById("canvasIMG").src = imageURL;

        }
        else {
            // document.write("showGif2(): Nem 4 es 200!");
        }
    };
    xhttp.open("POST", "gifProject.php?" + dataString, false);
    xhttp.send();

}

function fillCanvas() {

    var dataString = "mainImg=" + document.getElementById("mainImg").value;
    dataString += "&kepSorszam=" + document.getElementById("kepSorszam").value;
    dataString += "&height=" + document.getElementById("height").value;
    dataString += "&width=" + document.getElementById("width").value;
    dataString += "&mod=" + document.getElementById("mod").value;
    dataString += "&startFr=" + document.getElementById("startFr").value;
    dataString += "&startX=0";
    dataString += "&startY=0";
    dataString += "&startOp=" + document.getElementById("startOp").value;
    dataString += "&startLight=" + document.getElementById("startLight").value;
    dataString += "&startE=1";// <<<<<<<<<<<<<<<<

   var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
           // document.write(this.responseText);
          var  imageURL = 'data:image/png;base64,' + this.responseText;
            document.getElementById("canvasIMG").src = imageURL;/*  */

//------------------------- 
            
        }
    };
    xhttp.open("POST", "range.php?" + dataString, false);
    xhttp.send();

 


}

function alertShow_Save() {
    if (document.getElementById("projLength").value == "" || document.getElementById("mainDelay").value == ""
    || document.getElementById("projLength").value == "0" || document.getElementById("mainDelay").value == "0") {
        alert("Please fill out both the 'Gif long' and the 'Frame/sec'!");
        return "0";
    }
    if (document.getElementById("kepSorszam").value == "0" || document.getElementById("kepSorszam").value == "") {
        alert("Please load into one picture!");
        return "0";
    }
    if (document.getElementById("startX").value == "" || document.getElementById("startY").value == ""
        || document.getElementById("endX").value == "" || document.getElementById("endY").value == "" 
        ) {
        alert("Please fill these all: 'startX', 'startY', 'endX', 'endY'!");
        return "0";
    }

    if (document.getElementById("startOp").value == "" || document.getElementById("endOp").value == ""    ) 
    {
    alert("Please fill these all: 'startOp', 'endOp'!");
    return "0";
}
    return "1";

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
    dataString += "&startE=1";// <<<<<<<<<<<<<<<<
    //dataString += szakaszShowTime ;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          var  imageURL = 'data:image/png;base64,' + this.responseText;
            document.getElementById("canvasIMG").src = imageURL;

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
    dataString += "&startE=0";// <<<<<<<<<<<<<<<<
    //dataString += szakaszShowTime ;


    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            var  imageURL = 'data:image/png;base64,' + this.responseText;
            document.getElementById("canvasIMG").src = imageURL;


        }
    };
    xhttp.open("POST", "range.php?" + dataString, false);
    xhttp.send();

}

function newGif(){
  // document.write("newGif()");
    document.getElementById("mainImg").value = "Click on same picture! ";
        document.getElementById("kepSorszam").value = "0" ;
              document.getElementById("height").value = "" ;
          document.getElementById("width").value = "" ;
          document.getElementById("mod").value = "0" ;
          document.getElementById("startX").value =  "0";
          document.getElementById("startY").value =  "0";
        
          document.getElementById("startOp").value = "1" ;
          document.getElementById("startLight").value =  "100";
          document.getElementById("endX").value = "0" ;
          document.getElementById("endY").value =  "0";
          document.getElementById("endOp").value = "1" ;
         document.getElementById("endLight").value =  "100" ;
          document.getElementById("projLength").value =  "0";
          document.getElementById("mainDelay").value = "0" ;
          document.getElementById("mainFrameDb").value = "0" ;

          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function () {
              if (this.readyState == 4 && this.status == 200) {
                //document.write("newGif()  2222 " + this.responseText);
                  var  imageURL = 'data:image/png;base64,' + this.responseText;
                  document.getElementById("canvasIMG").src = imageURL;
      
      
              }
          };
          xhttp.open("POST", "whiteBckgrFill.php", false);
          xhttp.send();

          
}


function projectLoad() {
    firstLoad = "0";
    pictImprove = "0";
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var filesData = this.responseText;
            dataString = this.responseText;
            const fileok = filesData.split("|"); //split filesDatas into picturesData[5][21]:
            
            var i = 0;
            //document.write(fileok.length - 1);
            while (i < (fileok.length - 1)) {

                const keyValues = fileok[i].split("&");
                var j = 0;
                //  document.write("i=" + i + ", ");
                while (j < keyValues.length) {//19){
                    const key_value = keyValues[j].split("=");
                    picturesData[i][j] = key_value[1];
                    if(j == keyValues.length - 1){
                        picturesData[i][j] = picturesData[i][j] + "|"; // [save]
                    }
                      j++;
                }
                document.getElementById("imgBtn_" + (i + 1)).style.display = "inline";
                i++;
            }
            //----------------------- fill into the set panels:
            //document.write("check_1");
            //document.write(picturesData[fileok.length - 2][0]);
            switchPict(picturesData[fileok.length - 2][0], '1', '0');
        }
        else {
            // document.write("NEM  4 && this.status == 200");
        }
        document.getElementById("mainFrameDb").value = document.getElementById("projLength").value * document.getElementById("mainDelay").value;
    };
    xhttp.open("POST", "projectLoad.php", false);
    xhttp.send();
    textImgSrc(picturesData[keyValues.length * 1][1]);

}
function calcFrPerSec(){
    document.getElementById("mainFrameDb").value = document.getElementById("projLength").value * document.getElementById("mainDelay").value;
    //document.write("calcFrPerSec()");
}


