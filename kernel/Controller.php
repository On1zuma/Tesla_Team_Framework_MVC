<?php

require_once __DIR__ . '/../vendor/autoload.php';

final class Controller
{
    private $_A_dissectUrl;

    private $_A_urlSettings;

    private $_A_postSettings;

    public function __construct($S_url, $A_postParams)
    {
        if (isset($S_url)) {
            if (str_ends_with($S_url, '/')) {
                $S_url = substr($S_url, 0, strlen($S_url) - 1);
            }
            $A_urlDecortique = explode('/', $S_url);
            //  Controller / Action

            if (!empty($A_urlDecortique[0])) {
                $S_controller = $A_urlDecortique[0];
                if (!empty($A_urlDecortique[1])) {
                    $S_action = $A_urlDecortique[1];
                } else {
                    $S_action = null;
                }
            } else {
                $S_controller = null;
            }
        }

        if (empty($S_controller)) {
            // All controllers are prefixed by "Controller"
            $this->_A_dissectUrl['controller'] = 'ControllerHome';
        } else {
            $this->_A_dissectUrl['controller'] = 'Controller' . ucfirst($S_controller);
        }

        if (empty($S_action)) {
            // by default, action is empty so we increment it
            $this->_A_dissectUrl['action'] = 'defautAction';
        } else {
            // We supposed that all actions are prefixed by "Action"
            $this->_A_dissectUrl['action']  = $S_action . 'Action';
        }

        // We delete the controller and the action of our array
        // Only the settings left

        // We store settings inside their instancied variable
        $this->_A_urlSettings = $A_urlDecortique ?? null;

        // We take care of the array $A_postParams
        $this->_A_postSettings = $A_postParams;
    }

    public function execute()
    {
        if (!class_exists($this->_A_dissectUrl['controller'])) {
            header('Location: /404.html');
            exit();
            throw new ControllerException($this->_A_dissectUrl['controller'] . " n'est pas un controleur valide.");
        }

        if (!method_exists($this->_A_dissectUrl['controller'], $this->_A_dissectUrl['action'])) {
            header('Location: /404.html');
            exit();
            throw new ControllerException($this->_A_dissectUrl['action'] . " du contrôleur " .
                $this->_A_dissectUrl['controller'] . " n'est pas une action valide.");
        }

        $B_called = call_user_func_array(array(new $this->_A_dissectUrl['controller'](),
            $this->_A_dissectUrl['action']), array($this->_A_urlSettings, $this->_A_postSettings ));

        if (false === $B_called) {
            throw new ControllerException("L'action " . $this->_A_dissectUrl['action'] .
                " du contrôleur " . $this->_A_dissectUrl['controller'] . " a rencontré une erreur.");
        }
    }
}
