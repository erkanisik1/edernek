<?php namespace Project\Controllers;

use User, Post, Session, URL;

class Home extends Controller
{
   public function main(string ...$parameters)
    {  
      
        if (Post::submit()) {
           
            $status = User::login(Post::username(), Post::password());
            if ($status === true) {
                $data = User::data();
                Session::insert('USERID', $data->id);
                redirect('/');
            }

       
        
        }
        
    } 

    /**
     * Home::s404
     * 
     * Loads show 404 page.
     * Location: Views/Home/s404.wizard.php
     */
    function logout(){
        Session::deleteAll();
        redirect(URL::base());
    }
    public function s404()
    {
        # Sets masterpage title.
        Masterpage::title('404! File Not Found');
    }
}