    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="">Herramientas</a></li>    
            <li><a href="">Componentes</a></li>
            <li><a href="">Conectores y cables</a></li>
        </ul>    
    </nav>
    <?php
        for ($i=0; $i<count($Categorias); $i++) {
            echo $Categorias[$i]['categoria_nombre'] . " ";
        }

        //echo html_escape(implode($Categorias));
    ?>

