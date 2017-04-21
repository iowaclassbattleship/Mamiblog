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
                Error::set("user_create_email", "E-Mail nicht korrekt");
            }

            $firstName = htmlspecialchars($_POST['firstName']);
            $lastName = htmlspecialchars($_POST['lastName']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);


            if (!$error) {
                $userRepository = new UserRepository();
                if(!$userRepository->create($firstName, $lastName, $email, $password)){
                    Error::set("user_create_email", "Es existiert schon ein User mit dieser Email-adresse.");
                    die();
                }

                // Anfrage an die URI /user weiterleiten (HTTP 302)
                header('Location: /user');
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
        $view = new View('user_login');
        $view->title = 'Login';
        $view->heading = 'Login';
        $view->display();
    }
    public function doLogin()
    {
        if ($_POST['send']) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userRepository = new UserRepository();
            $userRepository->login($email,$password);
        }

    }
    public function logout()
    {

        SESSION_DESTROY();
        header('Location: /blog');
    }

}
