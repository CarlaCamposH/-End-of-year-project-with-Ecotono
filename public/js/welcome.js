var comp;
window.onload = function() {

        var valor=getCookie("cookieAnunciement");
        console.log(valor);
        if(valor=="true"){
            document.getElementById("cookie").style.display="none";
            
        }

    
  };
function ModifyCookie(){
   
    comp=document.cookie="cookieAnunciement=true; expires=Thu, 18 Dec 2022 12:00:00 UTC";
  
   var valor=getCookie("cookieAnunciement");
   console.log(valor);
    if(valor=="true"){
        document.getElementById("cookie").style.display="none";
        
    }
    
}
function ModifyCookie2(){  
        document.getElementById("cookie").style.display="none";    
}


function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i < ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) == ' ') {
            c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
          }
        }
        return "";
      }

