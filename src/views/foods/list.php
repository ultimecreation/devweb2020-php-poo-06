<div class="container">
    <h1>Liste des aliments</h1>

    <section> 
    <div class="row ">
        <?php foreach($data['foods'] as $food):?>
          
           <div class=" col-sm-6 col-md-4">
            <article>
                <div class="card m-3">
                    <div class="card-body mx-auto">
                        <figure>
                            <img src="<?php echo publicUrl("/uploads/foods/{$food->img}");?>" alt="" class="img-fluid">
                            <figcaption>
                                <p class="mt-3"><?php echo $food->name;?></p>
                            </figcaption>
                        </figure>
                        <form action="">
                            <input type="hidden" name="animalToAdopt" value="<?php echo $animal->id;?>">
                            <input type="submit" value="Acheter" class="btn-outline-primary btn-block ">
                        </form>
                    </div>
                    <div class="card-footer">
                    <ul class="list-unstyled">
                            <li class="d-flex justify-content-around">
                                <span>Quantité</span>
                                <span><?php echo $food->quantity ;?></span>
                            </li>
                            <li class="d-flex justify-content-around">
                                <span>Énergie</span>
                                <span><?php echo $food->energy ;?></span>
                            </li>                           
                        </ul>
                    </div>
                </div>
            </article>
           </div>
        <?php endforeach;?>
            </div>
    </section>
</div>