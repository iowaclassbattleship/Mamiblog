<?php

require_once '../repository/UserRepository.php';

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public function index()
    {
        $userRepository = new UserRepository();

        $view = new View('user_index');
        $view->title = 'User';
        $view->heading = 'User';
        $view->users = $userRepository->readAll();
        $view->display();
    }

    public function create()
    {
        $this->doCreate();

        $view = new View('user_create');
        $view->title = 'Register';
        $view->heading = 'Register';
        $view->display();
    }

    public function doCreate()
    {
        if (isset($_POST['send'])) {

            $error = false;

            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $error = true;
                Message::set("user_create_email", "Email not correct.");
            }

            $firstName = htmlspecialchars($_POST['firstName']);
            $lastName = htmlspecialchars($_POST['lastName']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);


            if (!$error) {
                $userRepository = new UserRepository();
                if(!$userRepository->create($firstName, $lastName, $email, $password)){
                    Message::set("user_create_email", "There is already a user with this email.");
                }else{
                    Message::set("user_create_email", "Registration successfull <a href=\"/user/login\">Login</a>");
                }

                // Anfrage an die URI /user weiterleiten (HTTP 302)
            }

        }

    }


    public function delete()
    {
        $userRepository = new UserRepository();
        $userRepository->deleteById($_GET['id']);
        header('Location: /user');
    }
    public function login(){
        $this->doLogin();

        $view = new View('user_login');
        $view->title = 'Login';
        $view->heading = 'Login';
        $view->display();
    }
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
    public function logout()
    {

        SESSION_DESTROY();
        header('Location: /blog');
    }

}
