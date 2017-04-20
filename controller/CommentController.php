<?php
require_once '../repository/BlogRepository.php';
require_once '../repository/CommentRepository.php';

class CommentController
{
    public function doCreate(){
        if(Security::isAuthenticated()){
            if($_POST['send']){
                $userid = Security::getUser()->id;
                $blogid = $_GET['blogid'];
                $comment = htmlspecialchars($_POST['commentarea']);
                $time = date("Y-m-d");
                $commentRepository = new CommentRepository();
                $commentRepository->createComment($userid, $blogid, $comment, $time);
                header('Location: /comment/showComments?id='.$blogid);
            }
        }else{
            echo'fuck off';
        }
    }


    public function showComments(){
        if (isset($_GET['id'])) {
            $blogId = $_GET['id'];

            $blogRepository = new BlogRepository();
            $blog = $blogRepository->readById($blogId);

            $commentRepository = new CommentRepository();
            $commentlist = $commentRepository->getComments($blogId);
            $this->commentView($blog, $commentlist);

            }
    }
    public function commentView($blog, $commentlist){
        $view = new View('blog_comments');
        $view->title = 'Comments';
        $view->heading = '';
        $view->blog = $blog;
        $view->comments = $commentlist;
        $view->display();

    }
    public function commentDelete(){
        if (Security::isAuthenticated()) {
            $commentid = $_GET['id'];
            $commentRepository = new CommentRepository();

            $comment = $commentRepository->readById($commentid);

            if ($comment->userid == Security::getUserId()) {
                if($commentRepository->deleteById($commentid)){
                    header('Location: /comment/showComments?id='.$comment->blogid);
                }

                }
            }
        }
}