<?php
namespace Gamc\Config;

class View
{  

    public function __construct(  string $path=null,  array $vars=null )
    {  
    }

    public static  function view($path,  $vars = null)
    {
        $path = str_replace('.', '/', $path);
        if ($vars) {
            extract($vars);
        }
        $path = BASE_VIEW_PATH. $path .'.php';
        if (file_exists($path)) {
            return require_once $path;
        } else {
            echo "not found";
        }

    }

    public static function include($paths, mixed $vars = null)
    {
        $paths = str_replace('.', '/', $paths);
        if ($vars) {
            extract($vars);
        }
        $path = BASE_VIEW_PATH. $path .'.php';
        if (file_exists($path)) {
            return require_once $path;
        } else {
            echo 'not found';
        }
    }

    public static  function asset($dir)
    {
        global $base_url;
        $path = BASE_PATH . '/' . $dir;
        echo $path;
    }

    public static  function url($url)
    {
        if ($url[0] == '/') {
            $url = substr($url, 1, strlen($url) - 1);
        }

        global $base_url;
        echo $base_url . $url;
    }
}
