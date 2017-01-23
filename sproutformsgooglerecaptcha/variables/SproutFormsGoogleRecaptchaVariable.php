<?php
/**
 * Sprout Forms Google reCAPTCHA plugin for Craft CMS
 *
 * Sprout Forms Google reCAPTCHA Variable
 *
 * @author    Nicholas O&#39;Donnell
 * @copyright Copyright (c) 2016 Nicholas O&#39;Donnell
 * @link      http://picdorsey.com
 * @package   SproutFormsGoogleRecaptcha
 * @since     1.0.3
 */

namespace Craft;

class SproutFormsGoogleRecaptchaVariable
{
    /**
     */
    public function getReCapatchaCode()
    {
        return craft()->sproutFormsGoogleRecaptcha->getReCapatchaCode()->__toString();
    }
}
