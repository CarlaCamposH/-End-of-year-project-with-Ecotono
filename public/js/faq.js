window.onload = function () {
    document.getElementById("texto_entrega").style.display = "none";
    document.getElementById("texto_devoluciones").style.display = "none";
    document.getElementById("texto_pago").style.display = "none";
    document.getElementById("texto_contactanos").style.display = "none";
   

  }
  
  function clickButton1() {
    document.getElementById("texto_entrega").style.display = "block";
    document.getElementById("texto_devoluciones").style.display = "none";
    document.getElementById("texto_pago").style.display = "none";
    document.getElementById("texto_contactanos").style.display = "none";
  
  }

  function clickButton2() {
    document.getElementById("texto_entrega").style.display = "none";
    document.getElementById("texto_devoluciones").style.display = "block";
    document.getElementById("texto_pago").style.display = "none";
    document.getElementById("texto_contactanos").style.display = "none";
  
  }

  function clickButton3() {
    document.getElementById("texto_entrega").style.display = "none";
    document.getElementById("texto_devoluciones").style.display = "none";
    document.getElementById("texto_pago").style.display = "block";
    document.getElementById("texto_contactanos").style.display = "none";
  
  }

  function clickButton4() {
    document.getElementById("texto_entrega").style.display = "none";
    document.getElementById("texto_devoluciones").style.display = "none";
    document.getElementById("texto_pago").style.display = "none";
    document.getElementById("texto_contactanos").style.display = "block";
  
  }