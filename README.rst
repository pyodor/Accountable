=================================================
Welcome to Accountable a CakePHP Plugin
=================================================

``Accountable`` is a CakePHP plugin that logs the access of a certain resource, it merely answers the question of "Who does what?".   

Features
------------------

- Database backed logs and with UI
- Default loggings on standard controller actions (index, add, edit, view, delete)
- Non-standard actions can be added as filter
- Configurable sentence construction of logs
- Works flawlessly with NanoAuth


Installation
--------------

Make sure you properly baked your app::

    cake bake myapp
  
and provide the following parameters for your ``myapp``, database setup and some other stuffs.


Clone the plugin inside your ``myapp/Plugin`` directory::

    git clone http://[your_username]@202.172.229.26/rhodecode/Accountable

Activate the plugin in your ``myapp``::
    
    CakePlugin::loadAll(array(
        'Accountable'
    ));


Migrate ``Accountable``'s schema, issue this inside your ``myapp``:: 
    
    Console/cake schema create --plugin Accountable

If you don't like ``Console/cake`` you can import the schema through ``schema.sql`` inside ``myapp\Config\Schema``.
This will create ``accountables`` table in your ``myapp`` database.


Usage
--------------

In your controller, perhaps ``AppController.php``::

    public $components = array(Accountable.Accountable');

By default, if you are using AuthComponent for your user sessions the above code is enough already to get you started.
But if you are keeping your own session you need to provide the actor id as the user accountable off.::

    $this->Accountable->actor_id = $this->Session->read('user_id');


``Accountable`` plugin accounts all default actions (index, view, add, edit, delete) of a controller, but if you want to exclude an action you may do so::

    public $components = array(Accountable.Accountable' => array(
        excludeActions => array('index', 'view');
    ));


Actions such as add, edit & delete will alter a certain object thus ``Accountable`` needs to know what object was being altered.
If object altered were not provided the action will not be accounted, the following ``Accountable`` methods does this::

    // $object is required
    // $object_id is optional
    // $verb is optional, if you want to customize verb to display
    $this->Accountable->has_added($object, $object_id, $verb);

Methods such as ``has_edited`` & ``has_deleted`` posses similar functionalities and they can be used on non-standard actions as long as that action altered an object.
    

Accessing the accounted logs
--------------
TODO


Tests
--------------
TODO



License
-------

``Accountable`` is released under the WTFPL_ license.

Support
-----------------

Send me_ a bottle of beer or FORK_ it! :) 

.. _WTFPL: http://sam.zoy.org/wtfpl/
.. _me: dado@neseapl.com
.. _FORK: http://202.172.229.26/rhodecode/Accountable/fork

