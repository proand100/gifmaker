function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  //document.getElementById(cityName).style.display = "block";
  if(cityName === "1.picture"){
    document.write(" <p>1. picture display!</p>");
  }
  if(cityName === "Paris"){
    document.write(" <p>EZ PARIS</p>");
  }
  if(cityName === "Tokyo"){
    document.write(" <p>EZ TOKYO</p>");
  }
  evt.currentTarget.className += " active";
}
