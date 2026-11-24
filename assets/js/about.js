document.addEventListener('DOMContentLoaded', function () {
            if (window.AOS) {
                AOS.init({
                    duration: 750,
                    easing: 'ease-out-cubic',
                    once: true,
                    offset: 60
                });
            }

            const preloader = document.getElementById('preloader');

            if (preloader) {
                const hidePreloader = function () {
                    preloader.style.opacity = '0';
                    preloader.style.pointerEvents = 'none';

                    window.setTimeout(function () {
                        preloader.style.display = 'none';
                    }, 550);
                };

                if (document.readyState === 'complete') {
                    hidePreloader();
                } else {
                    window.addEventListener('load', hidePreloader, { once: true });

                    // Avoid leaving the loading screen visible if an external resource is slow.
                    window.setTimeout(hidePreloader, 2500);
                }
            }
        });
