  function Confirmar(id){
    document.getElementById(id).style.display = "none";
    
    var num=id.split("_")[1];
    
    document.getElementById("confirmar"+""+num).style.display = "block";
    document.getElementById("cancelar"+""+num).style.display = "block";


  }
  function Back(){
    const tableRows = document.querySelectorAll('#rwd-table-id tr.tabla_valor');
    var index=1;
    
      for (index = 1; index < tableRows.length +1; index++) {
  
        document.getElementById("confirmar"+""+index).style.display = "none";
        document.getElementById("cancelar"+""+index).style.display = "none";
        document.getElementById("borrar_"+""+index).style.display = "block";
      }
  }