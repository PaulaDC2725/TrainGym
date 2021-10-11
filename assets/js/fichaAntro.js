
function validarForm1() {
    let Fecha = document.getElementById('FechaFicha').value;
    let Estatura = document.getElementById('Estatura').value;
    let Peso = document.getElementById('Peso').value;
    let Descripcion = document.getElementById('descMedic').value;
    let craneo = document.getElementById('perCraneo').value;
    let bicep1 = document.getElementById('perBic1').value;
    let bicep2 = document.getElementById('perBic2').value;
    let muslo1 = document.getElementById('perMus1').value;
    let muslo2 = document.getElementById('perMus2').value;
    let cintura = document.getElementById('perCint').value;
    let brazo1 = document.getElementById('longExsup1').value;
    let brazo2 = document.getElementById('longExsup2').value;
    let pierna1 = document.getElementById('longExinf1').value;
    let pierna2 = document.getElementById('longExinf2').value;
    if ((Fecha == "")||(Estatura == "") || (Peso == "") || (Descripcion == "") || (craneo == "") || (bicep1 == "")|| (bicep2 == "")
    || (muslo1 == "")|| (muslo2 == "")|| (cintura == "")|| (brazo1 == "")|| (brazo2 == "")
    || (pierna1 == "")|| (pierna2 == ""))
    {
          swal("Ups!","Debe completar todos los campos","warning");
    }    
    else{ 
      document.getElementById('formFich').submit();

    }
  }