<?php

class Koward_Controller_Application extends Horde_Controller_Base
{
    protected function _initializeApplication()
    {
        global $registry;

        $this->koward = Koward::singleton();

        if (is_a(($pushed = $registry->pushApp('horde', empty($this->auth_handler))), 'PEAR_Error')) {
            if ($pushed->getCode() == 'permission_denied') {
                header('Location: ' . $this->urlFor(array('controller' => 'login', 'action' => 'login')));
                exit;
            }
        }


        $this->types = array_keys($this->koward->objects);
        if (empty($this->types)) {
            throw new Koward_Exception('No object types have been configured!');
        }

        $this->menu = $this->getMenu();

        $this->theme = isset($this->koward->conf['theme']) ? $this->koward->conf['theme'] : 'koward';
    }

    /**
     * Builds Koward's list of menu items.
     */
    public function getMenu()
    {
        global $registry;

        require_once 'Horde/Menu.php';
        $menu = new Menu();

        $menu->add($this->urlFor(array('controller' => 'object', 'action' => 'listall')),
                   _("_Objects"), 'user.png', $registry->getImageDir('horde'));
        $menu->add($this->urlFor(array('controller' => 'object', 'action' => 'edit')),
                   _("_Add"), 'plus.png', $registry->getImageDir('horde'));
        $menu->add($this->urlFor(array('controller' => 'object', 'action' => 'search')),
                   _("_Search"), 'search.png', $registry->getImageDir('horde'));
        $menu->add(Horde::applicationUrl('Queries'), _("_Queries"), 'query.png', $registry->getImageDir('koward'));
        $menu->add($this->urlFor(array('controller' => 'check', 'action' => 'show')),
                   _("_Test"), 'problem.png', $registry->getImageDir('horde'));
        return $menu;
    }
}