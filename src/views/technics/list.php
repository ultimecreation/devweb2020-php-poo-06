<div class="container">
    <h1>Liste des Techniques</h1>

    <section> 
    <div class="row ">
        <?php foreach($data['technics'] as $technic):?>
          
           <div class=" col-sm-6 col-md-4">
            <article>
                <div class="card m-3">
                    <div class="card-body mx-auto">
                        <figure>
                            <img src="<?php echo publicUrl("/uploads/technics/{$technic->img}");?>" alt="" class="img-fluid">
                            <figcaption>
                                <p class="mt-3"><?php echo $technic->name;?></p>
                            </figcaption>
                        </figure>
                        <form action="">
                            <input type="hidden" name="animalToAdopt" value="<?php echo $technic->id;?>">
                            <input type="submit" value="Acheter" class="btn-outline-primary btn-block ">
                        </form>
                    </div>
                    <div class="card-footer">
                        <p><?php echo $technic->description;?></p>
                    </div>
                </div>
            </article>
           </div>
        <?php endforeach;?>
            </div>
    </section>
</div>