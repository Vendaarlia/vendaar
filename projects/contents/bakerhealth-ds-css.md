---
title: "From Wall of Text to Scannable UI: The Baker Health Redesign"
client: "Baker Health"
year: "2026"
slug: "bakerhealth-ds-css"
cover: "/projects/projects-img/baker-health/result3.webp"
role: "as Designer"
link:
  Design Pitch: https://www.figma.com/deck/rFTHZGhe7avj3Gb75fRlNQ/bakerhealth.com?node-id=1-111
  Figma Design: https://www.figma.com/design/DNNBhP5x50NMwQGWEwzgfO/bakerhealth.com?node-id=0-1&t=ukOSNmYaVxji6Sed-1
  Live Demo: https://by.vendaar.top/08312/baker-health/
architecture:
  Web Framework: "HTML"
  Styling: "Css"
  Interaction: "JavaScript"
  Motion: "GSAP"
  Deployment & Edge Layer: "Shared Hosting"
---

![result](/projects/projects-img/baker-health/result3.webp)
![result](/projects/projects-img/baker-health/result2.webp)
![result](/projects/projects-img/baker-health/result1.webp)

## Case Study

This project involved designing an exclusive inner page for baker health to showcase their "Privileges Package" a comprehensive suite of employee benefits covering health, wellness, and financial future planning. The primary objective was to translate dense, descriptive text into an engaging, premium digital experience that aligns seamlessly with the brand's sophisticated aesthetic.

# Problem

The initial content provided by the client was extensive and text-heavy. Presenting this raw data resulted in a monotonous layout that failed to reflect the premium nature of the services.
"The design feels too text-heavy and resembles a blog rather than a polished page. It needs stronger visual direction, better hierarchy, and an aesthetic -CLIENT PROJECT CATALYST & BRIEF"

- **Information Overload:**: Preventing user fatigue while navigating extensive benefit descriptions.
- **The "Blog Vibe"**: Eliminating the continuous, unstyled text flow that undermined the brand's perceived value.
- **Brand Consistency:**: Ensuring the new components matched the established design language of existing Baker Health pages.

# Strategy

To resolve the design bottlenecks, I executed a comprehensive UI restructure focusing on content chunking and card-based architecture. The strategy transformed long paragraphs into scannable, visually enriched bite-sized sections.

- **A. Refined Hero Section**: I transitioned away from a generic full-width banner. Instead, I designed the Hero section using a beautifully boxed background image with rounded corners. This stylistic choice directly mirrored the aesthetic found on the brand's 'About' and 'Service' pages, establishing immediate visual continuity.
- **B. Card-Based Architecture**: To combat the "blog vibe," I deconstructed the extensive copy into a modular card system. I created flexible layouts, including a 1-column single-card setup and a 2-column dual-card setup. This approach allowed complex health and wellness tiers (Medical, Dental, Vision) to be distinctly compartmen-talized and easily digestible.
- **C. Premium Visual**: Flat, solid-color backgrounds were replaced with rich, high-quality photographic back-grounds for the premium offerings. Further-more, I meticulously synchronized the primary brand colors with subtle earth tones warm beiges, clean whites, and deep charcoals to foster a sense of holistic elegance and trust.

# Result

> The resulting "Baker Privileges Package" page successfully bridges the gap between comprehensive information delivery and high-end aesthetic appeal. Key achievements include:

- **1. Strong Visual Hierarchy**: By establishing clear visual focal points, the dense information was organized into intuitive layers. This ensures users can effortlessly scan through complex sections like Health & Wellness and Financial Future without feeling overwhelmed.
- **2. Elevated Brand Perception**: The integration of high-fidelity imagery, sophisticated typography, and cohesive earth tones successfully elevated the interface to a premium standard that accurately reflects the exclusive identity of a top-tier health service.
- **3. Optimized Information Architecture**: The strategic use of card-based layouts and negative space successfully eliminated the unstyled "blog vibe," transforming long-form text into engaging, bite-sized visual components.
- **4. Structure is the Ultimate Aesthetic**: Great design doesn't just make a page look better; it makes the information work harder. By prioritizing visual hierarchy and content chunking, this project successfully turned a dense, text-heavy brief into an engaging and exclusive user experience.

# Purposeful Motion

For me, animation isn't just cosmetic. If all the elements appeared at once, the audience's eyes would be overwhelmed.

> I designed the interactions on this page like a choreography. Every element's appearance, transition, and pause were precisely calculated by hand—no plugins required. The goal wasn't to show off visually, but to naturally guide the audience's eye. Measurable animation helps the audience digest dense information without fatigue, while creating a digital experience that feels vibrant and premium.

# // Baker Health — Design System "2026"

---

## 1. Color Tokens

| Token         | Hex/Value | Usage                                                                  |
| ------------- | --------- | ---------------------------------------------------------------------- |
| `color.cream` | `#f3f0ea` | Secondary card background and soft accents                             |
| `color.brown` | `#8b6f57` | Text underline accent (`.underline-accent`), icons, and minor elements |
| `color.green` | `#6b7c6a` | Primary brand color — primary button (`.btn-green`)                    |
| `color.gray`  | `#9a9a9a` | Secondary text, long descriptions, and border color                    |
| `color.dark`  | `#0f0f0f` | Navbar, hero section, footer background, and primary text color        |
| `color.white` | `#ffffff` | Main page background, contrast text color, and white buttons           |

---

## 2. Typography

# Font Families

| Role               | Family  | Provider     | Weights            | Notes                         |
| ------------------ | ------- | ------------ | ------------------ | ----------------------------- |
| Primary & Headings | DM Sans | Google Fonts | 300, 500, 600, 700 | Used universally for all text |

# Type Scale

| Token                      | Size | Weight | Line Height | Usage                                                     |
| -------------------------- | ---- | ------ | ----------- | --------------------------------------------------------- |
| `typography.hero-title-lg` | 60px | 700    | 1.05        | Main headline on desktop view                             |
| `typography.hero-title`    | 48px | 700    | 1.05        | Main headline on mobile view                              |
| `typography.footer-title`  | 30px | 700    | 1.5         | Call-to-action title in footer                            |
| `typography.card-title`    | 18px | 600    | 1.5         | Large title inside `.difference-card` component           |
| `typography.body`          | 16px | 400    | 1.5         | Primary description text, body paragraphs, and subtitle   |
| `typography.button`        | 14px | 600    | 1.0         | Standard font size for `.btn` component                   |
| `typography.label`         | 10px | 400    | 1.0         | Running text category label, badge, and section sub-title |

---

## 3. Spacing & Sizing

| Token                    | Value  | Usage                                                                    |
| ------------------------ | ------ | ------------------------------------------------------------------------ |
| `spacing.container-wide` | 1200px | Max width limit for navigation and main grid layout                      |
| `spacing.container`      | 1100px | Max width limit for standard article/page content                        |
| `spacing.section-gap-lg` | 96px   | Large vertical gap (`.py-24`, `.pb-24`) between major sections           |
| `spacing.section-gap`    | 80px   | Standard vertical gap (`.py-20`, `.pt-20`) for section padding           |
| `spacing.card-gap`       | 20px   | Gap between cards in `.insurance-grid` and `.membership-grid` components |
| `spacing.marquee-gap`    | 16px   | Gap between running items inside `.marquee-track` component              |

---

## 4. Border Radius

| Token                | Value  | Usage                                                                                  |
| -------------------- | ------ | -------------------------------------------------------------------------------------- |
| `radius.full`        | 9999px | Pill-shaped buttons, badges (`.badge`), and social media icons                         |
| `radius.hero`        | 32px   | Corner rounding for `.hero` section main frame                                         |
| `radius.card-lg`     | 28px   | Outer corner rounding for large cards (`.card-rounded`, `.membership-img`)             |
| `radius.card`        | 24px   | Standard card corner rounding (`.insurance-card`, `.service-card`, `.difference-card`) |
| `radius.navbar`      | 20px   | Special corner rounding on floating `.navbar` component                                |
| `radius.phone-notch` | 12px   | Decorative rounding for phone replica notch                                            |

---

## 5. CSS Custom Properties (Quick Reference)

```css
:root {
  /* Color Palette */
  --cream: #f3f0ea;
  --brown: #8b6f57;
  --green: #6b7c6a;
  --gray: #9a9a9a;
  --dark: #0f0f0f;
}
```

---

## 6. Token Usage Map

| **Token**               | **Value**   | **Used on**                                | **Utility Method / Class Combination**                |
| ----------------------- | ----------- | ------------------------------------------ | ----------------------------------------------------- |
| `color.dark`            | `#0f0f0f`   | `.navbar`, `.hero`, `.footer`, `.btn-dark` | Dominant dark background setting                      |
| `color.green`           | `#6b7c6a`   | `.btn-green`                               | Primary high-conversion button color                  |
| `color.brown`           | `#8b6f57`   | `.underline-accent::after`, `.badge-brown` | Decorative visual attention-grabbing elements         |
| `typography.hero-title` | 48px / 60px | `.hero-title`                              | Media query combination (`@media (min-width: 768px)`) |
| `radius.navbar`         | 20px        | `.navbar`                                  | Creates floating component with rounded corners       |
| `radius.full`           | 9999px      | `.btn-outline`, `.badge`, `.socials a`     | Ensures perfect circle / capsule shape                |
| `spacing.container`     | 1100px      | `.container`                               | Layout centering with `margin: 0 auto`                |
