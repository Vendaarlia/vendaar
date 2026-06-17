---
title: "Woney: AI-Native Full-Stack Development for Modern Fintech Landing Page"
client: "CMS exploration"
year: "2026"
slug: "woney-fintech-ds"
cover: "/projects/projects-img/woney/result1.png"
role: "Developer"
link:
  Design Pitch: 
  Live Demo: https://by.vendaar.top/08312/wmoney/
  GitHub:
architecture:
  Web Framework: "PHP 8.3 & Latte Templates"
  Styling: "Css"
  Interaction: "JavaScript"
  CMS: "Cockpit CMS (Headless)"
  Deployment & Edge Layer: "Apache Shared Hosting"
---
![result](/projects/projects-img/woney/result1.png)
![result](/projects/projects-img/woney/result2.png)
![result](/projects/projects-img/woney/result3.png)

## Case Study

Woney is a fintech landing page project designed as a functional clone of the Wise platform. This project serves as validation for Full-Stack AI-Native development workflow, where AI acts as a pair-programmer to accelerate prototyping, headless CMS integration, and responsive design.

# Problem

Modern landing page development often faces significant obstacles in traditional agency workflows:

* **Workflow Fragmentation**: Manual processes in building boilerplate and CMS integration take disproportionate time.
* **UI/UX Inconsistency**: Problems often arise when synchronizing interactive elements, such as mobile menus, with CSS classes.
* **Framework Bloat**: Reliance on heavy CSS frameworks often causes performance degradation and less precise design control.
* **Deployment Complexity**: Configuring server environments for clean URLs and subfolder deployment can be time-consuming and error-prone.

# Strategy

This approach prioritizes a modern lightweight technology stack combined with AI-assisted problem solving:

* **AI-Native Implementation**: Using AI assistants like Cascade to analyze project context across 20+ files for predictive error handling and rapid debugging.
* **Hybrid Architecture**: Combining PHP 8.3 with Latte templates for high-speed server-side rendering (SSR).
* **Headless Content Management**: Integrating Cockpit CMS to enable real-time content updates without touching core code.
* **Vanilla First Approach**: Choosing Vanilla CSS and JS to eliminate framework bloat and maintain maximum performance.

# Result

The AI-Native approach yields significant efficiency gains compared to traditional development methods:

* **Debugging Acceleration**: Mobile menu synchronization issues resolved in 5 minutes compared to 30 minutes for manual diagnosis.
* **Production Speed**: Code review and context absorption occurs 10x faster than traditional manual reading.
* **Performance Optimization**: Vanilla CSS usage results in zero framework bloat and optimized loading times.
* **Dynamic Content**: This project successfully validates headless CMS integration, enabling designers to manage content through secure APIs.

# // Woney — Design System "2026"

---

## 1. Color Tokens[cite: 15]

| Token                | Hex       | Usage                                  |
| ------------------- | -------- | ------------------------------------- |
| `color.primary`      | `#84cc16` | Warna brand utama (Lime Green)         |
| `color.primary-dark` | `#65a30d` | Primary element hover state |
| `color.secondary`    | `#1a3300` | Navigation, headings, and dark buttons |
| `color.white`        | `#ffffff` | Main background and contrast text |
| `color.gray-900`     | `#111827` | Main body text color |
| `color.success`      | `#22c55e` | Success status indicator |

---

## 2. Typography[cite: 15]

# Font Families

| Role    | Family | Provider            | Weights                 |
| ------ | ----- | ------------------ | ---------------------- |
| Primary | Inter  | System/Google Fonts | 400, 500, 600, 700, 800 |

# Type Scale

| Token | Size | Weight | Line Height | Usage |
|---------|-------|--------|-------------|---------|
| `typography.6xl` | 3.75rem | 800 | 1.05 | Main Hero Title |
| `typography.4xl` | 2.25rem | 800 | 1.05 | Section Heading |
| `typography.xl` | 1.25rem | 700 | 1.6 | Logo & Sub-headings |
| `typography.lg` | 1.125rem | 500 | 1.6 | Hero Subtitle |
| `typography.base` | 1rem | 400 | 1.6 | Main Body Text |
| `typography.sm` | 0.875rem | 600 | 1.0 | Buttons & Labels |

---

## 3. Spacing & Sizing[cite: 15]

| Token | Value | Usage |
|---------|--------|---------|
| `spacing.container` | 1280px | Maximum container width |
| `spacing.padding` | 1.5rem | Horizontal container padding |
| `spacing.space-24` | 6rem | Large section spacing |
| `spacing.space-16` | 4rem | Vertical section padding |
| `spacing.space-8` | 2rem | Grid/card element gap |

---

## 4. Border Radius[cite: 15]

| Token | Value | Usage |
|---------|--------|-------------------------|
| `radius.full` | 9999px | Pill-shaped button radius |
| `radius.2xl` | 1.5rem | Main content card radius |
| `radius.lg` | 0.75rem | Icon and brand logo radius |
| `radius.md` | 0.5rem | Input/form element radius |

---

## 5. CSS Custom Properties (Quick Reference)[cite: 15]

```css
:root {
    /* Colors */
    --color-primary: #84cc16;
    --color-secondary: #1a3300;
    --color-white: #ffffff;
    --color-gray-900: #111827;

    /* Layout */
    --container-max: 1280px;
    --radius-full: 9999px;
    --transition-base: 250ms ease;

    /* Typography */
    --font-family: 'Inter', sans-serif;
    --font-size-base: 1rem;
}
```
