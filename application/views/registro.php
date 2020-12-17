<?php echo form_open("usuario/chekinscripcion"); ?> 
<div class="registro" >
    <div class="titulo">
        ¡Regístrate!
    </div>

    <div>
        <span class="mError"><?php echo validation_errors();?></span>
    </div>

    <div class="campo">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo set_value('nombre'); ?>"/>
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" value="<?php echo set_value('apellidos'); ?>"/>
        <label for="telefono">Telefono:</label>
        <input type="text" name="telefono" value="<?php echo set_value('telefono'); ?>"/>
    </div>

    <div class="campo">
        <label for="email">Email:</label>
        <input type="text" name="email" id="username" value="<?php echo set_value('email'); ?>"/>
    </div>
            
    <div class="campo">
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="pass1" onkeyup="validar_clave()" value="<?php echo set_value('password'); ?>"
            title="La contraseña debe tener un mínimo de 6 caracteres alfanumúricos: &#10;Con almenos un número, una mayúscula, una minúscula y un carácter especial."/>
        <img hidden="true"  id="invalid_pass1_img" src='<?php echo base_url('img/field_invalid.gif');?>' alt="Contraseña demasiado debil" title="ContraseÃ±a demasiado debil"/>
        <img hidden="true"  id="valid_pass1_img" src='<?php echo base_url('img/field_valid.gif');?>' alt="Contraseña fuerte" title="Contraseña fuerte"/>
        <span class="mensaje" id="mensaje2" hidden=true> </span>
        <br>
        <label for="pass2">Confirmar contraseña:</label>
        <input  type="password" name="pass2" id="pass2" onkeyup="validar_segunda_clave()" value="<?php echo set_value('pass2'); ?>"/>
        <img hidden="true" id="invalid_pass2_img" src='<?php echo base_url('img/field_invalid.gif');?>' alt="La contraseña no coinciden" title="La contraseÃ±a no coinciden"></img>              
        <img hidden="true" id="valid_pass2_img" src='<?php echo base_url('img/field_valid.gif');?>' alt="La contraseña coinciden" title="La contraseÃ±a coinciden"></img> 
    </div>
    <button type="submit">Login</button>    
</div> 

<?php echo form_close(); ?>
