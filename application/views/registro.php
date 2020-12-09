<?php echo form_open("usuario/chekinscripcion"); ?> 
<div class="registro" >
    <div class="titulo">
        ¡Regístrate!
    </div>
            
    <div class="campo">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre"/>
        <label for="apellidos">apellidos:</label>
        <input type="text" name="apellidos"/>
    </div>

    <div class="campo">
        <label for="email">Email:</label>
        <input type="text" name="email"/>
    </div>
            
    <div class="campo">
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="pass1" onkeyup="validar_clave()"
            title="La contraseña debe tener un mmánimo de 6 caracteres alfanumúricos: &#10;Con almenos un número, una mayúscula, una minúscula y un carácter especial."/>
        <img hidden="true"  id="invalid_pass1_img" src='<?php echo base_url('img/field_invalid.gif');?>' alt="Contraseña demasiado debil" title="ContraseÃ±a demasiado debil"/>
        <img hidden="true"  id="valid_pass1_img" src='<?php echo base_url('img/field_valid.gif');?>' alt="Contraseña fuerte" title="Contraseña fuerte"/>
        <span class="mensaje" id="mensaje2"> </span>
    </div>    
    <div class="campo">
        <label for="pass2">Confirmar contraseña:</label>
        <input  type="password" name="pass2" id="pass2" onkeyup="validar_segunda_clave()"/>
        <img hidden="true" id="invalid_pass2_img" src='<?php echo base_url('img/field_invalid.gif');?>' alt="La contraseña no coinciden" title="La contraseÃ±a no coinciden"></img>              
        <img hidden="true" id="valid_pass2_img" src='<?php echo base_url('img/field_valid.gif');?>' alt="La contraseña coinciden" title="La contraseÃ±a coinciden"></img> 
    </div>
    <button type="submit">Login</button>    
</div> 

<?php echo form_close(); ?>
