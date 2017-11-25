//Simple CakePHP forceSSL method for servers and hosting environments that do not set HTTPS headers 
    
    public function forceSSL() {
        $https = $this->Session->read("https");
        $url = Router::url('https://' . env('SERVER_NAME') . env('REQUEST_URI'));
        if(empty($https)){
            $this->Session->write("https" , 'https');
            return true;
        }
        else{
            $this->Session->write("https" , '');//$this->Auth->sessionKey . 
            return $this->redirect($url);
        }
    }
 //After adding this method to your AppController.php file, you can now add these lines to your chosen controllers' beforeFilter() method
 //$this->Security->blackHoleCallback = 'forceSSL';
 //$this->Security->requireSecure();
