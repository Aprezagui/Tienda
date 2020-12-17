<?php echo form_open("usuario/usuarioUpdate"); ?> 
<div class="registro" >
    <div class="titulo">
        Perfil
    </div>

    <span class="mError"><?php echo validation_errors();?></span>
            
    <div class="campo">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $Usuario[0]['usuario_nombre']; ?>"/>
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" value="<?php echo $Usuario[0]['usuario_apellidos']; ?>"/>
        <label for="telefono">Telefono:</label>
        <input type="text" name="telefono" value="<?php echo $Usuario[0]['usuario_telefono'] ?>"/>
    </div>

    <div class="campo">
        <label for="email">Email:</label>
        <input type="text" name="email" id="username" value="<?php echo $Usuario[0]['usuario_email'] ?>"/>
    </div>

    <div class="campo">
        <label for="fecha">Fecha registro:</label>
        <input type="text" name="fecha" value="<?php echo $Usuario[0]['usuario_date'] ?>" readonly/>
    </div>

    <span class="mPassword" id="mPassword" onclick="cambiarPassword()">Cambiar contraseña</span>
    <div class="campo" id="campoPassword" hidden=true>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="pass1" onkeyup="validar_clave()" value="<?php echo set_value('password'); ?>"
            title="La contraseña debe tener un mínimo de 6 caracteres alfanuméricos: &#10;Con almenos un número, una mayúscula, una minúscula."/>
        <img hidden="true"  id="invalid_pass1_img" src='<?php echo base_url('img/field_invalid.gif');?>' alt="Contraseña demasiado debil" title="ContraseÃ±a demasiado debil"/>
        <img hidden="true"  id="valid_pass1_img" src='<?php echo base_url('img/field_valid.gif');?>' alt="Contraseña fuerte" title="Contraseña fuerte"/>
        <span class="mensaje" id="mensaje2" hidden=true> </span>
        <br>
        <label for="pass2">Confirmar contraseña:</label>
        <input  type="password" name="pass2" id="pass2" onkeyup="validar_segunda_clave()" value="<?php echo set_value('pass2'); ?>"/>
        <img hidden="true" id="invalid_pass2_img" src='<?php echo base_url('img/field_invalid.gif');?>' alt="La contraseña no coinciden" title="La contraseÃ±a no coinciden"></img>              
        <img hidden="true" id="valid_pass2_img" src='<?php echo base_url('img/field_valid.gif');?>' alt="La contraseña coinciden" title="La contraseÃ±a coinciden"></img> 
    </div>

    <?php
        echo '<br>';
        echo '<div class="campo">';
        echo '<label class="dirreccion"><a href="' . site_url('direccion') . '">Añadir direccion</a></label>';
        echo '</div>';
        
        $cont=0;
        if(isset($Direccion)){
            echo "<div class='campo'>";
            echo "<label for='direccion' style='text-align: left !important;'>Dirección:</label><br>";
            foreach($Direccion as $direccion){
                echo '<textarea rows="1" cols="45">'. $direccion['direccion_direccion'] . '</textarea>'; 
                    echo '<a class="btnborrar" href="'. site_url('delete_direccion/'.$direccion['direccion_id']) .'">';
                        echo '<svg width="14px" height="14px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="var(--ci-primary-color, currentColor)" d="M96,472a23.82,23.82,0,0,0,23.579,24H392.421A23.82,23.82,0,0,0,416,472V152H96Zm32-288H384V464H128Z" class="ci-primary"/>
                                <rect width="32" height="200" x="168" y="216" fill="var(--ci-primary-color, currentColor)" class="ci-primary"/>
                                <rect width="32" height="200" x="240" y="216" fill="var(--ci-primary-color, currentColor)" class="ci-primary"/>
                                <rect width="32" height="200" x="312" y="216" fill="var(--ci-primary-color, currentColor)" class="ci-primary"/>
                                <path fill="var(--ci-primary-color, currentColor)" d="M328,88V40c0-13.458-9.488-24-21.6-24H205.6C193.488,16,184,26.542,184,40V88H64v32H448V88ZM216,48h80V88H216Z" class="ci-primary"/>
                            </svg>';    
                    echo '</a>';
                echo "<br>"; 
                $cont=$cont+1;
            }
            echo "</div>";
        }
       
    ?> 
    <button type="submit">Guardar</button>    
</div> 

<?php echo form_close(); ?>