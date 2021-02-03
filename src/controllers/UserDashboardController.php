<?php

class UserDashboardController extends Controller{

    private $errors = [];

    public function index()
    {
        $data['user'] = $this->getModel('UserModel')->getUserById(getUserData('id'));
        
        
        return $this->renderView('users/index');
    }

    public function edit(){ 
        $data['user'] = $this->getModel('UserModel')->getUserById(getUserData('id'));
        if($_SERVER['REQUEST_METHOD'] ==='POST')
        {
            $user = new stdClass();
            $user->email = htmlspecialchars($_POST['email']) ?? '';
            $user->password = htmlspecialchars($_POST['password']) ?? '';

            if( getUserData('email') != $user->email)
            {
                if($this->getModel('AuthModel')->isEmailTaken($user->email)){
                    $this->errors['email'] = "Cet email est déjà prit";
                }
            }

            if(count($this->errors) > 0)
            {
                $data['errors'] = $this->errors;
                return $this->renderView('users/edit',$data);
            }
            
            $this->getModel('UserModel')->update($user);
                
            $updatedUser = $this->getModel('UserModel')->getUserById(getUserData('id'));
            //unset($updatedUser->password);
            setUserData($updatedUser);
            setFlashMessage('success',"Modification enregistrée");
            return redirectTo('/mon-compte');
        }
       
        return $this->renderView('users/edit',$data);
    }
}