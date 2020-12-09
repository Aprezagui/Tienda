<section class="flex-container">
<?php
for ($i=0; $i<count($Productos); $i++) {
  echo '<div class="product">';
  echo '  <div class="product-img">';
  echo '    <img src=' . base_url('img/productos/') . $Productos[$i]['producto_img'] . ' alt='. $Productos[$i]['producto_nombre'] . '>';
  echo '  </div>';
  echo '  <div class="product-info">';
  echo '    <h2 class="product-name">'. $Productos[$i]['producto_nombre'] .'</h2>';
  echo '    <h3 class="product-name2">' . $Productos[$i]['producto_descripcion'] .'</h3>';
  echo '    <div class="product-price">';
  echo '      <div class="price-box">';
  echo '        <span class="regular-price">';
  echo '          <span class="price">' . $Productos[$i]['producto_precio'] . '&nbsp;€</span>';
  echo '        </span>';
  echo '      </div>';
  echo '    </div>';
  echo '    <div class="product-addcart">';
  echo '      <a class="btn-cart" title="Añadir al carrito" href="#">Añadir al carrito</a>';
  echo '    </div>';
  echo '  </div>';
  echo '</div>';
}
?>
</section>


  