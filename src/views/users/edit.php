<div class="container">
    <h1>Modifier mes informations</h1>

    <form action="" method="POST">
        <div class="form-group">
           <label for="username">Nom</label>
           <input 
                type="text" 
                name="username" 
                id="username" 
                class="form-control <?php echo $data['errors']['username'] != null ? 'is-invalid':'';?>"
                value="<?php echo $data['user']->username;?>" disabled>
                
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
                value="<?php echo $data['user']->email;?>">
           <div class="invalid-feedback">
                <?php echo $data['errors']['email'];?>
            </div>
        </div>
        <div class="form-group ">
            <label for="password">Nouveau Mot de passe</label>
            <input 
                type="text" 
                name="password" 
                id="password" 
                class="form-control"
                value="<?php echo $data['user']->password;?>"
                >
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>