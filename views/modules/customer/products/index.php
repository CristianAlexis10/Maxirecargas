    <div class="banner">
      <h1 class="title_banner">Categorías</h1>
    </div>
    <div class="banneritem Btoner">
      <div class="Btoner--content">
        <span><i class="fa fa-arrow-left" class="menuProduct" aria-hidden="true" id="pedAtras"></i></span>
        <h1 class="titleitem_banner" id="categoryName">Toner</h1>
      </div>
      <div class="container_search">
        <div class="search_input">
          <input type="search" id="readBy" placeholder="buscar por referencia,marca">
          <button type="button" name="button"  id="buscar" ><i class="fa fa-search" aria-hidden="true"></i>
          </button>
        </div>

      </div>
    </div>
    <div class="container--products">
      <div class="products">
      <?php
        foreach ($this->master->selectAll("tipo_producto") as $row) {?>
          <div class="item toner Btncategoria" id="<?php echo $row['tip_pro_nombre'] ?>">
            <img src="views/assets/image/category/<?php echo $row['tip_pro_imagen'] ?>">
            <h3 ><?php echo $row['tip_pro_nombre'] ?></h3>
          </div>
        <?php } ?>
      </div>
      <span class="menuProduct"><i class="fa fa-bars" aria-hidden="true" id="menu"></i><i class="fa fa-bars" aria-hidden="true" id="menu-mobile"></i></span>
    </div>
    <div class="container--grid"></div>
