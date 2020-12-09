    <nav>
        <ul>
            <li><a href='<?php echo site_url();?>'>Home</a></li>
            <li class="dropdown">
                <a href="">Productos</a>
                <div class="dropdown-content" >
                    <?php
                        for ($i=0; $i<count($Categorias); $i++) {
                            echo '<a href="#">' .  $Categorias[$i]['categoria_nombre'] . '</a>';
                        }
                    ?>
                </div>  
            </li>    
            <li class="dropdown" style="float:right;">
                <a href='<?php echo site_url('usuario/login');?>'>Cuenta</a>
                <div class="dropdown-content">
                    <?php
                        if(!isset($_SESSION["rol"])){
                            echo '<a href="' . site_url('usuario/inscripcion') . '">¿Primera visita? Registrate</a>';
                            echo "<hr/>";
                        } 
                    ?>
                    <a href="<?php echo site_url('usuario/perfil');?>">Mi perfil</a>
                    <a href="<?php echo site_url('usuario/pedidos');?>">Mis pedidos</a>
                    <?php
                         if(isset($_SESSION["rol"])) {
                            echo "<hr/>";
                            echo '<a href="' . site_url('usuario/logout') .'">Desconexion</a>';
                        } 
                    ?>
                </div>
            </li>           
        </ul>    
    </nav>
    

