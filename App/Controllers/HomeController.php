<?php 

namespace Gamc\Controller;

use Gamc\Config\View;

class HomeController 
{
    public function home()
    {
       $view = new View('home');
    }
    
}