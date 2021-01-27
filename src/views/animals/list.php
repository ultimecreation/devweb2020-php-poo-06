<div class="container">
    <h1>Liste des animaux</h1>
      
    <section> 
    <div class="row ">
        <?php foreach($data['animals'] as $animal):?>
          
           <div class=" col-sm-6 col-md-4">
            <article>
                <div class="card m-3">
                    <div class="card-body mx-auto">
                        <figure>
                            <img src="<?php echo publicUrl("/uploads/animals/default.jpg");?>" alt="" class="img-fluid">
                            <figcaption>
                                <p class="mt-3"><?php echo $animal->name;?></p>
                            </figcaption>
                        </figure>
                        <form action="">
                            <input type="hidden" name="animalToAdopt" value="<?php echo $animal->id;?>">
                            <input type="submit" value="Adopter" class="btn-outline-primary btn-block ">
                        </form>
                    </div>
                    <div class="card-footer">
                        <ul class="list-unstyled">
                            <li class="d-flex justify-content-around">
                                <span>Race</span>
                                <span><?php echo $animal->type ;?></span>
                            </li>
                            <li class="d-flex justify-content-around">
                                <span>Faim</span>
                                <span><?php echo $animal->hunger_level ;?> %</span>
                            </li>
                            <li class="d-flex justify-content-around">
                                <span>Soif</span>
                                <span><?php echo $animal->thirst_level ;?> %</span>
                            </li>
                            <li class="d-flex justify-content-around">
                                <span>Vitalité</span>
                                <span><?php echo $animal->global_health ;?> %</span>
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