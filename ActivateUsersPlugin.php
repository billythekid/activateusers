<?php
/**
 * Activate Users plugin for Craft CMS
 * Plugin that adds "Activate account" permissions so that non-admins can activate users.
 *
 * @author    Billy Fagan
 * @copyright Copyright (c) 2017 Billy Fagan
 * @link      https://billyfagan.co.uk
 * @package   ActivateUsers
 * @since     1.0.0
 */

namespace Craft;

class ActivateUsersPlugin extends BasePlugin
{
    /**
     * @return void
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @return string
     */
    public function getName()
    {
        return Craft::t('Activate Users');
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return Craft::t('Plugin that adds "Activate account" permissions so that non-admins can activate users.');
    }

    /**
     * @return string
     */
    public function getDocumentationUrl()
    {
        return 'https://github.com/billythekid/activateusers/blob/master/README.md';
    }

    /**
     * @return string
     */
    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/billythekid/activateusers/master/releases.json';
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    /**
     * @return string
     */
    public function getDeveloper()
    {
        return 'Billy Fagan';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'https://billyfagan.co.uk';
    }

    /**
     * @return bool
     */
    public function hasCpSection()
    {
        return false;
    }

    /**
     * Adds the new user permission to allow a user to activate users
     *
     * @return array
     */
    public function registerUserPermissions()
    {
        return array(
            'activateAccounts' => array('label' => Craft::t('Activate Accounts')),
        );
    }

    /**
     * Adds the option to activate an account if the current user is allowed to do that.
     *
     * @param UserModel $user
     * @return array
     */
    public function addUserAdministrationOptions(UserModel $user)
    {
        $currentUser = craft()->userSession->getUser();

        if ($this->currentUserCanActivateUsers($user, $currentUser))
        {
            return array(
                array(
                    'label'  => Craft::t('Activate account'),
                    'action' => 'activateUsers/account/activateAccount',
                ),
            );
        }
    }

    /**
     * Checks if the current user is allowed to activate a user
     *
     * @param UserModel $user
     * @param UserModel $currentUser
     * @return bool
     */
    private function currentUserCanActivateUsers(UserModel $user, $currentUser)
    {
        return !craft()->userSession->isAdmin() &&
            $currentUser->can('activateAccounts') &&
            !$user->isCurrent() &&
            ($user->getStatus() !== UserStatus::Active);
    }
}
