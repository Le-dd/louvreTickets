var checkWarning = document.querySelector( ".checkWarning" );
if(checkWarning  ){
  checkWarning .addEventListener("change", function( event ) {
  var displayNoneWarning = document.querySelector( ".justify-rate" );
  if (checkWarning.checked == true){
    displayNoneWarning.className = displayNoneWarning.className.replace(/\btrans-block\b/g, "");
  } else {
    var name = "trans-block";
    var arr = displayNoneWarning.className.split(" ");
    if (arr.indexOf(name) == -1) {
        displayNoneWarning.className += " " + name;
    }
  }

  }, true);
}
