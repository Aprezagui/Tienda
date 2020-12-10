<?php echo form_open("admin/cargar_archivo"); ?> 
<div class="registro">
    <div class="titulo">
        Regístro de producto
    </div>
    
    <div class="campo">
        <label for="nombre">Nombre del producto:</label>
        <input type="text" name="nombre"/>
    </div>
    
    <div class="campo">
        <textarea name="textarea" rows="5" cols="50" placeholder="Descricion"></textarea>
    </div>

    <div class="campo">
        <label for="precio">Precio:</label>
        <input type="text" name="precio"/>
        <label for="descuento">Descuento:</label>
        <input type="text" name="descuento"/>
        <label for="stock">Stock:</label>
        <input type="number" name="stock"/>
        <label for="activo">Activo:</label>
        <input type="checkbox" name="activo" value="true">
    </div>

    <div class="campo">
        <label for="image">Nueva imagen</label>
        <input type="file" name="mi_archivo">
    </div>

    <button type="submit">Enviar</button>    
</div> 
</form>
<?php echo form_close(); ?>