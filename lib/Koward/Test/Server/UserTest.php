<?php
/**
 * Test the user object.
 *
 * PHP version 5
 *
 * @category Kolab
 * @package  Koward
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.horde.org/licenses/lgpl21 LGPL 2.1
 */

/**
 * Test the user object.
 *
 * Copyright 2009-2017 Horde LLC (http://www.horde.org/)
 *
 * See the enclosed file LICENSE for license information (LGPL). If you
 * did not receive this file, see http://www.horde.org/licenses/lgpl21.
 *
 * @category Kolab
 * @package  Koward
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.horde.org/licenses/lgpl21 LGPL 2.1
 */
class Koward_Test_Server_UserTest extends Horde_Kolab_Test_Server {

    /**
     * Test listing users if there are no users.
     *
     * @scenario
     *
     * @return NULL
     */
    public function listingUsersOnEmptyServer()
    {
        $this->given('the current Kolab server')
            ->when('listing all users')
            ->then('the list is an empty array');
    }
}
