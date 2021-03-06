<?php

namespace FFCMS\Controllers\Admin;

use FFMVC\Helpers;
use FFCMS\{Traits, Controllers, Models, Mappers};

/**
 * Base Admin User Controller Class.
 *
 * Has methods common across user controllers
 *
 * @author Vijay Mahrra <vijay@yoyo.org>
 * @copyright (c) Copyright 2016 Vijay Mahrra
 * @license GPLv3 (http://www.gnu.org/licenses/gpl-3.0.html)
 */
class Admin extends Controllers\User\Base
{
    /**
     * Logout if not admin
     *
     * @param \Base $f3
     * @param array $params
     * @return void
     */
    public function beforeRoute(\Base $f3, array $params)
    {
        parent::beforeRoute($f3, $params);

        // non-admin user gets logged out
        if (false == $f3->get('isAdmin')) {
            $f3->reroute('@logout');
        }

        $this->redirectLoggedOutUser();
    }

    /**
     *
     *
     * @return void
     */
    public function index()
    {
        $this->redirectLoggedOutUser();

        echo \View::instance()->render('cms/admin/index.phtml');
    }


    /**
     *
     *
     * @return void
     */
    public function phpinfo()
    {
        phpinfo();
    }

}
