<?php
/**
 * Activate Users plugin for Craft CMS
 *
 * ActivateUsers_Account Controller
 *
 * @author    Billy Fagan
 * @copyright Copyright (c) 2017 Billy Fagan
 * @link      https://billyfagan.co.uk
 * @package   ActivateUsers
 * @since     1.0.0
 */

namespace Craft;

class ActivateUsers_AccountController extends BaseController
{

    /**
     * Activates a user (because normally you need to be top-level admin)
     */
    public function actionActivateUser()
    {
        $user = craft()->users->getUserById(craft()->request->getPost('userId'));
        craft()->users->activateUser($user);
    }

}