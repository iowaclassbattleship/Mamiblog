<?php
//import BlogRepository and CommentRepository
require_once '../repository/BlogRepository.php';
require_once '../repository/CommentRepository.php';

class CommentController
{
    //Commentview
    public function commentView($blog, $commentlist){
        $view = new View('blog_comments');
        $view->title = 'Comments';
        $view->heading = '';
        $view->blog = $blog;
        $view->comments = $commentlist;
        $view->display();
    }
    //prepares data -> sends data to CommentRepository
    public function doCreate(){
        //only logged in users can write comments
        if(Security::isAuthenticated()){
            if($_POST['send']){
                $userid = Security::getUser()->id;
                $blogid = $_GET['blogid'];
                //protects from attackers
                $comment = htmlspecialchars($_POST['commentarea']);
                $time = date("Y-m-d");
                $commentRepository = new CommentRepository();
                //call to createComment
                $commentRepository->createComment($userid, $blogid, $comment, $time);
                header('Location: /comment/showComments?id='.$blogid);
            }
        }else{
            echo'Only logged in users can write comments';
        }
    }
    //requests all comments of an entry from CommentRepository
    public function showComments(){
        if (isset($_GET['id'])) {
            $blogId = $_GET['id'];
            $blogRepository = new BlogRepository();
            //call to readById
            $blog = $blogRepository->readById($blogId);
            $commentRepository = new CommentRepository();
            $commentlist = $commentRepository->getComments($blogId);
            $this->commentView($blog, $commentlist);
            }
    }
    //delete comment function -> sends delete request to CommentRepository
    public function commentDelete(){
        if (Security::isAuthenticated()) {
            $commentid = $_GET['id'];
            $commentRepository = new CommentRepository();
            //call to readById
            $comment = $commentRepository->readById($commentid);
            if ($comment->userid == Security::getUserId()) {
                if($commentRepository->deleteById($commentid)){
                    header('Location: /comment/showComments?id='.$comment->blogid);
                }
            }
        }
    }
}