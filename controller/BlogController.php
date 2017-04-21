<?php
require_once '../repository/BlogRepository.php';

class BlogController
{
    public function index()
    {
        $blogRepository = new BlogRepository();

        $view = new View('blog_index');

        $view->title = 'Homepage';
        $view->heading = '';
        $view->entry = $blogRepository->readAllSortedByNewest();
        $view->display();
    }
    public function create()
    {
        if(Security::isAuthenticated()){
            $view = new View('blog_create');
            $view->title = 'Submit Image';
            $view->heading = 'Submit Image';
            $view->display();
        }
    echo'Sie sind nicht angemeldet';

    }
    public function doCreate()
    {
        if ($_POST['send']) {
            $destination = "images/uploads";
            $picture_array = $_FILES['picture'];
            $picture = $destination.'/';
            $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
            $title = htmlspecialchars($_POST['title']);
            $date = date("Y-m-d");
            $private = isset($_POST['private']);


            $creator =  Security::getUser()->email;

            $blogRepository = new BlogRepository();
            if($ext == "jpg"|| $ext == "gif" || $ext == "png" || $ext == "svg"){
                $insertId = $blogRepository->upload($picture, $title, $date, $creator , $private);
            }
            if($insertId > 0)
            {
                $dst = $picture.$insertId.'.'.$ext;

                if (move_uploaded_file($picture_array['tmp_name'], $dst)) {
                    $blogRepository->update_picture($insertId, $dst);
                }
            }else{
                echo'Sie können nur Bilder hochladen!';
            }

        }
        header('Location: /blog');
    }
    public function delete()
    {
        if (Security::isAuthenticated() && isset($_GET['id'])) {
            $blogId = $_GET['id'];

            $blogRepository = new BlogRepository();

            $blog = $blogRepository->readById($blogId);

            if (($blog->creator == Security::getUser()->email)|| Security::isAdmin()) {

                $path = $blogRepository->get_picture_path($blogId);

                if ($blogRepository->deleteById($blogId)) {
                    unlink($path);

                }
            }
        }
        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    public function privateBlog(){
        $blogRepository = new BlogRepository();

        $view = new View('blog_private');

        $view->title = 'Your Submission';
        $view->heading = 'Profile';
        $view->entry = $blogRepository->readAllPrivate();
        $view->display();
    }
}