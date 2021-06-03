

<div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4 mt-3">

    <div class="col">
        <select id="mainFilterCategory" class="form-select form-select-lg mb-3 mainFilterCategory" aria-label=".form-select-lg example">
            <option selected>Categoria</option>
            <?php foreach($categories as $p){ ?>

                <option value="<?php echo $p['categorie'];?>">
                <?php echo $p['categorie'];  ?></option>

             <?php } ?>
        </select>
    </div>

</div>



<div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">

    <?php foreach($products as $p){ ?>

        <div class="col filterCategory <?php echo $p['categorie']; ?>">
            <div class="card">
                <img src="<?php echo site_url('resources/img/platillos/'.$p['img']);?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $p['names'];  ?></h5>
                    <h6 class="card-title"> <?php echo '<small class="text-muted"> <strike>S/.'.$p['price'].'</strike></small> '
                    .'<strong class="text-danger"> S/.'.($p['price']-$p['discount']).'</strong>';  ?></h6>
                    <p class="card-text">   <?php echo $p['description']; ?></p>
                </div>
                <div class="card-footer text-end">
                    <a href="#" class="btn btn-primary">Comprar</a>
                    <a href="#" class="btn btn-primary">Agregar</a>
                </div>
            </div>
        </div>

        <div class="col filterCategory <?php echo $p['categorie']; ?>">
            <div class="card">
                <img src="<?php echo site_url('resources/img/platillos/'.$p['img']);?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $p['names'];  ?></h5>
                    <h6 class="card-title"> <?php echo '<small class="text-muted"> <strike>S/.'.$p['price'].'</strike></small> '
                    .'<strong class="text-danger"> S/.'.($p['price']-$p['discount']).'</strong>';  ?></h6>
                    <p class="card-text">   <?php echo $p['description']; ?></p>
                </div>
                <div class="card-footer text-end">
                    <a href="#" class="btn btn-primary">Comprar</a>
                    <a href="#" class="btn btn-primary">Agregar</a>
                </div>
            </div>
        </div>

    <?php } ?>

</div>