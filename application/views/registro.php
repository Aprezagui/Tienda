<div class="registro" >
        <form name="formulario" action ="loginUsuario" method="post">
            
            <div class="titulo">
               ¡Regístrate!
            </div>
            
            <div class="campo">
                <label for="usuario">Nombre:</label>
                <input type="text" name="nombre"/>
                <label for="usuario">Primer apellido:</label>
                <input type="text" name="apellido1" />
                <label for="usuario">Segundo apellido:</label>
                <input type="text" name="apellido2" />
            </div>
            
            <div class="campo">
                <label for="usuario">Nombre usuario:</label>
                <input type="text" name="username" onchange="validar_username()" />
                <img hidden="true"  id="autov_username_img" src="img/field_check.gif" alt="Nombre de usuario ocupado" title="Nombre de usuario ocupado"/>
            </div>
            
            <div class="campo">
                <label for="usuario">Email:</label>
                <input type="text" name="email" />
            </div>
            
            <div class="campo">
                <label for="pass1">Contraseña:</label>
                <input type="password" name="pass1" id="pass1" onkeyup="validar_clave()"
                title="La contraseña debe tener un mmánimo de 6 caracteres alfanumúricos: &#10;Con almenos un número, una mayúscula, una minúscula y un carácter especial."/>
                <img hidden="true"  id="autov_pass1_img" src="img/field_invalid.gif" alt="Contraseña demasiado debil" title="ContraseÃ±a demasiado debil"/>
                <span class="mensaje" id="mensaje2"> </span>
            </div>
            
            <div class="campo">
                <label for="pass2">Confirmar contraseña:</label>
                <input  type="password" name="pass2" id="pass2" onkeyup="validar_segunda_clave()"/>
                <img hidden="true" id="autov_pass2_img" src="img/field_invalid.gif" alt="La contraseña no coinciden" title="La contraseÃ±a no coinciden"></img>              
            	
            </div>
            
            <div class="boton">         
               	<input hidden="true" type="text" name="acction2" value="enviar" />
            	<input  type="submit" id="submit_registro" name="acction" value="enviar" />
            </div>
            
        </form>
    </div> 
