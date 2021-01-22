<?php 

class AuthController extends Controller{

    private $errors = [];

    public function register()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $user = new stdClass();
            $user->username = htmlspecialchars($_POST['username']) ?? '';
            $user->email = htmlspecialchars($_POST['email']) ?? '';
            $user->password = htmlspecialchars($_POST['password']) ?? '';
            $user->farm_name = htmlspecialchars($_POST['farm_name']) ?? '';

            if($this->getModel('AuthModel')->isUsernameTaken($user->username) === true)
            {
                $this->errors['username'] = "Ce nom est déjà prit";
            }
            if($this->getModel('AuthModel')->isEmailTaken($user->email) === true)
            {
                $this->errors['email'] = "Cet email est déjà prit";
            }

            if(count($this->errors) != 0)
            {
                $data['errors'] = $this->errors;
                $data['user'] = $user;
                return $this->renderView('auth/register',$data);
            }
            else
            {
                $success = $this->getModel('AuthModel')->save($user);
                if($success)
                {
                    setFlashMessage("success","Compte Créé avec succès");
                    return redirectTo('/');
                }
            }
        }
        return $this->renderView('auth/register');
    }

    public function login()
    {
       if($_SERVER['REQUEST_METHOD'] === 'POST')
       {
        $user = new stdClass();
        $user->email = htmlspecialchars($_POST['email']) ?? '';
        $user->password = htmlspecialchars($_POST['password']) ?? '';

        $userExists = $this->getModel('AuthModel')->getUserByEmail($user->email);
            if($userExists)
            {
                if($userExists->password == $user->password)
                {
                    unset($userExists->password);
                    setUserData($userExists);
                    setFlashMessage('success',"Connexion réussie");
                    return redirectTo('/');
                }
            }
        }
        return $this->renderView('auth/login');
    }

    public function logout()
    {
        userLogoutRequest();
        setFlashMessage('success',"Déconnexion réussie");
        return redirectTo('/');
    }
}