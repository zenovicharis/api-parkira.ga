<?php

namespace Parkiraga;

class Application extends \Slim\App{
    public $cfg;
    public function __construct($basePath){
        parent::__construct();
        $this->extract($basePath);
        $this->configureDatabase();
    }

    protected function extract($path){
        //Getting configuration file using Global Variable
        $file = file_get_contents($path."/config.json");
        //Setting configuration as a local variable
        $this->cfg = json_decode($file);
    }

    protected function configureDatabase(){
        $dbConfig = $this->cfg->database;
        \ActiveRecord\Config::initialize(function (\ActiveRecord\Config $cfg) use ($dbConfig) {
            $cfg->set_model_directory('src/Models');
            $cfg->set_connections([
                'main' => sprintf('mysql://%s:%s@%s/%s',
                    $dbConfig->user, $dbConfig->password, $dbConfig->host, $dbConfig->name
                )
            ]);
            $cfg->set_default_connection('main');
        });

    }
}