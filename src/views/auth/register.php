<div class="container">
    <h1>Inscription</h1>

    <form action="" method="POST">
        <div class="form-group">
           <label for="username">Nom</label>
           <input 
                type="text" 
                name="username" 
                id="username" 
                class="form-control <?php echo $data['errors']['username'] != null ? 'is-invalid':'';?>"
                value="<?php echo $data['user']->username ?? '';?>">
                
           <div class="invalid-feedback">
                <?php echo $data['errors']['username'];?>
            </div>
        </div>
        <div class="form-group">
           <label for="email">Email</label>
           <input 
                type="email" 
                name="email" 
                id="email" 
                class="form-control <?php echo $data['errors']['email'] != null ? 'is-invalid':'';?>"
                value="<?php echo $data['user']->email ?? '';?>">
           <div class="invalid-feedback">
                <?php echo $data['errors']['email'];?>
            </div>
        </div>
        <div class="form-group ">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
       
        <div class="form-group">
           <label for="farm_name">Nom de ma ferme</label>
           <input 
                type="text" 
                name="farm_name" 
                id="farm_name" 
                class="form-control"
                value="<?php echo $data['user']->farm_name ?? '';?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>