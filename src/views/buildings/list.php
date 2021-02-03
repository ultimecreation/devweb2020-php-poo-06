<div class="container">
    <h1>Liste des Buildings</h1>
    <section> 
    <div class="row ">
   
        <?php foreach($data['buildings'] as $building):?>
          
           <div class=" col-sm-6 col-md-4 h-100">
            <article>
                <div class="card m-3">
                    <div class="card-body mx-auto">
                        <figure>
                            <img src="<?php echo publicUrl("/uploads/buildings/{$building->img}");?>" alt="" class="img-fluid">
                            <figcaption>
                                <p class="mt-3"><?php echo $building->name;?></p>
                            </figcaption>
                        </figure>
                        <form action="">
                            <input type="hidden" name="buildingToBuy" value="<?php echo $building->id;?>">
                            <?php if($building->level_id <= $data['current_farm']->level_id):?>
                                <input 
                                    type="submit" 
                                    value="Acheter" 
                                    class="btn-primary btn-block" 
                                    >
                            <?php else:?>
                                <input 
                                    type="submit" 
                                    value="Acheter" 
                                    class="btn-outline-primary btn-block" 
                                    disabled>
                            <?php endif;?>
                           
                        </form>
                    </div>
                    <div class="card-footer">
                        <p><?php echo $building->description;?></p>
                        <ul class="list-group list-unstyled">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Niveau : </span>
                                <span>
                                    <?php echo $building->level;?>
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Coût : </span>
                                <span>
                                    <?php echo "{$building->cost} pts";?>
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Tps d'attente : </span>
                                <span>
                                    <?php echo "{$building->timespan} h";?>
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Ratio : </span>
                                <span>
                                    <?php echo "x {$building->rate}";?>
                                </span>
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