<?php

namespace PhpCsUi;

use Silex\Application as SilexApplication;
use Symfony\Component\HttpFoundation\Request;

class Application extends SilexApplication
{
    public function __construct(array $values = array())
    {
        parent::__construct($values);

        $this->configureParameters();
        $this->configureProviders();
        $this->configureServices();
        $this->configureSecurity();
        $this->configureListeners();
    }
    
    private function configureParameters()
    {
        
        $this['debug'] = true;

        //$this['phpcsui.baseurl'] = 'http://localhost:9999/api/';
    }
    
    private function configureProviders()
    {
        // *** Setup Twig ***
        $this->register(new \Silex\Provider\TwigServiceProvider());
        
        $options = array();
        $loader = null; // TODO
        $twig = new \Twig_Environment($loader, $options);
                
        $this['twig.loader.filesystem']->addPath(__DIR__ . '/../src/Resources/views', 'Dashboard');
        $this['twig.loader.filesystem']->addPath(__DIR__ . '/../app/Resources/views', 'App');

        // *** Setup Routing ***
        $this->register(new \Silex\Provider\RoutingServiceProvider());
    }
    
    private function configureServices()
    {
        // Setup services
    }
    
    private function configureSecurity()
    {
        // Setup Security
    }
    
    private function configureListeners()
    {
        // todo
    }
}
