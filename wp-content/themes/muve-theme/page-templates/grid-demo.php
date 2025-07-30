<?php
/**
 * Template Name: Grid System Demo
 * Description: Demonstration of MUVE responsive grid system
 *
 * @package MUVE_Theme
 */

get_header(); ?>

<div class="grid-demo">
    <div class="container">
        <header class="text-center mb-5">
            <h1>MUVE Grid System</h1>
            <p class="text-lg">Mobile-first responsive grid with Flexbox and CSS Grid</p>
        </header>

        <!-- Flexbox Grid Examples -->
        <section class="mb-6">
            <h2 class="mb-4">Flexbox Grid System</h2>
            
            <h3>Basic Columns</h3>
            <div class="row mb-4">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="demo-box bg-muve-orange">col-12 col-md-6 col-lg-4</div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="demo-box bg-muve-blue">col-12 col-md-6 col-lg-4</div>
                </div>
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="demo-box bg-muve-yellow text-muve-dark-blue">col-12 col-md-12 col-lg-4</div>
                </div>
            </div>

            <h3>Auto Layout Columns</h3>
            <div class="row mb-4">
                <div class="col">
                    <div class="demo-box bg-muve-light-blue text-muve-dark-blue">col (equal width)</div>
                </div>
                <div class="col">
                    <div class="demo-box bg-muve-light-blue text-muve-dark-blue">col (equal width)</div>
                </div>
                <div class="col">
                    <div class="demo-box bg-muve-light-blue text-muve-dark-blue">col (equal width)</div>
                </div>
            </div>

            <h3>Mixed Columns</h3>
            <div class="row mb-4">
                <div class="col-12 col-sm-8">
                    <div class="demo-box bg-muve-dark-blue">col-12 col-sm-8</div>
                </div>
                <div class="col-6 col-sm-4">
                    <div class="demo-box bg-muve-orange">col-6 col-sm-4</div>
                </div>
            </div>

            <h3>Offset Columns</h3>
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="demo-box bg-muve-blue">col-md-4</div>
                </div>
                <div class="col-md-4 offset-md-4">
                    <div class="demo-box bg-muve-yellow text-muve-dark-blue">col-md-4 offset-md-4</div>
                </div>
            </div>

            <h3>Row Gutters</h3>
            <div class="row row--tight mb-3">
                <div class="col-4">
                    <div class="demo-box bg-muve-orange">Tight gutter</div>
                </div>
                <div class="col-4">
                    <div class="demo-box bg-muve-blue">Tight gutter</div>
                </div>
                <div class="col-4">
                    <div class="demo-box bg-muve-yellow text-muve-dark-blue">Tight gutter</div>
                </div>
            </div>
            <div class="row row--no-gutters mb-4">
                <div class="col-4">
                    <div class="demo-box bg-muve-orange">No gutter</div>
                </div>
                <div class="col-4">
                    <div class="demo-box bg-muve-blue">No gutter</div>
                </div>
                <div class="col-4">
                    <div class="demo-box bg-muve-yellow text-muve-dark-blue">No gutter</div>
                </div>
            </div>
        </section>

        <!-- CSS Grid Examples -->
        <section class="mb-6">
            <h2 class="mb-4">CSS Grid System</h2>
            
            <h3>Auto-fit Grid</h3>
            <div class="grid grid--3 mb-4">
                <div class="demo-box bg-muve-orange">Grid Item 1</div>
                <div class="demo-box bg-muve-blue">Grid Item 2</div>
                <div class="demo-box bg-muve-yellow text-muve-dark-blue">Grid Item 3</div>
                <div class="demo-box bg-muve-light-blue text-muve-dark-blue">Grid Item 4</div>
                <div class="demo-box bg-muve-dark-blue">Grid Item 5</div>
                <div class="demo-box bg-muve-orange">Grid Item 6</div>
            </div>

            <h3>Responsive Grid</h3>
            <div class="grid grid--2 grid--md-3 grid--lg-4 mb-4">
                <div class="demo-box bg-muve-blue">1</div>
                <div class="demo-box bg-muve-orange">2</div>
                <div class="demo-box bg-muve-yellow text-muve-dark-blue">3</div>
                <div class="demo-box bg-muve-light-blue text-muve-dark-blue">4</div>
                <div class="demo-box bg-muve-dark-blue">5</div>
                <div class="demo-box bg-muve-blue">6</div>
                <div class="demo-box bg-muve-orange">7</div>
                <div class="demo-box bg-muve-yellow text-muve-dark-blue">8</div>
            </div>

            <h3>Grid Gap Variants</h3>
            <div class="grid grid--3 grid--gap-sm mb-3">
                <div class="demo-box bg-muve-orange">Small gap</div>
                <div class="demo-box bg-muve-blue">Small gap</div>
                <div class="demo-box bg-muve-yellow text-muve-dark-blue">Small gap</div>
            </div>
            <div class="grid grid--3 grid--gap-lg mb-4">
                <div class="demo-box bg-muve-orange">Large gap</div>
                <div class="demo-box bg-muve-blue">Large gap</div>
                <div class="demo-box bg-muve-yellow text-muve-dark-blue">Large gap</div>
            </div>
        </section>

        <!-- Utility Classes -->
        <section class="mb-6">
            <h2 class="mb-4">Responsive Utilities</h2>
            
            <h3>Display Utilities</h3>
            <div class="row mb-4">
                <div class="col-12">
                    <div class="demo-box bg-muve-light-gray text-dark d-none d-md-block">
                        Visible on medium screens and up (d-none d-md-block)
                    </div>
                    <div class="demo-box bg-muve-light-gray text-dark d-md-none">
                        Visible on small screens only (d-md-none)
                    </div>
                </div>
            </div>

            <h3>Flexbox Alignment</h3>
            <div class="row align-items-center mb-4" style="min-height: 150px;">
                <div class="col">
                    <div class="demo-box bg-muve-orange">Aligned center</div>
                </div>
                <div class="col">
                    <div class="demo-box bg-muve-blue" style="height: 100px;">Taller box</div>
                </div>
                <div class="col">
                    <div class="demo-box bg-muve-yellow text-muve-dark-blue">Aligned center</div>
                </div>
            </div>

            <h3>Spacing Utilities</h3>
            <div class="mb-4">
                <div class="demo-box bg-muve-orange mb-2">margin-bottom: 2 (mb-2)</div>
                <div class="demo-box bg-muve-blue p-4">padding: 4 (p-4)</div>
                <div class="demo-box bg-muve-yellow text-muve-dark-blue mt-3 mx-auto" style="max-width: 300px;">
                    margin-top: 3, margin-x: auto
                </div>
            </div>

            <h3>Text Alignment</h3>
            <div class="row mb-4">
                <div class="col-12 col-md-4 text-left text-md-center">
                    <div class="demo-box bg-muve-light-blue text-muve-dark-blue">
                        Left on mobile, center on desktop
                    </div>
                </div>
                <div class="col-12 col-md-4 text-center">
                    <div class="demo-box bg-muve-light-blue text-muve-dark-blue">
                        Always centered
                    </div>
                </div>
                <div class="col-12 col-md-4 text-right text-md-left">
                    <div class="demo-box bg-muve-light-blue text-muve-dark-blue">
                        Right on mobile, left on desktop
                    </div>
                </div>
            </div>
        </section>

        <!-- Breakpoint Indicator -->
        <section class="mb-6">
            <h2 class="mb-4">Current Breakpoint</h2>
            <div class="breakpoint-indicator">
                <div class="d-block d-sm-none">
                    <div class="demo-box bg-muve-orange">
                        <strong>XS</strong> - Extra Small (&lt; 768px)
                    </div>
                </div>
                <div class="d-none d-sm-block d-md-none">
                    <div class="demo-box bg-muve-blue">
                        <strong>SM</strong> - Small (≥ 768px)
                    </div>
                </div>
                <div class="d-none d-md-block d-lg-none">
                    <div class="demo-box bg-muve-yellow text-muve-dark-blue">
                        <strong>MD</strong> - Medium (≥ 1024px)
                    </div>
                </div>
                <div class="d-none d-lg-block d-xl-none">
                    <div class="demo-box bg-muve-light-blue text-muve-dark-blue">
                        <strong>LG</strong> - Large (≥ 1200px)
                    </div>
                </div>
                <div class="d-none d-xl-block">
                    <div class="demo-box bg-muve-dark-blue">
                        <strong>XL</strong> - Extra Large (≥ 1440px)
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<style>
/* Grid Demo Specific Styles */
.grid-demo {
    padding: var(--spacing-2xl) 0;
}

.demo-box {
    padding: var(--spacing-md);
    text-align: center;
    border-radius: var(--radius-md);
    color: white;
    font-weight: var(--font-weight-medium);
    margin-bottom: var(--spacing-sm);
    min-height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.mb-6 {
    margin-bottom: calc(var(--spacing-xl) * 2);
}

.grid-demo h2 {
    color: var(--muve-orange);
    border-bottom: 2px solid var(--muve-light-gray);
    padding-bottom: var(--spacing-sm);
}

.grid-demo h3 {
    color: var(--muve-dark-blue);
    margin-top: var(--spacing-xl);
    margin-bottom: var(--spacing-md);
}

.breakpoint-indicator {
    font-size: var(--font-size-lg);
}
</style>

<?php get_footer(); ?>