# MUVE Design System Documentation

## 🎨 Brand Colors

### Primary Palette
- **MUVE Orange**: `#FF6B35` - Energy and enthusiasm
- **MUVE Blue**: `#4ECDC4` - Trust and calm
- **MUVE Yellow**: `#FFE66D` - Joy and playfulness

### Secondary Palette
- **MUVE Light Blue**: `#A8DADC` - Serenity
- **MUVE Dark Blue**: `#1D3557` - Professionalism
- **White**: `#FFFFFF` - Clarity
- **Light Gray**: `#F8F9FA` - Subtle backgrounds
- **Dark Gray**: `#343A40` - Text and contrast

## 📝 Typography

### Font Families
```scss
--font-primary: 'Poppins', sans-serif;    // Headings
--font-secondary: 'Nunito', sans-serif;   // Body text
--font-display: 'Fredoka', sans-serif;    // Playful elements
```

### Font Scale
```scss
--font-size-xs: 0.75rem;    // 12px
--font-size-sm: 0.875rem;   // 14px
--font-size-base: 1rem;     // 16px
--font-size-lg: 1.125rem;   // 18px
--font-size-xl: 1.25rem;    // 20px
--font-size-2xl: 1.5rem;    // 24px
--font-size-3xl: 1.875rem;  // 30px
--font-size-4xl: 2.25rem;   // 36px
--font-size-5xl: 3rem;      // 48px
```

## 🧩 Components

### Buttons
```html
<button class="btn">Primary Button</button>
<button class="btn btn-secondary">Secondary Button</button>
<button class="btn btn-playful">Playful Button ✨</button>
<button class="btn btn-outline">Outline Button</button>
<button class="btn btn-rounded">Rounded Button</button>
```

### Cards
```html
<div class="service-card">
  <div class="service-card__icon">🎯</div>
  <h3 class="card__title">Service Title</h3>
  <div class="card__body">
    <p>Service description goes here.</p>
  </div>
</div>
```

### Badges
```html
<span class="badge badge--primary">New</span>
<span class="badge badge--accent">Featured</span>
<span class="badge badge--playful">Special ✨</span>
```

### Alerts
```html
<div class="alert alert--info">
  <span class="alert__icon">ℹ️</span>
  Information message
</div>
```

## 📐 Grid System

### Containers
```html
<div class="container">Fixed width container</div>
<div class="container-fluid">Full width container</div>
```

### Flexbox Grid
```html
<div class="row">
  <div class="col-12 col-md-6 col-lg-4">Column</div>
  <div class="col-12 col-md-6 col-lg-4">Column</div>
  <div class="col-12 col-md-12 col-lg-4">Column</div>
</div>
```

### CSS Grid
```html
<div class="grid grid--3">
  <div>Grid item</div>
  <div>Grid item</div>
  <div>Grid item</div>
</div>
```

## 📱 Breakpoints

```scss
$breakpoint-xs: 480px;   // Extra small devices
$breakpoint-sm: 768px;   // Small devices (tablets)
$breakpoint-md: 1024px;  // Medium devices (small laptops)
$breakpoint-lg: 1200px;  // Large devices (desktops)
$breakpoint-xl: 1440px;  // Extra large devices
```

## 🎭 Animations

### Entrance Animations
- `fadeInUp` - Fade in from bottom
- `fadeInRight` - Fade in from right
- `float` - Gentle floating motion
- `spin` - Continuous rotation
- `gradientShift` - Animated gradient background

### Hover Effects
- Buttons lift on hover with shadow
- Cards scale slightly on hover
- Links transition color smoothly
- Playful elements reveal animations

## ♿ Accessibility

### Color Contrast
- All text meets WCAG AA standards
- Interactive elements have clear focus states
- Error states use multiple indicators (color + icon)

### Keyboard Navigation
- All interactive elements keyboard accessible
- Visible focus indicators
- Skip links for screen readers
- Proper ARIA labels

## 🚀 Usage Examples

### Hero Section
```html
<section class="hero hero--large hero--playful hero--animated">
  <div class="container">
    <div class="hero__content">
      <h1 class="hero__title">
        Welcome to <span class="highlight">MUVE</span>
      </h1>
      <p class="hero__subtitle">Supporting every child's journey</p>
      <div class="hero__actions">
        <a href="#" class="btn btn-large btn-playful">Get Started</a>
      </div>
    </div>
  </div>
</section>
```

### Service Grid
```html
<div class="grid grid--3 grid--gap-lg">
  <div class="service-card"><!-- content --></div>
  <div class="service-card"><!-- content --></div>
  <div class="service-card"><!-- content --></div>
</div>
```

## 🛠️ Utility Classes

### Spacing
- `m-{0-6}` - Margin utilities
- `p-{0-6}` - Padding utilities
- `mt-`, `mb-`, `ml-`, `mr-` - Directional spacing
- `mx-`, `my-` - Axis spacing

### Display
- `d-none`, `d-block`, `d-flex`, `d-grid`
- Responsive variants: `d-{breakpoint}-{value}`

### Text
- `text-left`, `text-center`, `text-right`
- `text-{color}` - Brand color utilities
- `font-weight-{light|normal|medium|semibold|bold}`

### Positioning
- `position-{relative|absolute|fixed|sticky}`
- `top-{0|50|100}`, `bottom-{0|50|100}`
- `start-{0|50|100}`, `end-{0|50|100}`

---

For live examples, visit:
- **Component Library**: `/component-library`
- **Grid Demo**: `/grid-demo`
- **Homepage**: `/`