<?php 
App::uses('Component', 'Controller/Component');

class AccountableComponent extends Component {
    public $actor_id = null;
    
    private $__route = null;
    private $__object = null;
    private $__object_id = null;
    private $__verb = null;
    private $__action = null;
    private $__User = null;
    
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
        if(isset($settings['excludeActions'])) {
            foreach($settings['excludeActions'] as $action) {
                unset($this->__defaultActions[$action]);
            }
        }
        $user = isset($settings['userModel']) ? $settings['userModel'] : 'User';
        $this->__User = ClassRegistry::init($user);
        $this->Accountable = ClassRegistry::init('Accountable');

    }
    
    public function __accountable() {
        if(!$this->__action) $this->__action = $this->__route->request->params['action'];
        if(!in_array($this->__action, array_keys($this->__defaultActions))) {
            return;
        }

        $this->__errorNoActor();

        switch($this->__action) {
            case 'add':
            case 'edit':
            case 'delete':
                if(!$this->__object) return;
        }

        $verb = $this->__verb ? $this->__verb : $this->__defaultActions[$this->__action];
        $data = array(
            'resource' => $this->__route->name,
            'actor_id' => $this->actor_id,
            'verb' => $verb,
        );
        
        if($this->__object) $data['object'] = $this->__object;
        if($this->__object_id) $data['object_id'] = $this->__object_id;
        
        $this->Accountable->create();
        $this->Accountable->save($data);
    }

    public function shutdown(&$controller) {
        $this->__route =& $controller;
        $this->__accountable();
    }
    
    public function beforeRedirect(&$controller) {
        $this->__route =& $controller;
        $this->__accountable();
    }

    private function __alteredObject($action, $object, $object_id=null) {
        $this->__action = $action;
        $this->__object = $object;
        $this->__object_id = $object_id;
    }

    public function has_edited($object, $object_id=null, $verb=null) {
        $this->__setVerb($verb);
        $this->__alteredObject('edit', $object, $object_id);
    }
    
    public function has_added($object, $object_id=null, $verb=null) {
        $this->__setVerb($verb);
        $this->__alteredObject('add', $object, $object_id);
    }
    
    public function has_deleted($object, $object_id=null, $verb=null) {
        $this->__setVerb($verb);
        $this->__alteredObject('delete', $object, $object_id);
    }
    
    public function has_accessed($object, $object_id=null, $verb=null) {
        $this->__setVerb($verb);
        $this->__alteredObject('index', $object, $object_id);
    }
    
    public function has_viewed($object, $object_id=null, $verb=null) {
        $this->__setVerb($verb);
        $this->__alteredObject('view', $object, $object_id);
    }

    private function __setVerb($verb) {
        if($verb) {
            $this->__verb = $verb;
        }
    }
    
    private function __errorNoActor() {
        if(!$this->actor_id) {
            throw new CakeException('Provide actor id from your session');
        }
    }
}

