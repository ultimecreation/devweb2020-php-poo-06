<?php 

class AuthController extends Controller{

    public function register(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $user = new stdClass();
            $user->username = htmlspecialchars($_POST['username']) ?? '';
            $user->email = htmlspecialchars($_POST['email']) ?? '';
            $user->password = htmlspecialchars($_POST['password']) ?? '';
            $user->password_confirm = htmlspecialchars($_POST['password_confirm']) ?? '';
            $user->farm_name = htmlspecialchars($_POST['farm_name']) ?? '';

            $this->getModel('AuthModel')->save($user);

        
            
        }
        return $this->renderView('auth/register');
    }

    public function login(){
       
        return $this->renderView('auth/login');
    }
}