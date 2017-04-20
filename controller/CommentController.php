<?php
require_once '../repository/BlogRepository.php';
require_once '../repository/CommentRepository.php';

class CommentController
{
    public function docCreate($blog, $commentlist){

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
}