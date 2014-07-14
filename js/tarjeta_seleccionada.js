function mostrar(){
imagen1 = document.getElementById("visa1");
check1 = document.getElementById("visa");
 if(check1.checked){
 imagen1.style.display='block'; 
 }
else{
  imagen1.style.display='none';
  }
imagen2 = document.getElementById("AmericanExpress");
check2 = document.getElementById("american_express");
 if(check2.checked){
 imagen2.style.display='block'; 
 }
else{
  imagen2.style.display='none';
  }
imagen3 = document.getElementById("cabal1");
check3 = document.getElementById("cabal");
 if(check3.checked){
 imagen3.style.display='block'; 
 }
else{
  imagen3.style.display='none';
  } 
 
imagen4 = document.getElementById("mastercard1");
check4 = document.getElementById("mastercard");
 if(check4.checked){
 imagen4.style.display='block'; 
 }
else{
  imagen4.style.display='none';
  } 
  
imagen5 = document.getElementById("TarjetaNaranja");
check5 = document.getElementById("tarjeta_naranja");
 if(check5.checked){
 imagen5.style.display='block'; 
 }
else{
  imagen5.style.display='none';
  } 
 
}