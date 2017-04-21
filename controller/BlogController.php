<?php
//Import BlogRepository
require_once '../repository/BlogRepository.php';

class BlogController
{

    //Default blog view (Homepage)
    public function index()
    {
        $blogRepository = new BlogRepository();
        $view = new View('blog_index');
        $view->title = 'Homepage';
        $view->heading = '';
        $view->entry = $blogRepository->readAllSortedByNewest();
        $view->display();
    }

    //private blog view
    public function privateBlog()
    {
        $blogRepository = new BlogRepository();
        $view = new View('blog_private');
        $view->title = 'Your Submission';
        $view->heading = 'Profile';
        //call to readAllPrivate
        $view->entry = $blogRepository->readAllPrivate();
        $view->display();
    }

    //Blog create view
    public function create()
    {
        if (Security::isAuthenticated()) {
            $this->doCreate();
            $view = new View('blog_create');
            $view->title = 'Submit Image';
            $view->heading = 'Submit Image';
            $view->display();
        } else {
            echo 'You are not logged in!';
        }
    }

    //Prepare image upload -> sends form data to BlogRepository
    public function doCreate()
    {
        if (isset($_POST['send'])) {
            $destination = "images/uploads";
            $picture_array = $_FILES['picture'];
            $picture = $destination . '/';
            //saves path extension in $ext
            $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
            //protects from attackers
            $title = htmlspecialchars($_POST['title']);
            $date = date("Y-m-d");
            $private = isset($_POST['private']);
            //saves current user in $creator
            $creator = Security::getUser()->email;
            $blogRepository = new BlogRepository();
            if ($ext == "jpg" || $ext == "gif" || $ext == "PNG" || $ext == "svg") {
                //call to upload
                $insertId = $blogRepository->upload($picture, $title, $date, $creator, $private);
                //moves image to folder only if sqlquerry successful
                if ($insertId > 0) {
                    $dst = $picture . $insertId . '.' . $ext;
                    if (move_uploaded_file($picture_array['tmp_name'], $dst)) {
                        //updates new imagepath in database
                        if ($blogRepository->update_picture($insertId, $dst)) {
                            if ($private == 'true') {
                                Message::set("upload", "Upload successful! Go to <a href=\"/blog/privateBlog\">Private Blog</a>");
                            } else {
                                Message::set("upload", "Upload successful! Go to <a href=\"/blog\">Blog</a>");
                            }
                        }
                    }
                }
            } else {
                Message::set("upload", "You can only upload pictures");
            }
        }
    }

    //delete image function
    public function delete()
    {
        //can only delete if user is logged in and image id is set.
        if (Security::isAuthenticated() && isset($_GET['id'])) {
            $blogId = $_GET['id'];
            $blogRepository = new BlogRepository();
            //call to readById
            $blog = $blogRepository->readById($blogId);
            //only creator and admin can delete image
            if (($blog->creator == Security::getUser()->email) || Security::isAdmin()) {
                //call to get_picture_path
                $path = $blogRepository->get_picture_path($blogId);
                if ($blogRepository->deleteById($blogId)) {
                    unlink($path);
                }
            }
        }
        // redirects back to last page
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    //change title view
    public function changeTitle()
    {
        if (Security::isAuthenticated() && isset($_GET['id'])) {
            $this->doChangeTitle();
            $view = new View('blog_change');
            $blogRepository = new BlogRepository();
            $view->id = $_GET['id'];
            $view->title = 'Change title';
            $view->heading = 'Change title';
            $view->display();
        }else{
            echo'you are not logged in!';
        }
    }
    //change title function
    private function doChangeTitle()
    {
        if (isset($_POST['send'])) {
            $newtitle = $_POST['title'];
            $blogRepository = new BlogRepository();
            $blog = $blogRepository->readById($_GET['id']);
            if (($blog->creator == Security::getUser()->email) || Security::isAdmin()) {
                //call to updateTitle
                if ($blogRepository->updateTitle($blog->id, $newtitle)) {
                    Message::set("update", "update Successful! go to <a href=\"/blog/privateBlog\">Private blog</a>");
                }else{
                    Message::set("update", "update failed, please try again or ask the administrator");
                }
            }
        }

    }
}