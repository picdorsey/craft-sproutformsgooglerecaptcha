/**
 * Sprout Forms Google reCAPTCHA plugin for Craft CMS
 *
 * Sprout Forms Google reCAPTCHA JS
 *
 * @author    Nicholas O'Donnell
 * @copyright Copyright (c) 2016 Nicholas O'Donnell
 * @link      http://nicholasodo.com
 * @package   SproutFormsGoogleRecaptcha
 * @since     1.0.1
 */

var sproutFormsGoogleReCAPTCHA = {
    init: function () {
        this.injectRecaptchaViaClass();
    },

    loadRecaptchaApi: function () {
        var scriptTag = document.createElement('script');
        scriptTag.type = 'text/javascript';
        scriptTag.src = 'https://www.google.com/recaptcha/api.js';
        (document.getElementsByTagName('head')[0] || document.documentElement ).appendChild(scriptTag);
    },

    injectRecaptchaViaClass: function () {
        var $elements = document.querySelectorAll('.js-hasReCapatcha');

        if ($elements.length < 1) {
            this.loadRecaptchaApi();
            return;
        }

        ajax.get('/actions/sproutFormsGoogleRecaptcha/getSiteKey', {}, function (content) {
            var script = JSON.parse(content).script;

            for (var i = 0; i < $elements.length; i++) {
                var $elem = $elements[i];
                $elem.innerHTML += script;
            }

            this.loadRecaptchaApi();

        }.bind(this));
    }
};

// http://stackoverflow.com/questions/8567114/how-to-make-an-ajax-call-without-jquery
var ajax = {
    x: function () {
        if (typeof XMLHttpRequest !== 'undefined') {
            return new XMLHttpRequest();
        }
        var versions = [
            "MSXML2.XmlHttp.6.0",
            "MSXML2.XmlHttp.5.0",
            "MSXML2.XmlHttp.4.0",
            "MSXML2.XmlHttp.3.0",
            "MSXML2.XmlHttp.2.0",
            "Microsoft.XmlHttp"
        ];

        var xhr;
        for (var i = 0; i < versions.length; i++) {
            try {
                xhr = new ActiveXObject(versions[i]);
                break;
            } catch (e) {
            }
        }
        return xhr;
    },

    send: function (url, callback, method, data, async) {
        if (async === undefined) {
            async = true;
        }
        var x = ajax.x();
        x.open(method, url, async);
        x.onreadystatechange = function () {
            if (x.readyState == 4) {
                callback(x.responseText)
            }
        };
        if (method == 'POST') {
            x.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        }
        x.send(data);
    },

    get: function (url, data, callback, async) {
        var query = [];
        for (var key in data) {
            query.push(encodeURIComponent(key) + '=' + encodeURIComponent(data[key]));
        }
        ajax.send(url + (query.length ? '?' + query.join('&') : ''), callback, 'GET', null, async);
    },

    post: function (url, data, callback, async) {
        var query = [];
        for (var key in data) {
            query.push(encodeURIComponent(key) + '=' + encodeURIComponent(data[key]));
        }
        ajax.send(url, callback, 'POST', query.join('&'), async);
    }
}

document.onreadystatechange = function () {
    if (document.readyState === 'interactive') {
        sproutFormsGoogleReCAPTCHA.init();
    }
}
