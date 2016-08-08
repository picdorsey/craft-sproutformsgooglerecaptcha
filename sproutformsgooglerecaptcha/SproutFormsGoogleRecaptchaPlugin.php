<?php
/**
 * Sprout Forms Google reCAPTCHA plugin for Craft CMS
 *
 * Adds Google reCAPTCHA to sprout forms.
 *
 * @author    Nicholas O&#39;Donnell
 * @copyright Copyright (c) 2016 Nicholas O&#39;Donnell
 * @link      http://nicholasodo.com
 * @package   SproutFormsGoogleRecaptcha
 * @since     1.0.0
 */

namespace Craft;

class SproutFormsGoogleRecaptchaPlugin extends BasePlugin
{
    /**
     * @return mixed
     */
    public function init()
    {
        $this->_hooks();
    }

    /**
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('Sprout Forms Google reCAPTCHA');
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return Craft::t('Adds Google reCAPTCHA to sprout forms.');
    }

    /**
     * @return string
     */
    public function getDocumentationUrl()
    {
        return 'https://github.com/nicholasodo/sproutformsgooglerecaptcha/blob/master/README.md';
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
        return 'Nicholas O\'Donnell';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'http://nicholasodo.com';
    }

    /**
     * @return bool
     */
    public function hasCpSection()
    {
        return false;
    }

    /**
     */
    public function onBeforeInstall()
    {
    }

    /**
     */
    public function onAfterInstall()
    {
    }

    /**
     */
    public function onBeforeUninstall()
    {
    }

    /**
     */
    public function onAfterUninstall()
    {
    }

    /**
     * @return array
     */
    protected function defineSettings()
    {
        return array(
            'siteKey' => [
                AttributeType::String,
                'label' => 'Site Key',
                'default' => '',
                'required' => true
            ],
            'secreyKey' => [
                AttributeType::String,
                'label' => 'Secret Key',
                'default' => '',
                'required' => true
            ]
        );
    }

    /**
     * @return mixed
     */
    public function getSettingsHtml()
    {
       return craft()->templates->render('sproutformsgooglerecaptcha/SproutFormsGoogleRecaptcha_Settings', array(
           'settings' => $this->getSettings()
       ));
    }

    /**
     * @param mixed $settings  The Widget's settings
     *
     * @return mixed
     */
    public function prepSettings($settings)
    {
        return $settings;
    }


    /**
     * Hook into core/plugin events
     */
    private function _hooks()
    {
        craft()->templates->hook('sproutForms.modifyForm', function (&$context) {
            return craft()->sproutFormsGoogleRecaptcha->getReCapatchaCode();
        });

        craft()->on('sproutForms.onBeforeSaveEntry', function (Event $event) {
            $entry = $event->params['entry'];

            if (! craft()->sproutFormsGoogleRecaptcha->validateReCapatcha($entry)) {
                echo craft()->templates->render('sproutformsgooglerecaptcha/SproutFormsGoogleRecaptcha_Error');
                die();
            }
        });
    }
}
