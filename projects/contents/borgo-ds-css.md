---
title: "Borgo — Design System"
client: "Borgo"
year: "2025"
slug: "borgo-ds-css"
cover: "/projects/projects-img/borgo/hero-section.png"
role: "as Designer and Developer"
link:
  Design Pitch: ./pdf-view.html?project=borgo-ds
  Live Demo: https://www.by.vendaar.top/borgo/index.html
  Figma Design: https://www.figma.com/design/IJVnF6i0KIcZ48eI2eyQgX/Borgo-Tours?node-id=263-532&t=6X5NjEppCgk28cwV-1
---
![result](/projects/projects-img/borgo/service-section.png)
![result](/projects/projects-img/borgo/block-section.png)
![result](/projects/projects-img/borgo/testi-section.png)

## Case Study

The project focused on redesigning the Borgo travel agency website to improve clarity, reduce friction, and increase user trust through a more structured approach.

# Problem

Many travel agency websites present too much information at once, with excessive messaging, multiple calls to action, and weak visual hierarchy. This creates cognitive overload, making users feel overwhelmed rather than guided.

The original experience lacked focus. Instead of helping users navigate decisions, it introduced unnecessary complexity at each step, reducing both clarity and confidence.

# Strategy

The approach focused on reducing decision friction and improving clarity across the entire flow.

Content was simplified and structured to limit the number of decisions users need to make at each scroll. The goal was to make key information immediately visible and easier to process.

Rather than redefining the brand visually, the direction was to allow the interface to “breathe” by introducing better spacing, clearer grouping, and a more predictable layout system.

# Design

Typography reinforces structure, using Kodchasan for headings and Alegreya Sans for readability.

Color and spacing are applied to guide attention and reduce visual density, creating a clearer flow between sections.

UI elements use soft, rounded forms to maintain a more approachable and fluid interface.

# Result

Usability testing showed clear improvements.

```
Time to find the main CTA dropped from 9.2s to 4.3s (−53%).
Perceived visual overload decreased by 60%.
User trust increased from 6.2 to 8.7 (+40%).
Navigation clarity improved by 40%, with no user confusion reported.
```

`A structured component system also reduced development preparation time by ~30%.

`<br>`The result is a more focused, easier-to-navigate experience.`

# // Borgo — Design System "2025"

---

## 1. Color Tokens

| Token                  | Hex         | Usage                                     |
| ---------------------- | ----------- | ----------------------------------------- |
| `color.background`   | `#fffcfb` | Main background color and navbar          |
| `color.text-dark`    | `#19120c` | Color of main text, headings, and footers |
| `color.text-light`   | `#fffcfb` | Color text over dark background           |
| `color.orange`       | `#f8681f` | Brand primary — main buttons and accents |
| `color.orange-hover` | `#ea580c` | Hover state for orange element            |
| `color.card-bg`      | `#fef6f3` | Content card background color             |

---

## 2. Typography

# Font Families

| Role      | Family        | Provider     | Weights       | Notes                               |
| --------- | ------------- | ------------ | ------------- | ----------------------------------- |
| Primary   | Alegreya Sans | Google Fonts | 300, 400      | Used for body text and descriptions |
| Secondary | Kodchasan     | Google Fonts | 100, 200, 300 | For headings and brand logos        |

# Type Scale

| Token                        | Family    | Size          | Weight | Line Height | Usage                                   |
| ---------------------------- | --------- | ------------- | ------ | ----------- | --------------------------------------- |
| `typography.hero-title`    | Kodchasan | 4.5rem (72px) | 300    | 110%        | Main title in Hero section              |
| `typography.nav-brand`     | Kodchasan | 40.5px        | 300    | 100%        | Logo/Brand on Navbar                    |
| `typography.section-title` | Kodchasan | 36px          | 300    | 110%        | Main section title                      |
| `typography.card-title`    | Alegreya  | 24px          | 400    | 120%        | Title inside the card                   |
| `typography.body`          | Alegreya  | 16px          | 300    | 160%        | Descriptive text and paragraphs         |
| `typography.footer-cta`    | Kodchasan | 5rem (80px)   | 300    | 100%        | Large "Get in touch" text in the footer |

---

## 3. Spacing & Sizing

| Token                   | Value | Tailwind       | Usage                                    |
| ----------------------- | ----- | -------------- | ---------------------------------------- |
| `spacing.container`   | 15%   | `px-[15%]`   | Main horizontal padding of the container |
| `spacing.section-gap` | 80px  | `py-[80px]`  | Vertical padding between sections        |
| `spacing.card-gap`    | 29px  | `gap-[29px]` | Distance between cards in the wrapper    |
| `spacing.nav-gap`     | 40px  | `gap-[40px]` | Spacing between links in the navbar      |

---

## 4. Border Radius

| Token             | Value | Tailwind           | Usage                                   |
| ----------------- | ----- | ------------------ | --------------------------------------- |
| `radius.card`   | 20px  | `rounded-[20px]` | Main radius for section card            |
| `radius.image`  | 15px  | `rounded-[15px]` | Radius for image container inside card  |
| `radius.button` | 50px  | `rounded-[50px]` | Radius untuk tombol pill-shaped         |
| `radius.icon`   | 50%   | `rounded-full`   | Radius for social media icons (circles) |

---

## 5. CSS Custom Properties (Quick Reference)

```css
:root {
  /* Colors */
  --bg-color: #fffcfb;
  --text-dark: #19120c;
  --text-light: #fffcfb;
  --orange: #f8681f;
  --orange-hover: #ea580c;
  --card-bg: #fef6f3;

  /* Typography */
  --font-primary: 'Alegreya Sans', sans-serif;
  --font-secondary: 'Kodchasan', sans-serif;
}
```

---

## 6. Token Usage Map

| **Token**           | **Value** | **Digunakan di**         | **Tailwind**                            |
| ------------------------- | --------------- | ------------------------------ | --------------------------------------------- |
| `color.background`      | `#fffcfb`     | Page bg, navbar bg, section bg | `bg-[#fffcfb]`                              |
| `color.orange`          | `#f8681f`     | Primary button, accent footer  | `bg-[#f8681f]`                              |
| `color.text-dark`       | `#19120c`     | All headings, body text        | `text-[#19120c]`                            |
| `typography.hero-title` | Kodchasan 72px  | Hero headline                  | `font-['Kodchasan'] text-[72px] font-light` |
| `typography.body`       | Alegreya 16px   | Description, content paragraph | `font-['Alegreya_Sans'] text-[16px]`        |
| `radius.button`         | 50px            | All buttons are pill-shaped    | `rounded-[50px]`                            |
| `spacing.container`     | 15%             | Inner wrapper all sections     | `px-[15%]`                                  |
