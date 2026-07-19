/**
 * KONOK.IO - Premium Enterprise Theme JavaScript
 */

(function() {
    'use strict';

    // ============================================
    // DOM Ready
    // ============================================
    document.addEventListener('DOMContentLoaded', function() {
        initHeaderScroll();
        initBackToTop();
        initSmoothScroll();
        initAOS();
        initCounterAnimation();
        initMobileMenu();
    });

    // ============================================
    // Header Scroll Effect
    // ============================================
    function initHeaderScroll() {
        const header = document.querySelector('.corporate-header');
        if (!header) return;

        let lastScroll = 0;
        
        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;
            
            if (currentScroll > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
            
            lastScroll = currentScroll;
        });
    }

    // ============================================
    // Back to Top Button
    // ============================================
    function initBackToTop() {
        const backToTop = document.querySelector('.back-to-top');
        if (!backToTop) return;

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });

        backToTop.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // ============================================
    // Smooth Scroll
    // ============================================
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href === '#') return;
                
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    const headerHeight = document.querySelector('.corporate-header')?.offsetHeight || 0;
                    const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    // ============================================
    // AOS (Animate On Scroll)
    // ============================================
    function initAOS() {
        const aosElements = document.querySelectorAll('[data-aos]');
        
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                easing: 'ease-out',
                once: true,
                offset: 100
            });
        } else {
            // Fallback for browsers without AOS
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('aos-animate');
                    }
                });
            }, { threshold: 0.1 });

            aosElements.forEach(el => observer.observe(el));
        }
    }

    // ============================================
    // Counter Animation
    // ============================================
    function animateCounter(el) {
        const target = parseInt(el.getAttribute('data-count'));
        const suffix = el.getAttribute('data-suffix') || '';
        const duration = 2000;
        const startTime = performance.now();

        function update(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const easeOut = 1 - Math.pow(1 - progress, 3);
            const current = Math.floor(target * easeOut);

            el.textContent = current + suffix;

            if (progress < 1) {
                requestAnimationFrame(update);
            } else {
                el.textContent = target + suffix;
            }
        }

        requestAnimationFrame(update);
    }

    function initCounterAnimation() {
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('[data-count]');
                    counters.forEach(counter => {
                        if (!counter.classList.contains('counted')) {
                            counter.classList.add('counted');
                            animateCounter(counter);
                        }
                    });
                }
            });
        }, { threshold: 0.5 });

        document.querySelectorAll('.stats-grid, .stats-section, .counter-section').forEach(el => {
            counterObserver.observe(el);
        });
    }

    // ============================================
    // Mobile Menu
    // ============================================
    function initMobileMenu() {
        const navbarToggler = document.querySelector('.navbar-toggler');
        const navbarCollapse = document.querySelector('.navbar-collapse');
        
        if (!navbarToggler || !navbarCollapse) return;

        // Close menu on link click
        navbarCollapse.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth < 992) {
                    navbarCollapse.classList.remove('show');
                }
            });
        });
    }

    // ============================================
    // Form Validation
    // ============================================
    window.initFormValidation = function(form) {
        form.addEventListener('submit', function(e) {
            let isValid = true;
            
            form.querySelectorAll('[required]').forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('is-invalid');
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            if (!isValid) {
                e.preventDefault();
            }
        });
    };

    // ============================================
    // Tabs
    // ============================================
    window.initTabs = function(tabContainer) {
        const tabs = tabContainer.querySelectorAll('[data-tab]');
        const contents = tabContainer.querySelectorAll('[data-tab-content]');

        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const target = this.dataset.tab;

                tabs.forEach(t => t.classList.remove('active'));
                contents.forEach(c => c.classList.remove('active'));

                this.classList.add('active');
                const targetContent = tabContainer.querySelector(`[data-tab-content="${target}"]`);
                if (targetContent) {
                    targetContent.classList.add('active');
                }
            });
        });
    };

    // ============================================
    // Accordion
    // ============================================
    window.initAccordion = function(accordion) {
        const items = accordion.querySelectorAll('.accordion-item');

        items.forEach(item => {
            const header = item.querySelector('.accordion-header');
            const content = item.querySelector('.accordion-content');

            if (header && content) {
                header.addEventListener('click', function() {
                    const isOpen = item.classList.contains('active');

                    items.forEach(i => {
                        i.classList.remove('active');
                        const accContent = i.querySelector('.accordion-content');
                        if (accContent) {
                            accContent.style.maxHeight = '0';
                        }
                    });

                    if (!isOpen) {
                        item.classList.add('active');
                        content.style.maxHeight = content.scrollHeight + 'px';
                    }
                });
            }
        });
    };

    // ============================================
    // Search Toggle
    // ============================================
    document.querySelectorAll('[data-search-toggle]').forEach(toggle => {
        toggle.addEventListener('click', function() {
            const searchModal = document.querySelector(this.dataset.searchToggle);
            if (searchModal) {
                searchModal.classList.toggle('show');
                const input = searchModal.querySelector('input');
                if (input) input.focus();
            }
        });
    });

    // ============================================
    // Dropdown Hover Effect
    // ============================================
    if (window.innerWidth > 992) {
        document.querySelectorAll('.dropdown-hover').forEach(dropdown => {
            dropdown.addEventListener('mouseenter', function() {
                this.querySelector('.dropdown-menu')?.classList.add('show');
            });
            
            dropdown.addEventListener('mouseleave', function() {
                this.querySelector('.dropdown-menu')?.classList.remove('show');
            });
        });
    }

})();
