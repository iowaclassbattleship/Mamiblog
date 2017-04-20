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
            $emailRegex = '/^(?:[a-z0-9!#$%&\'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/';
            $pwdRegex = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';

            $error = false;



            if (!preg_match($emailRegex, $_POST['email'])) {
                $error = true;
                Error::set("user_create_email", "E-Mail nicht korrekt");
            }





            $firstName = htmlspecialchars($_POST['firstName']);
            $lastName = htmlspecialchars($_POST['lastName']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);


            if (!$error) {
                $userRepository = new UserRepository();
                $userRepository->create($firstName, $lastName, $email, $password);

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
