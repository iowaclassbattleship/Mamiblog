<?php
require_once '../repository/BlogRepository.php';

class BlogController
{
    public function index()
    {
        $blogRepository = new BlogRepository();

        $view = new View('blog_index');

        $view->title = 'Blog';
        $view->heading = 'Blog';
        $view->entry = $blogRepository->readAll();
        $view->display();
    }
    public function create()
    {
        $view = new View('blog_create');
        $view->title = 'Submit Image';
        $view->heading = 'Submit Image';
        $view->display();

    }
    public function doCreate()
    {
        if ($_POST['send']) {
            $destination = "images/uploads";
            $picture_array = $_FILES['picture'];
            $picture = $destination.'/';
            $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
            $title = htmlspecialchars($_POST['title']);
            $date = date("Y.m.d");

            $creator = $_SESSION['user'];

            $blogRepository = new BlogRepository();

            $insertId = $blogRepository->upload($picture, $title, $date, $creator);

            if($insertId > 0)
            {
                $dst = $picture.$insertId.'.'.$ext;

                if (move_uploaded_file($picture_array['tmp_name'], $dst)) {
                    $blogRepository->update_picture($insertId, $dst);
                }
            }

        }
        header('Location: /blog');
    }
    public function delete()
    {
        $blogRepository = new BlogRepository();
        $path = $blogRepository->get_picture_path($_GET['id']);

        if($blogRepository->deleteById($_GET['id'])){
            unlink($path);

        }
        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /blog');
    }

}