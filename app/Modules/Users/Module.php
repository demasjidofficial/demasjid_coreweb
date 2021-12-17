<?php

/**
 * This file is part of Bonfire.
 *
 * (c) Lonnie Ezell <lonnieje@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Modules\Users;

use App\Config\BaseModule;
use App\Libraries\Menus\MenuItem;

/**
 * User Module setup
 */
class Module extends BaseModule
{
    /**
     * Setup our admin area needs.
     */
    public function initAdmin()
    {
        // Settings menu for sidebar
        $sidebar = service('menus');
        $item    = new MenuItem([
            'title'           => 'Users',
            'namedRoute'      => 'user-settings',
            'fontAwesomeIcon' => 'fas fa-user',
        ]);
        $sidebar->menu('sidebar')->collection('settings')->addItem($item);

        // Content Menu for sidebar
        $item = new MenuItem([
            'title'           => 'Users',
            'namedRoute'      => 'user-list',
            'fontAwesomeIcon' => 'fas fa-users',
        ]);
        $sidebar->menu('sidebar')->collection('content')->addItem($item);
    }
}
