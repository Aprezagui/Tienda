<div class="login">

<div class="campo">
    <label for="email">Email:</label>
    <input type="text" name="email" />
</div>
            
<div class="campo">
    <label for="pass1">Contraseña:</label>
    <input type="password" name="pass1" id="pass1" onkeyup="validar_clave()"
    title="La contraseña debe tener un mmánimo de 6 caracteres alfanumúricos: &#10;Con almenos un número, una mayúscula, una minúscula y un carácter especial."/>
    <img hidden="true"  id="autov_pass1_img" src="img/field_invalid.gif" alt="Contraseña demasiado debil" title="ContraseÃ±a demasiado debil"/>
    <span class="mensaje" id="mensaje2"> </span>
</div>