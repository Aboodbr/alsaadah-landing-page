/**
 * Front Website - Consolidated JavaScript Module
 */
document.addEventListener('DOMContentLoaded', () => {
    // 1. Language Switcher Initialization
    const langBtn = document.getElementById('langSwitcher');
    let currentLang = localStorage.getItem('site_lang') || 'ar';

    function applyLanguage(lang) {
        currentLang = lang;
        localStorage.setItem('site_lang', lang);
        document.documentElement.lang = lang;
        document.documentElement.dir = lang === 'ar' ? 'rtl' : 'ltr';

        if (langBtn) {
            langBtn.textContent = lang === 'ar' ? 'English' : 'العربية';
        }

        document.querySelectorAll('.lang-ar').forEach(el => {
            el.style.display = lang === 'ar' ? '' : 'none';
        });
        document.querySelectorAll('.lang-en').forEach(el => {
            el.style.display = lang === 'en' ? '' : 'none';
        });
    }

    applyLanguage(currentLang);

    if (langBtn) {
        langBtn.addEventListener('click', () => {
            applyLanguage(currentLang === 'ar' ? 'en' : 'ar');
        });
    }

    // 2. Navbar Scroll & Mobile Menu Toggle
    const navbar = document.getElementById('navbar');
    const menuBtn = document.getElementById('mobileMenuBtn');
    const linksNav = document.getElementById('neoLinks');

    if (navbar) {
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('scrolled', window.scrollY > 15);
        }, { passive: true });
    }

    if (menuBtn && linksNav) {
        menuBtn.addEventListener('click', () => {
            const opened = linksNav.classList.toggle('open');
            menuBtn.setAttribute('aria-expanded', String(opened));
            menuBtn.textContent = opened ? '✕' : '☰';
        });

        linksNav.querySelectorAll('a').forEach(a => {
            a.addEventListener('click', () => {
                linksNav.classList.remove('open');
                menuBtn.setAttribute('aria-expanded', 'false');
                menuBtn.textContent = '☰';
            });
        });
    }

    // 3. Hero Slider Functionality
    const slides = [...document.querySelectorAll('.neo-hero-slide')];
    const dots = [...document.querySelectorAll('#neoSliderDots button')];
    let activeSlide = 0;
    let sliderTimer = null;

    function showSlide(index) {
        if (!slides.length) return;
        activeSlide = (index + slides.length) % slides.length;
        slides.forEach((s, i) => s.classList.toggle('active', i === activeSlide));
        dots.forEach((d, i) => d.classList.toggle('active', i === activeSlide));
    }

    function startSlider() {
        if (slides.length < 2) return;
        clearInterval(sliderTimer);
        sliderTimer = setInterval(() => showSlide(activeSlide + 1), 6500);
    }

    dots.forEach((dot) => {
        dot.addEventListener('click', () => {
            showSlide(Number(dot.dataset.slide));
            startSlider();
        });
    });

    if (slides.length) {
        startSlider();
    }

    // 4. Scroll Reveal Intersection Observer
    const revealObserver = ('IntersectionObserver' in window)
        ? new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 })
        : null;

    document.querySelectorAll('.neo-reveal').forEach(el => {
        if (revealObserver) revealObserver.observe(el);
        else el.classList.add('is-visible');
    });

    // 5. 3D Tilt Effect for Cards
    if (window.matchMedia('(hover:hover) and (pointer:fine)').matches) {
        document.querySelectorAll('.neo-category, .neo-product').forEach(card => {
            card.addEventListener('mousemove', e => {
                const r = card.getBoundingClientRect();
                const x = (e.clientX - r.left) / r.width - 0.5;
                const y = (e.clientY - r.top) / r.height - 0.5;
                card.style.transform = `translateY(-8px) rotateX(${(-y * 5).toFixed(2)}deg) rotateY(${(x * 5).toFixed(2)}deg)`;
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = '';
            });
        });
    }

    // 6. Category Filtering (Products & Gallery)
    const filterBtns = document.querySelectorAll('.neo-filter-btn');
    const filterCards = document.querySelectorAll('[data-category]');

    if (filterBtns.length && filterCards.length) {
        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const filter = btn.dataset.filter;
                filterBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                filterCards.forEach(card => {
                    if (filter === 'all' || card.dataset.category === filter) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    }

    // 7. Lightbox Gallery Modal
    const lightbox = document.getElementById('neoLightbox');
    const lightboxImg = document.getElementById('neoLightboxImg');
    const lightboxClose = document.getElementById('neoLightboxClose');

    if (lightbox && lightboxImg) {
        document.querySelectorAll('[data-lightbox-src]').forEach(item => {
            item.addEventListener('click', (e) => {
                e.preventDefault();
                const src = item.dataset.lightboxSrc;
                lightboxImg.src = src;
                lightbox.classList.add('active');
            });
        });

        const closeLightbox = () => lightbox.classList.remove('active');
        if (lightboxClose) lightboxClose.addEventListener('click', closeLightbox);
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) closeLightbox();
        });
    }

    // 8. Contact Form AJAX Submission
    const contactForm = document.getElementById('neoContactForm');
    const formResponse = document.getElementById('formResponse');

    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const submitBtn = contactForm.querySelector('button[type="submit"]');
            if (submitBtn) submitBtn.disabled = true;

            fetch('assets/api/submit_contact.php', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (submitBtn) submitBtn.disabled = false;
                if (formResponse) {
                    if (data.status === 'success') {
                        formResponse.innerHTML = '<div style="padding:15px; border-radius:12px; background:rgba(15,76,35,0.1); color:var(--neo-green); font-weight:800; margin-top:15px;">✓ تم إرسال رسالتك بنجاح! شكراً لتواصلك معنا.</div>';
                        contactForm.reset();
                    } else {
                        formResponse.innerHTML = '<div style="padding:15px; border-radius:12px; background:rgba(219,68,85,0.1); color:#db4455; font-weight:800; margin-top:15px;">✕ حدث خطأ ألم يُرسل نموذجك، يُرجى التأكد من البيانات والمحاولة مجدداً.</div>';
                    }
                }
            })
            .catch(() => {
                if (submitBtn) submitBtn.disabled = false;
                if (formResponse) {
                    formResponse.innerHTML = '<div style="padding:15px; border-radius:12px; background:rgba(219,68,85,0.1); color:#db4455; font-weight:800; margin-top:15px;">✕ حدث خطأ في الاتصال بالخادم.</div>';
                }
            });
        });
    }
});
