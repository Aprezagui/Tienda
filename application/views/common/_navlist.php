    <nav>
        <ul>
            <li><a href='<?php echo site_url();?>'>Home</a></li>
            <li class="dropdown">
                <a href="">Productos</a>
                <div class="dropdown-content" >
                    <?php
                        if(isset($Categorias))
                        for ($i=0; $i<count($Categorias); $i++) {
                            echo '<div class="dropdownSub">';
                            echo '  <a href="'. site_url('home/producto/'.$Categorias[$i]['categoria_id']).'">' .$Categorias[$i]['categoria_id']. " " . $Categorias[$i]['categoria_nombre'] . '</a>';
                            if(isset($Categorias[$i]['Subcategorias'])){
                                echo '<div class="dropdownSub-content">';
                                for ($e=0; $e<count($Categorias[$i]['Subcategorias']); $e++) {
                                    echo '<a href="'. site_url('home/producto/'.$Categorias[$i]['Subcategorias'][$e]['categoria_id']).'">' .$Categorias[$i]['Subcategorias'][$e]['categoria_id']." " . $Categorias[$i]['Subcategorias'][$e]['categoria_nombre'] . '</a>';
                                }
                                echo '</div>';
                            }
                            echo '</div>';
                        } 
                    ?>
                </div>  
            </li>    
            <li class="dropdown" style="float:right;">
                <?php
                    if(isset($_SESSION["user_name"])){
                        echo '<a href="' . site_url('login') .'"><svg width="14px" height="14px" viewBox="0 0 32 32" role="img" fill="#fff" xmlns="http://www.w3.org/2000/svg"><path d="M16 4c3.3137 0 6 2.6863 6 6s-2.6863 6-6 6-6-2.6863-6-6 2.6863-6 6-6zm0 2c-2.2091 0-4 1.7909-4 4 0 2.2091 1.7909 4 4 4 2.2091 0 4-1.7909 4-4 0-2.2091-1.7909-4-4-4zM8.479 18.682L10 18.4518a40.0782 40.0782 0 0 1 12 0l1.521.2304c2.58.3909 4.479 2.51 4.479 4.9982V26C28 27.1045 27.0598 28 25.9 28H6.1C4.9402 28 4 27.1045 4 25.9999v-2.3196c0-2.4882 1.899-4.6073 4.479-4.9982zM6 26h20v-2.0475c0-1.517-.9188-2.8089-2.167-3.0472l-1.69-.3226c-4.0697-.777-8.2163-.777-12.286 0l-1.69.3226C6.9189 21.1436 6 22.4356 6 23.9525V26z"></path></svg> ' . $_SESSION["user_name"] . '</a>';        
                    }else{
                        echo '<a href="' . site_url('login') . '"><svg width="14px" height="14px" viewBox="0 0 32 32" role="img" fill="#fff" xmlns="http://www.w3.org/2000/svg"><path d="M16 4c3.3137 0 6 2.6863 6 6s-2.6863 6-6 6-6-2.6863-6-6 2.6863-6 6-6zm0 2c-2.2091 0-4 1.7909-4 4 0 2.2091 1.7909 4 4 4 2.2091 0 4-1.7909 4-4 0-2.2091-1.7909-4-4-4zM8.479 18.682L10 18.4518a40.0782 40.0782 0 0 1 12 0l1.521.2304c2.58.3909 4.479 2.51 4.479 4.9982V26C28 27.1045 27.0598 28 25.9 28H6.1C4.9402 28 4 27.1045 4 25.9999v-2.3196c0-2.4882 1.899-4.6073 4.479-4.9982zM6 26h20v-2.0475c0-1.517-.9188-2.8089-2.167-3.0472l-1.69-.3226c-4.0697-.777-8.2163-.777-12.286 0l-1.69.3226C6.9189 21.1436 6 22.4356 6 23.9525V26z"></path></svg> Cuenta</a>';
                    }
                ?>       
               
                <div class="dropdown-content">
                    <?php
                        if(!isset($_SESSION["rol"])){
                            echo '<a href="' . site_url('registro') . '">¿Primera visita? Registrate</a>';
                            echo "<hr/>";
                        } 
                    ?>
                    <a href="<?php echo site_url('miperfil');?>">Mi perfil</a>
                    <a href="<?php echo site_url('home/vista/pedidos');?>">Mis pedidos</a>
                    <?php
                        if(isset($_SESSION["rol"])) {
                            if($_SESSION["rol"]=="ADMINISTRADOR"){ 
                                echo '<a href="' . site_url('home/vista/admin') . '">Administrar</a>';
                            }
                            echo "<hr/>";
                            echo '<a href="' . site_url('logout') .'">Desconexion</a>';
                        } 
                    ?>
                </div>
            </li> 
            <li style="float:right;">
                <a href='<?php echo site_url('home/vista/cesta');?>'>
                <svg width="14px" height="14px" viewBox="0 0 32 32" role="img" fill="#fff" xmlns="http://www.w3.org/2000/svg"><path d="M6.51 6H4c-.5523 0-1-.4477-1-1s.4477-1 1-1h3.3606a1 1 0 0 1 .987.8396l.524 3.2229H27c.6128 0 1.0815.5462.9884 1.1518l-1.6803 10.9375a1 1 0 0 1-.9884.8482H9.7989a1 1 0 0 1-.987-.8396L6.51 6zm2.6867 4.0625L10.6494 19h13.8122l1.373-8.9375H9.1966zM24 29c-1.6569 0-3-1.3431-3-3s1.3431-3 3-3 3 1.3431 3 3-1.3431 3-3 3zm0-2c.5523 0 1-.4477 1-1s-.4477-1-1-1-1 .4477-1 1 .4477 1 1 1zm-13 2c-1.6569 0-3-1.3431-3-3s1.3431-3 3-3 3 1.3431 3 3-1.3431 3-3 3zm0-2c.5523 0 1-.4477 1-1s-.4477-1-1-1-1 .4477-1 1 .4477 1 1 1z"></path></svg>
                Cesta
                </a>
            
            </li>          
        </ul>    
    </nav>
