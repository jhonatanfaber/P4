function validar(){
    var ma=document.formulario.marca.value;
    var error1= document.getElementById("errorMarca");
    error1.innerHTML='';
    if(ma.length < 3){
        error1.innerHTML='Debe tener al menos 3 caracteres';
        return false;
    }
    var sto=document.formulario.stock.value;
    var error2= document.getElementById("errorStock");
    error2.innerHTML='';
    if(sto <0){
        error2.innerHTML='Valores negtivos  no validos';
        return false;
    }
    
    var p=document.formulario.pvp.value;
    var error3= document.getElementById("errorPrecio");
    error3.innerHTML='';
    if(p < 0){
        error3.innerHTML='Valores negtivos  no validos';
        return false;
    }
    return true;
}