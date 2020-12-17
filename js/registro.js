/*@Autor Antonio Pérez Aguilera*/
   
function validar_clave(){
    var espacios = false
    var mayuscula = false;
    var minuscula = false;
    var numero = false;
    var caracter_raro = false;
    
    var pass1 = document.getElementById("pass1").value;
    
    if(pass1.length > 0){

         document.getElementById("invalid_pass1_img").hidden=false;
     
            
         for(var i = 0;i<pass1.length;i++){
            //Espacio en blanco
            if(pass1.charCodeAt(i) == 32){
                espacios=true;
                document.getElementById("mensaje2").innerHTML="La contraseña no puede tener espacio";
                document.getElementById("mensaje2").hidden=false;
                break;
            }else{
                document.getElementById("mensaje2").hidden=true;
            }
            
            //Tamaño minimo
            if(pass1.length >=6){
                
                if(pass1.charCodeAt(i) >= 65 && pass1.charCodeAt(i) <= 90){
                    mayuscula = true;
                }
                else if(pass1.charCodeAt(i) >= 97 && pass1.charCodeAt(i) <= 122){
                    minuscula = true;
                }
                else if(pass1.charCodeAt(i) >= 48 && pass1.charCodeAt(i) <= 57){
                    numero = true;
                }
                //else{
                  //  caracter_raro = true;
                //}
            }	
        }
     
    
        if(mayuscula == true && minuscula == true && /*caracter_raro == true &&*/ numero == true && espacios == false){
            document.getElementById("valid_pass1_img").hidden=false;
            document.getElementById("invalid_pass1_img").hidden=true;
            return true;
        }else{
            document.getElementById("valid_pass1_img").hidden=true;
            document.getElementById("invalid_pass1_img").hidden=false;
            return false;
        }
    
    }	
    document.getElementById("invalid_pass1_img").hidden=true;
    return false;
} 

function validar_segunda_clave(){
    
    var pass2 = document.getElementById("pass2").value;
    
    if(pass2.length > 0){
        document.getElementById("invalid_pass2_img").hidden=false;
    
        if(validar_clave()){
            var pass1 = document.getElementById("pass1").value;
            if(pass1==pass2){
                document.getElementById("invalid_pass2_img").hidden=true;
                document.getElementById("valid_pass2_img").hidden=false;
                return true;
            }else{
                document.getElementById("invalid_pass2_img").hidden=false;
                document.getElementById("valid_pass2_img").hidden=true;
            }
        }
    
    }else{
        document.getElementById("invalid_pass2_img").hidden=true;
    }
    return false;
} 

function cambiarPassword(){
    document.getElementById('mPassword').hidden=true;
    document.getElementById('campoPassword').hidden=false;
}
