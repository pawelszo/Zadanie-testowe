<?php
namespace App\libs;
    class Core {
        protected $currentController = 'main';
        
        public function __construct()
        {
            $helper = new \App\helpers\logger;
            
            $url = $this->getUrl();

            
            if(isset($url[1]))
            {
                if($url[1] == 'api'){
                    if($url[2] == 'pracownik'){
                        $this->currentController = new \App\Controller\Api\ApiPracownik($url);
                    }
                    if($url[2] == 'firma'){
                        $this->currentController = new \App\Controller\Api\ApiFirma($url);
                    }                  
                    
                    
                }
            }


            



           

        }
        public function getUrl() {
            $this->url = $_SERVER['REQUEST_URI'];
            if(isset($this->url))
            {
                $url = rtrim($this->url, '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }





    }