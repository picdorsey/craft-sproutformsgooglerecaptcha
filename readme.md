# Sprout Forms Google ReCAPATCHA

Adds [Google ReCAPATCHA](https://www.google.com/recaptcha/intro/index.html) to [Sprout Forms](http://sprout.barrelstrengthdesign.com/craft-plugins/forms) Craft plugin.

## Installation
1. Download & unzip the file and place the `sproutformsgooglerecaptcha` directory into your `craft/plugins` directory
2.  -OR- do a `git@github.com:nicholasodo/craft-sproutformsgooglerecaptcha.git` directly into your `craft/plugins` folder.  You can then update it with `git pull`
4. Install plugin in the Craft Control Panel under Settings > Plugins
5. Configure your site key/secret key in settings.
5. The plugin folder should be named `sproutformsgooglerecaptcha` for Craft to see it.  GitHub recently started appending `-master` (the branch name) to the name of the folder for zip file downloads.

## Usage

Simply include both `{% includeCssResource 'sproutformsgooglerecaptcha/css/style.css' %}` and `{% includeJsResource 'sproutformsgooglerecaptcha/js/script.js' %}` in your template. Then use one of the following methods to output the Google ReCAPATCHA depending on your setup.

### Automatic
Sprout Forms Google ReCAPATCHA is meant to work out of the box using Sprout Form's `sproutForms.modifyForm` hook. In which case, you don't have to do anything!

### Custom
In instances where you're creating the form code yourself, there are 2 ways to output the Google ReCAPATCHA:

1. Use the `{{ craft.sproutFormsGoogleRecaptcha.getReCapatchaCode()|raw }}` tag inside the `<form>` tag.
2. -OR- add `js-hasReCapatcha` class to your form. Google's ReCAPATCHA will be prepended to the end of your form automatically.