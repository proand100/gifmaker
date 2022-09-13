
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

var impNum = 0;
while (j < 5) {
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
    if (firstLoad == "1") { firstLoad = "0"; }
    else {
        if (alertShow_Save() == "0") { return; }
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
    document.getElementById("imgBtn_" + (kepSorSzam)).style.display = "inline";
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

function picturesImprove() {
    // document.getElementById("startOp").value = improveTurnOn;
    //document.write(firstLoad);
   impNum++;
   
    if (firstLoad == "1") { return; }
    if (alertShow_Save() == "0") { return; }
    
    if (improveTurnOn == "0") { // false bekapcsolas
        //if(impNum > 1){document.write("check_0");}
        improveTurnOn = "1";
       //  document.write("firstLoad ==" + firstLoad  + "  pictImprove ==" + pictImprove);
        
       // document.getElementById("endOp").value = "check";
       

        projectData("0");
        
       // pictImprove = "1";
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
    else { //true  kikapcsolas pictImprove == "1";
        
        if(beforeImprove != "0"){ // if there was any picture opened.
            projectData("0"); // melyik picture?  pictImprove == "1";
           
                switchPict(kepSorSzam, "0", kepSorSzam); // Last opened picture datas
        }
        beforeImprove = "0";

        improveTurnOn = "0";
      
       
      //  pictImprove = "0";
       
         //document.write("picturesImprove()-ban");
       
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

function switchPict(pictureNum, projectLoad, kikapcsolas) {

    if (projectLoad == '0') {// if it is not projectload, some button is activated AND NOT turn off improve
        if (alertShow_Save() == "0") { return; }
       if(improveTurnOn = "2"){ //Untill Improve is opened.

                projectData("0");//<===// Elso kepmegnyitasnal kepsorszamot tolti
                if(pictureNum == "2"){
                  //  document.write("check " + picturesData[pictureNum - 1][0]);
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
   // document.getElementById("startOp").value = improveTurnOn;
    //document.write("check");

    //projectData("0"); //save=="0" : showGif
    document.getElementById("kepSorszam").value = picturesData[pictureNum - 1][0];
    //document.write("check");
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



function projectData(save) {
    var sorszam;
   // if(beforeImprove != "0")
    /* if ( beforeImprove != "0") { //  valamelyik pict-re volt
        sorszam = beforeImprove;
       
        if(beforeImprove == 2){
     document.write("sorszam = " + sorszam );
        }
    }
    */
    if(beforeImprove == 2){
      //  document.write("sorszam = " + sorszam );
           }
    if(improveTurnOn == "0" || improveTurnOn == "1") //  improve bekapcsolása vagy kikapcsolasa.
    { // improve bekapcsolas és 
        sorszam = kepSorSzam;
        
        //document.getElementById("endOp").value = sorszam;
    }
    else{ // If improve bekapcsolva
        if ( beforeImprove != "0") { // 1. kep batoltodes utan (2...)
            sorszam = beforeImprove;
        }
        else{ // 1. kepbetoltodesnel it already filled when the imporve has opened. 
            return;
        }
    }
    /*
    document.getElementById("startLight").value = improveTurnOn;
    document.getElementById("endLight").value = beforeImprove;
document.getElementById("endOp").value = sorszam;
*/
  // // if(pictImprove == "1" && beforeImprove == "0"){return;} //  improve turn off and case of it was not improve picture switch
 
  //document.getElementById("endOp").value = sorszam;
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
    /*
      if(save == "0"){picturesData[kepSorSzam - 1][19] =  "0|";}
      if(save == "2"){picturesData[kepSorSzam - 1][19] =  "2|";}
     */
    //-----------------

    var dataStringActual = '';
    var i = 0;
    while (i < kepSorSzam) {
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

        if (i == 0) {
            dataString = '';
            picture1 = '';
            picture1 = dataStringActual;
            dataString = dataStringActual;
            //dataString = dataStringActual;

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
   // document.write("sorszam = " + sorszam );
    if(improveTurnOn == "0" ){ // When improve turn off event it loads kepszam element
//document.write("kepSorSzam = " + kepSorSzam);
//kepSorSzam = picturesData[kepSorSzam - 1][0];
     //   switchPict(kepSorSzam, "1", kepSorSzam);
    }
}

function pictureSave() {
    // document.write("pictureSave(){ -ben!");
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
    //xhttp.open("GET", "gifProject.php?setAdat=" + setAdatKi, false); key value fusion
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
    //xhttp.open("GET", "gifProject.php?setAdat=" + setAdatKi, false); key value fusion
    xhttp.open("POST", "gifProject.php?" + dataString, false);
    xhttp.send();




}

function showGif2() {

    projectData("0");
    // document.write("showGif(){ -ben!");
    if (alertShow_Save() == "0") { return; };
    //----------------------document.getElementById("endY").value;
   // var imageURL = "https://localhost/php_1/gifmaker/gifProject.php?" + dataString;
    //document.getElementById("canvasIMG").src = imageURL;


    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
        /// document.write(this.responseText); 
         // var  imageURL = "data:image/gif;base64," + this.responseText;
           
           //  document.getElementById("canvasIMG").src = imageURL;
       //     //  document.getElementById("canvasIMG").src = this.responseText;


            var imageURL = "https://localhost/php_1/gifmaker/GIFproject/Gif/animation.gif";
            document.getElementById("canvasIMG").src = imageURL;

        }
        else {
            // document.write("showGif2(): Nem 4 es 200!");
        }
    };
    xhttp.open("POST", "gifProject.php?" + dataString, false);
    xhttp.send();
     /**/
}

function fillCanvas() {
    //document.write("szakaszStShow");
    // var szakaszShowTime = "0";
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
    //dataString += szakaszShowTime ;
//var imageURL = "https://localhost/php_1/gifmaker/range.php?" + dataString;
//imageURL = 'data:image/png;base64,' + imageURL;

          //  document.getElementById("canvasIMG").src = imageURL;
             // document.getElementById("canvasIMG").src = imageURL;
/* */
   var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          var  imageURL = 'data:image/png;base64,' + this.responseText;
            document.getElementById("canvasIMG").src = imageURL;
          //  document.write(imageURL);


          //  var resp = this.responseText.trim();
         //   var imageURL = "https://localhost/php_1/gifmaker/GIFproject/rangeImg/ranged" + resp + ".png";
           // document.getElementById("canvasIMG").src = imageURL;
//------------------------- 
            
        }
    };
    xhttp.open("POST", "range.php?" + dataString, false);
    xhttp.send();

 


}

function alertShow_Save() {
    if (document.getElementById("projLength").value == "" || document.getElementById("mainDelay").value == "") {
        alert("Please fill out both the 'Gif long' and the 'Frame/sec'!");
        return "0";
    }
    if (document.getElementById("kepSorszam").value == "0") {
        alert("Please load into one picture!");
        return "0";
    }
    if (document.getElementById("startX").value == "" || document.getElementById("startY").value == ""
        || document.getElementById("endX").value == "" || document.getElementById("endY").value == "") {
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
/*
            var resp = this.responseText.trim();
            var imageURL = "https://localhost/php_1/gifmaker/GIFproject/rangeImg/ranged" + resp + ".png";
            document.getElementById("canvasIMG").src = imageURL;
            */

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
/*
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
            */
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


function projectLoad() {
    //document.write("function projectLoad() -ban!"); 
    // dataString = "";
    firstLoad = "0";
    pictImprove = "0";
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //dataString = this.responseText;
            // document.write(this.responseText);
            var filesData = this.responseText;
            dataString = this.responseText;
           /// OK document.write("projectLoad(): dataString: " + dataString);
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
                    //document.write(picturesData[i][j] + ", ");
                    //document.write(key_value[1] + ", ");
                    j++;
                }
                //  switchPict(picturesData[i][0], '1');
                // fillLoadedDatas(i);
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
    };
    xhttp.open("POST", "projectLoad.php", false);
    xhttp.send();
    textImgSrc(picturesData[keyValues.length * 1][1]);

}

/*
function fillLoadedDatas(kepIndexBe){
$miez = picturesData[kepIndexBe][0];
document.getElementById("kepSorszam").value = "MIEZ?";
document.write("check");
   
    //document.getElementById("kepSorszam").value = picturesData[kepIndexBe][0] ;
    document.getElementById("kepSorszam").innerHTML = picturesData[kepIndexBe][0] ;
    
  // document.getElementById("mainImg").value = picturesData[kepIndexBe][1]  ;
   document.getElementById("mainImg").innerHTML = picturesData[kepIndexBe][1]  ;
   document.write(kepIndexBe + " ,check_1" + "mainImg= " + picturesData[kepIndexBe][1]  );
   // document.getElementById("height").value = picturesData[kepIndexBe][2] ;
    document.getElementById("height").innerHTML = picturesData[kepIndexBe][2] ;
    document.getElementById("width").value = picturesData[kepIndexBe][3] ;
    document.getElementById("mod").value = picturesData[kepIndexBe][4] ;
  document.getElementById("tartam").value = picturesData[kepIndexBe][5]  ;
  document.getElementById("delay").value = picturesData[kepIndexBe][6]  ;
    document.getElementById("startFr").value = picturesData[kepIndexBe][7] ;
    document.getElementById("endFr").value =  picturesData[kepIndexBe][8];
    document.getElementById("startX").value =  picturesData[kepIndexBe][9];
    document.getElementById("startY").value =  picturesData[kepIndexBe][10];
  
    document.getElementById("startOp").value = picturesData[kepIndexBe][11] ;
    document.getElementById("startLight").value =  picturesData[kepIndexBe][12];
    document.getElementById("endX").value = picturesData[kepIndexBe][13] ;
    document.getElementById("endY").value =  picturesData[kepIndexBe][14];
    document.getElementById("endOp").value = picturesData[kepIndexBe][15] ;
   document.getElementById("endLight").value =  picturesData[kepIndexBe][16] ;
    document.getElementById("projLength").value =  picturesData[kepIndexBe][17];
    document.getElementById("mainDelay").value = picturesData[kepIndexBe][18] ;



}
*/


