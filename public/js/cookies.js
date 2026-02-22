(function () {
    var CONSENT_KEY = 'modulia_cookie_consent';
    var CONSENT_DURATION_DAYS = 365;

    // --- Helpers ---

    function setCookie(name, value, days) {
        var expires = new Date();
        expires.setTime(expires.getTime() + days * 24 * 60 * 60 * 1000);
        document.cookie = name + '=' + value + ';expires=' + expires.toUTCString() + ';path=/;SameSite=Lax';
    }

    function getCookie(name) {
        var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
        return match ? match[2] : null;
    }

    function deleteCookie(name) {
        document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/;';
    }

    function getConsent() {
        return getCookie(CONSENT_KEY) || localStorage.getItem(CONSENT_KEY);
    }

    function saveConsent(value) {
        setCookie(CONSENT_KEY, value, CONSENT_DURATION_DAYS);
        localStorage.setItem(CONSENT_KEY, value);
    }

    // --- Analytics activation (hook here if you add GA or similar later) ---

    function enableAnalytics() {
        // Placeholder: activate analytics cookies here when integrated.
        // e.g. window.gtag('consent', 'update', { analytics_storage: 'granted' });
    }

    function disableAnalytics() {
        // Placeholder: revoke analytics cookies here.
        deleteCookie('_ga');
        deleteCookie('_gid');
        deleteCookie('_gat');
    }

    // --- Banner logic ---

    function hideBanner(banner) {
        banner.classList.remove('cc-visible');
        banner.addEventListener('transitionend', function () {
            banner.style.display = 'none';
        }, { once: true });
    }

    function acceptAll(banner) {
        saveConsent('accepted');
        enableAnalytics();
        hideBanner(banner);
    }

    function rejectAll(banner) {
        saveConsent('rejected');
        disableAnalytics();
        hideBanner(banner);
    }

    // --- Init ---

    document.addEventListener('DOMContentLoaded', function () {
        if (getConsent()) return; // Already decided — don't show banner

        var banner = document.getElementById('cookieBanner');
        if (!banner) return;

        // Show after short delay so the page loads first
        setTimeout(function () {
            banner.style.display = 'flex';
            // Force reflow so transition plays
            banner.offsetHeight;
            banner.classList.add('cc-visible');
        }, 800);

        document.getElementById('ccAccept').addEventListener('click', function () {
            acceptAll(banner);
        });

        document.getElementById('ccReject').addEventListener('click', function () {
            rejectAll(banner);
        });
    });
})();
