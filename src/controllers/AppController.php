<?php

class AppController
{

    private $URL;
    private $request;

    public function __construct()
    {
        $this->URL = "http://$_SERVER[HTTP_HOST]";
        $this->request = $_SERVER['REQUEST_METHOD'];
    }

    protected function isPost() : bool
    {
        return $this->request === 'POST';
    }
    protected function isGet() : bool
    {
        return $this->request === 'GET';
    }

    protected function isPut() : bool
    {
        return $this->request === 'PUT';
    }

    
    protected function isLoggedIn() : bool
    {
        session_start();
        return $_SESSION['loggedIn'] ? true : false;
    }
    
    protected function accessDenied(){
        $this->render('access-denied');
        die();
    }

    protected function handleAccess()
    {
        if(!$this->isLoggedIn())
            $this->accessDenied();
    }

    protected function hasExceedInactivityTime()
    {
        session_start();
        if(time() - $_SESSION['timestamp'] > 900)
            return true;
        $_SESSION['timestamp'] = time();
        var_dump($_SESSION['timestamp']);
        return false;
    }



    protected function render(string $template = null, array $variables = [])
    {
        $templatePath = 'public/views/'.$template.'.php';
        $output = 'File not found';
        if(file_exists($templatePath)){
            extract($variables);
            ob_start();
            include $templatePath;
            $output = ob_get_clean();
        }

        print $output;
    }
}