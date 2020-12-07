<?php
  $url_img = base_url() . "img/";

  echo <<< RAW
    <div class="product">
      <div class="product-img">
        <img src=$url_img . "resistencia2.jpg" alt="resistencia">
      </div>
      <div class="product-info">
        <h2 class="product-name">Resistencia</h2>
        <h3 class="product-name2"> 500ohm 1/2w </h3>
        <div class="product-price">          
          <div class="price-box">
            <span class="regular-price">	<!--span class="price-label"></span-->
              <span class="price">0,07&nbsp;€/unidad</span>                  <!-- <p class="iva-incluido"></p>-->
            </span>
          </div>
        </div>               
        <div class="product-addcart">                           
          <a class="btn-cart" title="Añadir al carrito" href="javascript:void(0);">Añadir al carrito</a>
        </div> 							
      </div>
    </div>
  RAW;      
?>