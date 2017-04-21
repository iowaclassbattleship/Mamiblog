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
            $this->doCreate();

            $view = new View('blog_create');
            $view->title = 'Submit Image';
            $view->heading = 'Submit Image';
            $view->display();

        }else{
            echo'You are not logged in!';
        }


    }
    public function doCreate()
    {
        if (isset($_POST['send'])) {
            $destination = "images/uploads";
            $picture_array = $_FILES['picture'];
            $picture = $destination.'/';
            $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
            $title = htmlspecialchars($_POST['title']);
            $date = date("Y-m-d");
            $private = isset($_POST['private']);


            $creator =  Security::getUser()->email;

            $blogRepository = new BlogRepository();

            if($ext == "jpg"|| $ext == "gif" || $ext == "PNG" || $ext == "svg") {
                $insertId = $blogRepository->upload($picture, $title, $date, $creator, $private);
                if ($insertId > 0) {
                    $dst = $picture . $insertId . '.' . $ext;
                    if (move_uploaded_file($picture_array['tmp_name'], $dst)) {
                        if($blogRepository->update_picture($insertId, $dst)){
                            if ($private == 'true') {
                                Message::set("upload", "Upload successful! Go to <a href=\"/blog/privateBlog\">Private Blog</a>");
                            } else {
                                Message::set("upload", "Upload successful! Go to <a href=\"/blog\">Blog</a>");
                            }
                        }
                    }
                }
            }else{
                Message::set("upload", "You can only upload Pictures");
            }
        }
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