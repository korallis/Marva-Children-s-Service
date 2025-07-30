<?php
/**
 * Template Name: Component Library
 * Description: Showcase of MUVE theme components
 *
 * @package MUVE_Theme
 */

get_header(); ?>

<div class="component-library">
    <div class="container">
        <header class="component-library__header">
            <h1>MUVE Component Library</h1>
            <p class="text-lg">A comprehensive showcase of all UI components in the MUVE theme.</p>
        </header>

        <!-- Buttons Section -->
        <section class="component-section">
            <h2>Buttons</h2>
            
            <h3>Button Variants</h3>
            <div class="component-demo">
                <button class="btn">Primary Button</button>
                <button class="btn btn-secondary">Secondary Button</button>
                <button class="btn btn-accent">Accent Button</button>
                <button class="btn btn-playful">Playful Button</button>
            </div>

            <h3>Button Styles</h3>
            <div class="component-demo">
                <button class="btn btn-outline">Outline Button</button>
                <button class="btn btn-rounded">Rounded Button</button>
                <button class="btn" disabled>Disabled Button</button>
            </div>

            <h3>Button Sizes</h3>
            <div class="component-demo">
                <button class="btn btn-small">Small Button</button>
                <button class="btn">Default Button</button>
                <button class="btn btn-large">Large Button</button>
                <button class="btn btn-block">Block Button</button>
            </div>
        </section>

        <!-- Cards Section -->
        <section class="component-section">
            <h2>Cards</h2>
            
            <h3>Basic Card</h3>
            <div class="card-grid card-grid--3">
                <div class="card">
                    <div class="card__header">
                        <h3 class="card__title">Card Title</h3>
                        <p class="card__subtitle">Card subtitle goes here</p>
                    </div>
                    <div class="card__body">
                        <p>This is a basic card component with header, body, and footer sections.</p>
                    </div>
                    <div class="card__footer">
                        <button class="btn btn-secondary">Learn More</button>
                    </div>
                </div>

                <div class="service-card">
                    <div class="service-card__icon">🎨</div>
                    <h3 class="card__title">Service Card</h3>
                    <div class="card__body">
                        <p>Specialized card for displaying services with icon and hover effects.</p>
                    </div>
                </div>

                <div class="fun-fact-card">
                    <div class="fun-fact-card__number">150+</div>
                    <div class="fun-fact-card__label">Happy Families</div>
                </div>
            </div>
        </section>

        <!-- Forms Section -->
        <section class="component-section">
            <h2>Forms</h2>
            
            <h3>Form Elements</h3>
            <div class="component-demo">
                <form class="form">
                    <div class="form__group">
                        <label class="form__label form__label--required">Text Input</label>
                        <input type="text" class="form-input" placeholder="Enter text here">
                        <span class="form__hint">This is a helpful hint text</span>
                    </div>

                    <div class="form__group">
                        <label class="form__label">Select Input</label>
                        <select class="form-select">
                            <option>Choose an option</option>
                            <option>Option 1</option>
                            <option>Option 2</option>
                        </select>
                    </div>

                    <div class="form__group">
                        <label class="form__label">Textarea</label>
                        <textarea class="form-textarea" rows="4" placeholder="Enter your message"></textarea>
                    </div>

                    <div class="form__group">
                        <div class="form-check">
                            <input type="checkbox" id="check1" class="form-check__input">
                            <label for="check1" class="form-check__label">Checkbox option</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="radio1" name="radio" class="form-check__input">
                            <label for="radio1" class="form-check__label">Radio option 1</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="radio2" name="radio" class="form-check__input">
                            <label for="radio2" class="form-check__label">Radio option 2</label>
                        </div>
                    </div>

                    <div class="form__group">
                        <div class="form-switch">
                            <input type="checkbox" id="switch1" class="form-switch__input">
                            <label for="switch1" class="form-switch__label">Toggle this switch</label>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <!-- Badges Section -->
        <section class="component-section">
            <h2>Badges</h2>
            
            <h3>Badge Variants</h3>
            <div class="component-demo">
                <span class="badge badge--primary">Primary</span>
                <span class="badge badge--secondary">Secondary</span>
                <span class="badge badge--accent">Accent</span>
                <span class="badge badge--success">Success</span>
                <span class="badge badge--warning">Warning</span>
                <span class="badge badge--danger">Danger</span>
                <span class="badge badge--info">Info</span>
            </div>

            <h3>Badge Styles</h3>
            <div class="component-demo">
                <span class="badge badge--primary badge--outline">Outline</span>
                <span class="badge badge--primary badge--small">Small</span>
                <span class="badge badge--primary">Default</span>
                <span class="badge badge--primary badge--large">Large</span>
                <span class="badge badge--primary badge--playful">Playful</span>
            </div>
        </section>

        <!-- Alerts Section -->
        <section class="component-section">
            <h2>Alerts</h2>
            
            <div class="alert alert--info">
                <span class="alert__icon">ℹ️</span>
                <strong>Info Alert:</strong> This is an informational message.
            </div>

            <div class="alert alert--success">
                <span class="alert__icon">✅</span>
                <strong>Success Alert:</strong> Operation completed successfully!
            </div>

            <div class="alert alert--warning">
                <span class="alert__icon">⚠️</span>
                <strong>Warning Alert:</strong> Please review this important information.
            </div>

            <div class="alert alert--error alert--dismissible">
                <span class="alert__icon">❌</span>
                <strong>Error Alert:</strong> Something went wrong. Please try again.
                <button class="alert__close" aria-label="Close"></button>
            </div>
        </section>

        <!-- Navigation Section -->
        <section class="component-section">
            <h2>Navigation</h2>
            
            <h3>Breadcrumb</h3>
            <nav class="breadcrumb">
                <div class="breadcrumb__item">
                    <a href="#" class="breadcrumb__link">Home</a>
                </div>
                <div class="breadcrumb__item">
                    <a href="#" class="breadcrumb__link">Services</a>
                </div>
                <div class="breadcrumb__item">
                    <span class="breadcrumb__current">Behavioral Support</span>
                </div>
            </nav>

            <h3>Tabs</h3>
            <div class="tabs">
                <div class="tabs__nav">
                    <button class="tabs__item tabs__item--active">Tab 1</button>
                    <button class="tabs__item">Tab 2</button>
                    <button class="tabs__item">Tab 3</button>
                </div>
                <div class="tabs__content">
                    <div class="tabs__panel tabs__panel--active">
                        <p>Content for tab 1</p>
                    </div>
                </div>
            </div>

            <h3>Pagination</h3>
            <nav class="pagination">
                <a href="#" class="pagination__item pagination__item--prev">←</a>
                <a href="#" class="pagination__item">1</a>
                <a href="#" class="pagination__item pagination__item--active">2</a>
                <a href="#" class="pagination__item">3</a>
                <span class="pagination__ellipsis">...</span>
                <a href="#" class="pagination__item">10</a>
                <a href="#" class="pagination__item pagination__item--next">→</a>
            </nav>
        </section>

        <!-- Color Palette Section -->
        <section class="component-section">
            <h2>Color Palette</h2>
            
            <div class="color-grid">
                <div class="color-swatch">
                    <div class="color-swatch__color bg-muve-orange"></div>
                    <div class="color-swatch__info">
                        <h4>MUVE Orange</h4>
                        <code>#FF6B35</code>
                    </div>
                </div>
                <div class="color-swatch">
                    <div class="color-swatch__color bg-muve-blue"></div>
                    <div class="color-swatch__info">
                        <h4>MUVE Blue</h4>
                        <code>#4ECDC4</code>
                    </div>
                </div>
                <div class="color-swatch">
                    <div class="color-swatch__color bg-muve-yellow"></div>
                    <div class="color-swatch__info">
                        <h4>MUVE Yellow</h4>
                        <code>#FFE66D</code>
                    </div>
                </div>
                <div class="color-swatch">
                    <div class="color-swatch__color bg-muve-light-blue"></div>
                    <div class="color-swatch__info">
                        <h4>MUVE Light Blue</h4>
                        <code>#A8DADC</code>
                    </div>
                </div>
                <div class="color-swatch">
                    <div class="color-swatch__color bg-muve-dark-blue"></div>
                    <div class="color-swatch__info">
                        <h4>MUVE Dark Blue</h4>
                        <code>#1D3557</code>
                    </div>
                </div>
            </div>
        </section>

        <!-- Typography Section -->
        <section class="component-section">
            <h2>Typography</h2>
            
            <h1>Heading 1 - Poppins</h1>
            <h2>Heading 2 - Poppins</h2>
            <h3>Heading 3 - Poppins</h3>
            <h4>Heading 4 - Poppins</h4>
            <h5>Heading 5 - Poppins</h5>
            <h6>Heading 6 - Poppins</h6>
            
            <p class="text-lg">Large paragraph text using Nunito font family.</p>
            <p>Regular paragraph text using Nunito font family for body content.</p>
            <p class="text-sm text-secondary">Small secondary text for additional information.</p>
            <p class="text-playful">Playful text style using Fredoka font!</p>
        </section>
    </div>
</div>

<style>
/* Component Library Specific Styles */
.component-library {
    padding: var(--spacing-2xl) 0;
}

.component-library__header {
    text-align: center;
    margin-bottom: var(--spacing-2xl);
}

.component-library__header h1 {
    color: var(--muve-dark-blue);
    margin-bottom: var(--spacing-md);
}

.component-section {
    margin-bottom: var(--spacing-2xl);
    padding-bottom: var(--spacing-2xl);
    border-bottom: 1px solid var(--muve-light-gray);
}

.component-section:last-child {
    border-bottom: none;
}

.component-section h2 {
    color: var(--muve-orange);
    margin-bottom: var(--spacing-lg);
}

.component-section h3 {
    color: var(--muve-dark-blue);
    margin-top: var(--spacing-xl);
    margin-bottom: var(--spacing-md);
}

.component-demo {
    display: flex;
    flex-wrap: wrap;
    gap: var(--spacing-md);
    align-items: center;
    padding: var(--spacing-lg);
    background-color: var(--bg-secondary);
    border-radius: var(--radius-md);
    margin-bottom: var(--spacing-lg);
}

.color-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: var(--spacing-md);
}

.color-swatch {
    background-color: white;
    border-radius: var(--radius-md);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
}

.color-swatch__color {
    height: 100px;
}

.color-swatch__info {
    padding: var(--spacing-md);
}

.color-swatch__info h4 {
    margin-bottom: var(--spacing-xs);
    font-size: var(--font-size-base);
}

.color-swatch__info code {
    font-family: monospace;
    font-size: var(--font-size-sm);
    color: var(--text-secondary);
}
</style>

<?php get_footer(); ?>