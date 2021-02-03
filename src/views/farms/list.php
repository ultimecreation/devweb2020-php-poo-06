<div class="container">
    <h1>Mes Fermes</h1>


    <div class="row d-flex">
    <?php foreach($data['farms'] as $farm):?>
        <div class="col-md-6">
            <div class="card m-3">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <h2><?php echo $farm->name;?> </h2>
                    <small>Santé: <?php echo $farm->health;?></small>
                </div>
                <div class="card-footer">
                    <ul class="list-group lit-unstyled">
                        <li class="list-group-item">
                            <a href="<?php echo siteUrl("/batiments?ferme={$farm->id}");?>" class="list-item">batiments</a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?php echo siteUrl("/consommables?ferme={$farm->id}");?>" class="list-item">consommables</a>
                            
                        </li>
                        <li class="list-group-item">
                            <a href="<?php echo siteUrl("/techniques?ferme={$farm->id}");?>" class="list-item">techniques</a>
                            
                        </li>
                        <li class="list-group-item">
                            <a href="<?php echo siteUrl("/animaux?ferme={$farm->id}");?>" class="list-item">animaux</a>
                            
                        </li>   
                            
                        <li class="list-group-item">
                            <a href="<?php echo siteUrl("/aliments?ferme={$farm->id}");?>" class="list-item">aliments</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <?php endforeach;?>
    </div>
    
</div>