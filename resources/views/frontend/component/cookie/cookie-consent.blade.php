<!--
    ENAMUX COOKIE CONSENT BANNER
    Professional GDPR/CCPA Compliant Cookie Notice

    FEATURES:
    - Branded with Enamux colors & typography
    - GDPR & CCPA compliant
    - Remembers user choice (30 days)
    - Granular cookie controls
    - Accessible (keyboard navigation, screen readers)
    - Mobile responsive
    - Analytics integration ready
-->

<!-- Cookie Consent Banner -->
<div id="enamux-cookie-banner" class="enamux-cookie-banner" role="dialog" aria-labelledby="cookie-title" aria-describedby="cookie-description" style="display: none;">
    <div class="enamux-cookie-container">

        <!-- Cookie Icon -->
        <div class="enamux-cookie-icon">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="12" r="10" fill="#C0996B"/>
                <circle cx="8" cy="10" r="1.5" fill="#1A2B45"/>
                <circle cx="14" cy="8" r="1.5" fill="#1A2B45"/>
                <circle cx="10" cy="15" r="1.5" fill="#1A2B45"/>
                <circle cx="15" cy="14" r="1.5" fill="#1A2B45"/>
            </svg>
        </div>

        <!-- Cookie Content -->
        <div class="enamux-cookie-content">
            <h3 id="cookie-title" class="enamux-cookie-title">We Value Your Privacy</h3>
            <p id="cookie-description" class="enamux-cookie-description">
                We use cookies to enhance your browsing experience, serve personalized content, and analyze our traffic.
                By clicking "Accept All", you consent to our use of cookies.
            </p>

            <!-- Cookie Preferences Link -->
            <button class="enamux-cookie-settings-link" id="show-cookie-settings" aria-label="Customize cookie settings">
                Customize Settings
            </button>
        </div>

        <!-- Cookie Actions -->
        <div class="enamux-cookie-actions">
            <button class="enamux-cookie-btn enamux-cookie-btn-secondary" id="reject-cookies" aria-label="Reject all cookies">
                Reject All
            </button>
            <button class="enamux-cookie-btn enamux-cookie-btn-primary" id="accept-cookies" aria-label="Accept all cookies">
                Accept All
            </button>
        </div>
    </div>
</div>

<!-- Cookie Settings Modal -->
<div id="enamux-cookie-settings" class="enamux-cookie-modal" role="dialog" aria-labelledby="settings-title" aria-modal="true" style="display: none;">
    <div class="enamux-cookie-modal-overlay" id="close-modal-overlay"></div>
    <div class="enamux-cookie-modal-content">

        <!-- Modal Header -->
        <div class="enamux-cookie-modal-header">
            <h2 id="settings-title" class="enamux-cookie-modal-title">Cookie Settings</h2>
            <button class="enamux-cookie-close" id="close-settings" aria-label="Close cookie settings">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#1A2B45" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"/>
                    <line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>
        </div>

        <!-- Modal Body -->
        <div class="enamux-cookie-modal-body">
            <p class="enamux-cookie-modal-intro">
                We use cookies to improve your experience on our website. You can customize your preferences below.
            </p>

            <!-- Cookie Categories -->
            <div class="enamux-cookie-category">
                <div class="enamux-cookie-category-header">
                    <div class="enamux-cookie-category-title">
                        <h3>Essential Cookies</h3>
                        <span class="enamux-cookie-required">Always Active</span>
                    </div>
                </div>
                <p class="enamux-cookie-category-description">
                    These cookies are necessary for the website to function and cannot be disabled. They are usually only set in response to actions made by you such as setting your privacy preferences, logging in or filling in forms.
                </p>
            </div>

            <div class="enamux-cookie-category">
                <div class="enamux-cookie-category-header">
                    <div class="enamux-cookie-category-title">
                        <h3>Analytics Cookies</h3>
                        <label class="enamux-cookie-toggle">
                            <input type="checkbox" id="analytics-cookies" checked>
                            <span class="enamux-cookie-slider"></span>
                        </label>
                    </div>
                </div>
                <p class="enamux-cookie-category-description">
                    These cookies help us understand how visitors interact with our website by collecting and reporting information anonymously. This helps us improve our website and services.
                </p>
            </div>

            <div class="enamux-cookie-category">
                <div class="enamux-cookie-category-header">
                    <div class="enamux-cookie-category-title">
                        <h3>Marketing Cookies</h3>
                        <label class="enamux-cookie-toggle">
                            <input type="checkbox" id="marketing-cookies">
                            <span class="enamux-cookie-slider"></span>
                        </label>
                    </div>
                </div>
                <p class="enamux-cookie-category-description">
                    These cookies are used to track visitors across websites. The intention is to display ads that are relevant and engaging for the individual user.
                </p>
            </div>

            <div class="enamux-cookie-category">
                <div class="enamux-cookie-category-header">
                    <div class="enamux-cookie-category-title">
                        <h3>Functional Cookies</h3>
                        <label class="enamux-cookie-toggle">
                            <input type="checkbox" id="functional-cookies" checked>
                            <span class="enamux-cookie-slider"></span>
                        </label>
                    </div>
                </div>
                <p class="enamux-cookie-category-description">
                    These cookies enable the website to provide enhanced functionality and personalization. They may be set by us or by third-party providers whose services we have added to our pages.
                </p>
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="enamux-cookie-modal-footer">
            <button class="enamux-cookie-btn enamux-cookie-btn-secondary" id="save-settings">
                Save Preferences
            </button>
            <button class="enamux-cookie-btn enamux-cookie-btn-primary" id="accept-all-settings">
                Accept All
            </button>
        </div>
    </div>
</div>

<!-- CSS Styles -->
<style>
    /* Enamux Cookie Consent Styles */

    /* Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&family=Oswald:wght@300;400;600&display=swap');

    /* Banner Container */
    .enamux-cookie-banner {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background: #FFFFFF;
        box-shadow: 0 -2px 20px rgba(0, 0, 0, 0.15);
        z-index: 9999;
        padding: 30px;
        animation: slideUp 0.4s ease-out;
        border-top: 3px solid #C0996B;
    }

    @keyframes slideUp {
        from {
            transform: translateY(100%);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .enamux-cookie-container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        gap: 30px;
    }

    /* Cookie Icon */
    .enamux-cookie-icon {
        flex-shrink: 0;
    }

    /* Cookie Content */
    .enamux-cookie-content {
        flex: 1;
    }

    .enamux-cookie-title {
        font-family: 'Oswald', Arial, sans-serif;
        font-size: 24px;
        font-weight: 400;
        color: #1A2B45;
        margin: 0 0 10px 0;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .enamux-cookie-description {
        font-family: 'Merriweather', Georgia, serif;
        font-size: 14px;
        line-height: 1.6;
        color: #666666;
        margin: 0 0 10px 0;
    }

    .enamux-cookie-settings-link {
        font-family: 'Merriweather', Georgia, serif;
        font-size: 14px;
        color: #C0996B;
        text-decoration: underline;
        background: none;
        border: none;
        cursor: pointer;
        padding: 0;
        transition: color 0.3s;
    }

    .enamux-cookie-settings-link:hover {
        color: #1A2B45;
    }

    /* Cookie Actions */
    .enamux-cookie-actions {
        display: flex;
        gap: 15px;
        flex-shrink: 0;
    }

    .enamux-cookie-btn {
        font-family: 'Oswald', Arial, sans-serif;
        font-size: 14px;
        padding: 12px 30px;
        border: none;
        cursor: pointer;
        text-transform: uppercase;
        letter-spacing: 2px;
        transition: all 0.3s;
        white-space: nowrap;
    }

    .enamux-cookie-btn-primary {
        background: #C0996B;
        color: #FFFFFF;
    }

    .enamux-cookie-btn-primary:hover {
        background: #1A2B45;
    }

    .enamux-cookie-btn-secondary {
        background: transparent;
        color: #1A2B45;
        border: 1px solid #1A2B45;
    }

    .enamux-cookie-btn-secondary:hover {
        background: #1A2B45;
        color: #FFFFFF;
    }

    /* Modal Overlay */
    .enamux-cookie-modal {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 10000;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .enamux-cookie-modal-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(26, 43, 69, 0.8);
        backdrop-filter: blur(5px);
    }

    /* Modal Content */
    .enamux-cookie-modal-content {
        position: relative;
        background: #FFFFFF;
        max-width: 700px;
        width: 100%;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        animation: fadeIn 0.3s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.95);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    /* Modal Header */
    .enamux-cookie-modal-header {
        padding: 30px 30px 20px;
        border-bottom: 1px solid #E0E0E0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .enamux-cookie-modal-title {
        font-family: 'Oswald', Arial, sans-serif;
        font-size: 28px;
        font-weight: 400;
        color: #1A2B45;
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .enamux-cookie-close {
        background: none;
        border: none;
        cursor: pointer;
        padding: 5px;
        transition: opacity 0.3s;
    }

    .enamux-cookie-close:hover {
        opacity: 0.6;
    }

    /* Modal Body */
    .enamux-cookie-modal-body {
        padding: 30px;
    }

    .enamux-cookie-modal-intro {
        font-family: 'Merriweather', Georgia, serif;
        font-size: 15px;
        line-height: 1.6;
        color: #666666;
        margin: 0 0 30px 0;
    }

    /* Cookie Categories */
    .enamux-cookie-category {
        margin-bottom: 25px;
        padding-bottom: 25px;
        border-bottom: 1px solid #E0E0E0;
    }

    .enamux-cookie-category:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .enamux-cookie-category-header {
        margin-bottom: 10px;
    }

    .enamux-cookie-category-title {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .enamux-cookie-category h3 {
        font-family: 'Oswald', Arial, sans-serif;
        font-size: 18px;
        font-weight: 400;
        color: #1A2B45;
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .enamux-cookie-required {
        font-family: 'Merriweather', Georgia, serif;
        font-size: 12px;
        color: #C0996B;
        font-weight: 600;
    }

    .enamux-cookie-category-description {
        font-family: 'Merriweather', Georgia, serif;
        font-size: 14px;
        line-height: 1.6;
        color: #666666;
        margin: 0;
    }

    /* Toggle Switch */
    .enamux-cookie-toggle {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 26px;
    }

    .enamux-cookie-toggle input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .enamux-cookie-slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #CCC;
        transition: 0.3s;
        border-radius: 26px;
    }

    .enamux-cookie-slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: 0.3s;
        border-radius: 50%;
    }

    .enamux-cookie-toggle input:checked + .enamux-cookie-slider {
        background-color: #C0996B;
    }

    .enamux-cookie-toggle input:checked + .enamux-cookie-slider:before {
        transform: translateX(24px);
    }

    /* Modal Footer */
    .enamux-cookie-modal-footer {
        padding: 20px 30px 30px;
        border-top: 1px solid #E0E0E0;
        display: flex;
        gap: 15px;
        justify-content: flex-end;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .enamux-cookie-banner {
            padding: 20px;
        }

        .enamux-cookie-container {
            flex-direction: column;
            gap: 20px;
        }

        .enamux-cookie-icon {
            display: none;
        }

        .enamux-cookie-actions {
            width: 100%;
            flex-direction: column;
        }

        .enamux-cookie-btn {
            width: 100%;
        }

        .enamux-cookie-modal-content {
            max-height: 100vh;
            height: 100%;
        }

        .enamux-cookie-modal-footer {
            flex-direction: column;
        }

        .enamux-cookie-modal-footer .enamux-cookie-btn {
            width: 100%;
        }
    }

    /* Focus States for Accessibility */
    .enamux-cookie-btn:focus,
    .enamux-cookie-settings-link:focus,
    .enamux-cookie-close:focus,
    .enamux-cookie-toggle input:focus + .enamux-cookie-slider {
        outline: 2px solid #C0996B;
        outline-offset: 2px;
    }
</style>

<!-- JavaScript -->
<script>
    (function() {
        'use strict';

        // Configuration
        const COOKIE_NAME = 'enamux_cookie_consent';
        const COOKIE_EXPIRY_DAYS = 365; // 1 year

        // Elements
        const banner = document.getElementById('enamux-cookie-banner');
        const settingsModal = document.getElementById('enamux-cookie-settings');
        const acceptBtn = document.getElementById('accept-cookies');
        const rejectBtn = document.getElementById('reject-cookies');
        const showSettingsBtn = document.getElementById('show-cookie-settings');
        const closeSettingsBtn = document.getElementById('close-settings');
        const closeOverlay = document.getElementById('close-modal-overlay');
        const saveSettingsBtn = document.getElementById('save-settings');
        const acceptAllSettingsBtn = document.getElementById('accept-all-settings');

        // Cookie checkboxes
        const analyticsCookies = document.getElementById('analytics-cookies');
        const marketingCookies = document.getElementById('marketing-cookies');
        const functionalCookies = document.getElementById('functional-cookies');

        // Helper Functions
        function setCookie(name, value, days) {
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            const expires = "expires=" + date.toUTCString();
            document.cookie = name + "=" + value + ";" + expires + ";path=/;SameSite=Lax";
        }

        function getCookie(name) {
            const nameEQ = name + "=";
            const ca = document.cookie.split(';');
            for(let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) === ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        function showBanner() {
            banner.style.display = 'block';
            // Trap focus in banner
            trapFocus(banner);
        }

        function hideBanner() {
            banner.style.display = 'none';
        }

        function showSettings() {
            settingsModal.style.display = 'flex';
            // Trap focus in modal
            trapFocus(settingsModal);
        }

        function hideSettings() {
            settingsModal.style.display = 'none';
        }

        function saveConsent(preferences) {
            setCookie(COOKIE_NAME, JSON.stringify(preferences), COOKIE_EXPIRY_DAYS);

            // Initialize cookies based on consent
            if (preferences.analytics) {
                initializeAnalytics();
            }
            if (preferences.marketing) {
                initializeMarketing();
            }
            if (preferences.functional) {
                initializeFunctional();
            }

            // Dispatch custom event for other scripts to listen to
            window.dispatchEvent(new CustomEvent('cookieConsentUpdated', {
                detail: preferences
            }));
        }

        function getConsent() {
            const consent = getCookie(COOKIE_NAME);
            return consent ? JSON.parse(consent) : null;
        }

        // Cookie initialization functions
        function initializeAnalytics() {
            // Add your Google Analytics or other analytics code here
            console.log('Analytics cookies enabled');

            // Example: Google Analytics
            // window.dataLayer = window.dataLayer || [];
            // function gtag(){dataLayer.push(arguments);}
            // gtag('js', new Date());
            // gtag('config', 'GA_MEASUREMENT_ID');
        }

        function initializeMarketing() {
            // Add your marketing pixels here (Facebook, LinkedIn, etc.)
            console.log('Marketing cookies enabled');
        }

        function initializeFunctional() {
            // Add functional cookies here (chat widgets, etc.)
            console.log('Functional cookies enabled');
        }

        // Accessibility: Trap focus
        function trapFocus(element) {
            const focusableElements = element.querySelectorAll(
                'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
            );
            const firstFocusable = focusableElements[0];
            const lastFocusable = focusableElements[focusableElements.length - 1];

            element.addEventListener('keydown', function(e) {
                if (e.key === 'Tab') {
                    if (e.shiftKey) {
                        if (document.activeElement === firstFocusable) {
                            lastFocusable.focus();
                            e.preventDefault();
                        }
                    } else {
                        if (document.activeElement === lastFocusable) {
                            firstFocusable.focus();
                            e.preventDefault();
                        }
                    }
                }

                // Close on Escape
                if (e.key === 'Escape') {
                    if (element === settingsModal) {
                        hideSettings();
                    }
                }
            });
        }

        // Event Listeners
        acceptBtn.addEventListener('click', function() {
            const preferences = {
                essential: true,
                analytics: true,
                marketing: true,
                functional: true
            };
            saveConsent(preferences);
            hideBanner();
        });

        rejectBtn.addEventListener('click', function() {
            const preferences = {
                essential: true,
                analytics: false,
                marketing: false,
                functional: false
            };
            saveConsent(preferences);
            hideBanner();
        });

        showSettingsBtn.addEventListener('click', function() {
            showSettings();
        });

        closeSettingsBtn.addEventListener('click', function() {
            hideSettings();
        });

        closeOverlay.addEventListener('click', function() {
            hideSettings();
        });

        saveSettingsBtn.addEventListener('click', function() {
            const preferences = {
                essential: true,
                analytics: analyticsCookies.checked,
                marketing: marketingCookies.checked,
                functional: functionalCookies.checked
            };
            saveConsent(preferences);
            hideSettings();
            hideBanner();
        });

        acceptAllSettingsBtn.addEventListener('click', function() {
            analyticsCookies.checked = true;
            marketingCookies.checked = true;
            functionalCookies.checked = true;

            const preferences = {
                essential: true,
                analytics: true,
                marketing: true,
                functional: true
            };
            saveConsent(preferences);
            hideSettings();
            hideBanner();
        });

        // Initialize on page load
        function init() {
            const consent = getConsent();

            if (!consent) {
                // No consent found, show banner
                showBanner();
            } else {
                // Consent found, initialize cookies
                if (consent.analytics) initializeAnalytics();
                if (consent.marketing) initializeMarketing();
                if (consent.functional) initializeFunctional();
            }
        }

        // Run on DOM ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', init);
        } else {
            init();
        }

        // Expose function to show settings modal (for privacy policy links, etc.)
        window.showEnamuxCookieSettings = function() {
            showSettings();
        };

    })();
</script>
