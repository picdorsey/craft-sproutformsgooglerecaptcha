<?php
/**
 * Sprout Forms Google reCAPTCHA plugin for Craft CMS
 *
 * SproutFormsGoogleRecaptcha Controller
 *
 * @author    Nicholas O&#39;Donnell
 * @copyright Copyright (c) 2016 Nicholas O&#39;Donnell
 * @link      http://nicholasodo.com
 * @package   SproutFormsGoogleRecaptcha
 * @since     1.0.0
 */

namespace Craft;

class SproutFormsGoogleRecaptchaController extends BaseController
{

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     * @access protected
     */
    protected $allowAnonymous = true;

    /**
     */
    public function actionGetSiteKey()
    {
        $this->returnJson([
            'script' => craft()->sproutFormsGoogleRecaptcha->getReCapatchaCode()->__toString()
        ]);
    }
}
