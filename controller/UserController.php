<?php
//import UserRepository
require_once '../repository/UserRepository.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    //default user view
    public function index()
    {
        $userRepository = new UserRepository();
        $view = new View('user_index');
        $view->title = 'User';
        $view->heading = 'User';
        $view->users = $userRepository->readAll();
        $view->display();
    }
    //create user view
    public function create()
    {
        $this->doCreate();
        $view = new View('user_create');
        $view->title = 'Register';
        $view->heading = 'Register';
        $view->display();
    }
    //create user function -> sends form data to UserRepository and validates email
    public function doCreate()
    {
        if (isset($_POST['send'])) {
            $error = false;
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                //email validation false, user gets a message
                $error = true;
                Message::set("user_create_email", "Email not correct.");
            }
            //protects from attackers
            $firstName = htmlspecialchars($_POST['firstName']);
            $lastName = htmlspecialchars($_POST['lastName']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            //if email correct, sends form data to Userrepository
            if (!$error) {
                $userRepository = new UserRepository();
                if(!$userRepository->create($firstName, $lastName, $email, $password)){
                    Message::set("user_create_email", "There is already a user with this email.");
                }else{
                    Message::set("user_create_email", "Registration successfull <a href=\"/user/login\">Login</a>");
                }
            }

        }

    }
    //User login view
    public function login(){
        $this->doLogin();
        $view = new View('user_login');
        $view->title = 'Login';
        $view->heading = 'Login';
        $view->display();
    }
    //user login function -> sends form data to UserRepository
    public function doLogin()
    {
        if (!empty($_POST['send'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userRepository = new UserRepository();
            if($userRepository->login($email,$password)){
                header('Location: /blog');
            }
        }

    }
    //delete function
    public function delete()
    {
        $userRepository = new UserRepository();
        //call to deleteByid
        $userRepository->deleteById($_GET['id']);
        header('Location: /user');
    }
    //logout function
    public function logout()
    {
        SESSION_DESTROY();
        header('Location: /blog');
    }

}
