---
title: "Aftermove — portfolio"
client: "Personal Project"
year: "2023"
slug: "aftermove-ds-css"
cover: "/projects/projects-img/aftermove/result1.png"
role: "Developer"
link:
  Design Pitch: 
  Live Demo: https://www.by.vendaar.top/aftermove/index.html
  GitHub:
architecture:
  Web Framework: "HTML, CSS, JavaScript"
  UI Library: "Custom CSS"
  Motion: "GSAP, Custom Animations"
---
![result](/projects/projects-img/aftermove/result1.png)
![result](/projects/projects-img/aftermove/result2.png)
![result](/projects/projects-img/aftermove/result3.png)

## Case Study

The goal was to create a brutalist yet refined digital portfolio that emphasizes typography and motion. The design system focuses on a high-contrast dark theme to allow project imagery to stand out.

# Problem

Standard portfolios often feel generic and cluttered. The challenge was to build a navigation-heavy interface that remains intuitive while using non-traditional layouts and absolute positioning.

# Strategy

Implementation of a "Dark Aesthetic" using a limited color palette. The strategy involved using Space Mono for technical data and Inter for readability, paired with a project-listing system that utilizes hover-triggered image previews.

# // Aftermove — portfolio "2023"

---

## 1. Color Tokens

| Token                | Hex                    | Usage                                      |
| -------------------- | ---------------------- | ------------------------------------------ |
| `color.background` | `#171b1c`            | Primary dark background for the entire app |
| `color.primary`    | `#d8d8d8`            | Main text color, borders, and UI accents   |
| `color.overlay`    | `rgba(21,21,21,0.8)` | Backdrop for mobile navigation menu        |

---

## 2. Typography

### Font Families

| Role      | Family     | Provider     | Weights                 | Notes                                 |
| --------- | ---------- | ------------ | ----------------------- | ------------------------------------- |
| Primary   | Inter      | Google Fonts | 300, 400, 500, 600, 700 | Main body text and descriptions       |
| Secondary | Space Mono | Google Fonts | 400, 700                | Brand identity, headings, and UI data |

### Type Scale

| Token                     | Family     | Size           | Weight | Line Height | Usage                              |
| ------------------------- | ---------- | -------------- | ------ | ----------- | ---------------------------------- |
| `typography.study-name` | Space Mono | 4rem (64px)    | 400    | 100%        | Large project titles in listing    |
| `typography.body`       | Inter      | 1.25rem (20px) | 400    | 150%        | General paragraph and descriptions |
| `typography.nav-link`   | Space Mono | 15px           | 400    | Standard    | Navigation menu items              |
| `typography.caption`    | Space Mono | 13px           | 400    | Standard    | Small labels and metadata          |

---

## 3. Spacing & Sizing

| Token                      | Value | Tailwind      | Usage                             |
| -------------------------- | ----- | ------------- | --------------------------------- |
| `spacing.content-height` | 300px | `h-[300px]` | Fixed height for content blocks   |
| `spacing.mobile-padding` | 20px  | `p-5`       | Default padding for mobile views  |
| `spacing.study-gap`      | 40px  | `gap-10`    | Vertical spacing between projects |

---

## 4. Border Radius

| Token           | Value  | Tailwind           | Usage                              |
| --------------- | ------ | ------------------ | ---------------------------------- |
| `radius.card` | 1.5rem | `rounded-[24px]` | Mobile menu and container corners  |
| `radius.icon` | 0.5rem | `rounded-[8px]`  | Project icons and small thumbnails |

---

## 5. Components

### 5.1 Study Item (`.study`)

**Status:** Stable

| Property         | Value                      |
| ---------------- | -------------------------- |
| Text Color       | `#d8d8d8`                |
| Border Bottom    | `1px solid #d8d8d8`      |
| Hover Transition | `opacity/transform 0.3s` |

---

### 5.2 Navigation Menu

**Status:** Stable

| Property    | Value                           |
| ----------- | ------------------------------- |
| Background  | `rgba(21, 21, 21, 0.8)`       |
| Blur Effect | `backdrop-filter: blur(30px)` |
| Position    | Absolute / Sticky               |

---

## 6. CSS Custom Properties (Quick Reference)

```css
:root {
  /* Colors */
  --colors-background: #171b1c;
  --colors-primary: #d8d8d8;

  /* Typography */
  --fonts-inter: "Inter", sans-serif;
  --fonts-spaceM: "Space Mono", monospace;

  /* Font Sizes */
  --fontSizes-1: 13px;
  --fontSizes-2: 15px;
  --fontSizes-3: 17px;
}
```

---


## 7. Token Usage Map

| **Token**            | **Value** | **Used In**                      | **Tailwind**           |
| -------------------------- | --------------- | -------------------------------------- | ---------------------------- |
| `color.background`       | `#171b1c`     | Main body, section backgrounds         | `bg-[#171b1c]`             |
| `color.primary`          | `#d8d8d8`     | Text, icons, borders, active states    | `text-[#d8d8d8]`           |
| `typography.study-name`  | Space Mono 4rem | Main landing project list titles       | `font-mono text-[4rem]`    |
| `typography.body`        | Inter 1.25rem   | Case study text, paragraphs            | `font-sans text-[1.25rem]` |
| `radius.card`            | 24px            | Mobile nav menu, project preview cards | `rounded-[1.5rem]`         |
| `spacing.mobile-padding` | 20px            | Layout wrapper on mobile devices       | `p-5`                      |
