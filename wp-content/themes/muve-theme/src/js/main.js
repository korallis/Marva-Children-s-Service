/**
 * MUVE Theme Main JavaScript
 */

(function($) {
    'use strict';

    // DOM Ready
    $(document).ready(function() {
        
        // Initialize mobile menu
        initMobileMenu();
        
        // Initialize smooth scrolling
        initSmoothScroll();
        
        // Initialize animations
        initAnimations();
        
        // Initialize form validation
        initFormValidation();
        
    });

    // Window Load
    $(window).on('load', function() {
        // Remove preloader if exists
        $('.preloader').fadeOut('slow');
    });

    // Window Scroll
    $(window).on('scroll', function() {
        // Sticky header
        stickyHeader();
        
        // Back to top button
        backToTopButton();
    });

    /**
     * Initialize mobile menu
     */
    function initMobileMenu() {
        $('.menu-toggle').on('click', function() {
            $(this).toggleClass('active');
            $('.primary-menu-container').toggleClass('active');
            $('body').toggleClass('menu-open');
        });

        // Close menu on outside click
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.main-navigation').length) {
                $('.menu-toggle').removeClass('active');
                $('.primary-menu-container').removeClass('active');
                $('body').removeClass('menu-open');
            }
        });
    }

    /**
     * Initialize smooth scrolling
     */
    function initSmoothScroll() {
        $('a[href*="#"]:not([href="#"])').on('click', function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 100
                    }, 800);
                    return false;
                }
            }
        });
    }

    /**
     * Initialize animations
     */
    function initAnimations() {
        // Add animation classes on scroll
        $('.animate-on-scroll').each(function() {
            var $element = $(this);
            var elementTop = $element.offset().top;
            var elementBottom = elementTop + $element.outerHeight();
            var viewportTop = $(window).scrollTop();
            var viewportBottom = viewportTop + $(window).height();

            if (elementBottom > viewportTop && elementTop < viewportBottom) {
                $element.addClass('animated');
            }
        });
    }

    /**
     * Initialize form validation
     */
    function initFormValidation() {
        $('form').on('submit', function(e) {
            var $form = $(this);
            var isValid = true;

            // Basic validation
            $form.find('[required]').each(function() {
                if (!$(this).val()) {
                    isValid = false;
                    $(this).addClass('error');
                } else {
                    $(this).removeClass('error');
                }
            });

            if (!isValid) {
                e.preventDefault();
                alert('Please fill in all required fields.');
            }
        });
    }

    /**
     * Sticky header functionality
     */
    function stickyHeader() {
        var scrollTop = $(window).scrollTop();
        
        if (scrollTop > 100) {
            $('.site-header').addClass('sticky');
        } else {
            $('.site-header').removeClass('sticky');
        }
    }

    /**
     * Back to top button
     */
    function backToTopButton() {
        var scrollTop = $(window).scrollTop();
        
        if (scrollTop > 300) {
            $('.back-to-top').fadeIn();
        } else {
            $('.back-to-top').fadeOut();
        }
    }

})(jQuery);