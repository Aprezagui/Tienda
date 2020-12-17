<?php echo form_open("usuario/chekdireccion"); ?> 
<div class="registro" >
    <div class="titulo">
        Dirección
    </div>

    <div>
        <span class="mError"><?php echo validation_errors();?></span>
    </div>

    <div class="campo">
        <label for="calle">Calle:</label>
        <input type="text" name="calle" value="<?php echo set_value('calle'); ?>"/>
        <label for="numero">Numero:</label>
        <input type="text" name="numero" value="<?php echo set_value('numero'); ?>"/>
        <label for="localidad">Localidad:</label>
        <input type="text" name="localidad" value="<?php echo set_value('localidad'); ?>"/>
        <label for="provincia">Provincia:</label>
        <input type="text" name="provincia" value="<?php echo set_value('provincia'); ?>"/>
        <label for="cPostal">Codigo postal:</label>
        <input type="text" name="cPostal" value="<?php echo set_value('cPostal'); ?>"/>
    </div>

    <button type="submit">Guardar</button>    
</div> 

<?php echo form_close(); ?>
