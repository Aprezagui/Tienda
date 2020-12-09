<?php echo form_open("usuario/cheklogin"); ?>
    <div class="registro">
        <div class="titulo">
                ¡Login!
        </div>
        <div class="campo" style='text-align: center;'>
            <img src='<?php echo base_url('img/llave.ico');?>'></img>
        </div>
        <div class="campo">
            <label for="email">Email:</label>
            <input type="text" name="email"/>
        </div>   
        <div class="campo">
            <label for="password">Contraseña:</label>
            <input type="password" name="password"/>
        </div>
        <button type="submit">Login</button>    
    </div>
<?php echo form_close(); ?>
