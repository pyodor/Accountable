<?php 
App::uses('Component', 'Controller/Component');

class AccountableComponent extends Component {
    public $route = null;
    public $actor = null;
    
    private $__settings = null;
    private $__defaultActions = array(
        'index'  => 'has accessed', 
        'view'   => 'has viewed',
        'add'    => 'has added',
        'edit'   => 'has edited',
        'delete' => 'has deleted'
    );

    public function __construct(ComponentCollection $collection, $settings = array()) {
        parent::__construct($collection, $settings);
        $this->__settings = $settings;
    }
    
    public function shutdown(&$controller) {
        $this->route =& $controller;
        //debug($this->actor);
        //debug($this->route);
        //TODO fast insert logs here
    }
}

