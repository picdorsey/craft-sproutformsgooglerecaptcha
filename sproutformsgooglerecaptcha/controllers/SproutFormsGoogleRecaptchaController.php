<?php
/**
 * Sprout Forms Google reCAPTCHA plugin for Craft CMS
 *
 * SproutFormsGoogleRecaptcha Controller
 *
 * @author    Nicholas O&#39;Donnell
 * @copyright Copyright (c) 2016 Nicholas O&#39;Donnell
 * @link      http://picdorsey.com
 * @package   SproutFormsGoogleRecaptcha
 * @since     2.0.1
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
