<?php
/**
 * The front page template file
 *
 * @package MUVE_Theme
 * @since 1.0.0
 */

get_header(); ?>

<main id="primary" class="site-main">
    
    <!-- Homepage Hero Section -->
    <section class="hero hero--homepage hero--animated hero--full">
        <div class="hero__shapes">
            <div class="shape shape--circle"></div>
            <div class="shape shape--square"></div>
            <div class="shape shape--triangle"></div>
        </div>
        
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <div class="hero__content">
                        <h1 class="hero__title">
                            Supporting Every Child's <span class="highlight">Unique Journey</span>
                        </h1>
                        <p class="hero__subtitle">
                            Specialized services for children with developmental needs
                        </p>
                        <p class="hero__description">
                            MUVE Children's Services provides compassionate, professional support 
                            to help children reach their full potential through personalized care 
                            and evidence-based interventions.
                        </p>
                        <div class="hero__actions">
                            <a href="#services" class="btn btn-large btn-playful">
                                Explore Our Services
                            </a>
                            <a href="#contact" class="btn btn-large btn-outline">
                                Get Started Today
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="hero__image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-image.jpg" 
                             alt="MUVE Children's Services" 
                             loading="eager">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Overview -->
    <section id="services" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="text-3xl font-bold text-muve-dark-blue mb-3">Our Services</h2>
                <p class="text-lg text-secondary">Comprehensive support tailored to your child's needs</p>
            </div>
            
            <div class="grid grid--3 grid--gap-lg">
                <div class="service-card">
                    <div class="service-card__icon">🌟</div>
                    <h3 class="card__title">Behavioral Support</h3>
                    <div class="card__body">
                        <p>Evidence-based interventions to help children develop positive behaviors and social skills.</p>
                    </div>
                    <div class="card__footer">
                        <a href="#" class="btn btn-secondary">Learn More</a>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-card__icon">🗣️</div>
                    <h3 class="card__title">Speech Therapy</h3>
                    <div class="card__body">
                        <p>Specialized therapy to improve communication skills and language development.</p>
                    </div>
                    <div class="card__footer">
                        <a href="#" class="btn btn-secondary">Learn More</a>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-card__icon">🏃</div>
                    <h3 class="card__title">Occupational Therapy</h3>
                    <div class="card__body">
                        <p>Helping children develop the skills needed for daily activities and independence.</p>
                    </div>
                    <div class="card__footer">
                        <a href="#" class="btn btn-secondary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="hero hero--playful hero--small" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/banner-2.png'); background-size: cover; background-position: center;">
        <div class="hero__background" style="background: rgba(255, 255, 255, 0.9);"></div>
        <div class="container position-relative">
            <div class="hero__content hero__content--centered">
                <h2 class="hero__title">Ready to Begin?</h2>
                <p class="hero__description">
                    Take the first step towards supporting your child's development. 
                    Our caring team is here to help guide you through the process.
                </p>
                <div class="hero__actions">
                    <a href="#contact" class="btn btn-large btn-rounded">Contact Us Today</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h2 class="mb-4">Get in Touch</h2>
                    <p class="text-lg mb-4">
                        We're here to answer your questions and help you get started 
                        with the right services for your child.
                    </p>
                    
                    <div class="contact-info mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <span class="text-2xl mr-3">📞</span>
                            <div>
                                <strong>Call Us</strong><br>
                                <a href="tel:1800MUVE123" class="text-muve-blue">(1800) MUVE-123</a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <span class="text-2xl mr-3">📧</span>
                            <div>
                                <strong>Email Us</strong><br>
                                <a href="mailto:info@muvechildrens.com" class="text-muve-blue">info@muvechildrens.com</a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="text-2xl mr-3">📍</span>
                            <div>
                                <strong>Visit Us</strong><br>
                                Multiple locations across the region
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-6">
                    <div class="contact-form">
                        <h3 class="mb-3">Send Us a Message</h3>
                        <?php echo do_shortcode('[contact-form-7 id="1" title="Contact form 1"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>