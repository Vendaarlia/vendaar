---
title: "HEIGHT — Design System"
client: "HEIGHT"
year: "2024"
slug: "height-ds-css"
cover: "/projects/projects-img/height/result1.png"
role: "Design System Documentation"
link:
  Design Pitch: 
  Live Demo: https://www.by.vendaar.top/height/index.html
  Figma Design: https://www.figma.com/design/bcwApWuEhg1CutHJnAlQek/HEIGHT-LANDING-PAGE?node-id=0-1&t=jDT6YhRjEHD9atG1-1
architecture:
  Web Framework: "HTML, SCSS, JavaScript"
  UI Library: "Custom CSS"
  Motion: "GSAP"
---
![result](/projects/projects-img/height/result1.png)
![result](/projects/projects-img/height/result2.png)
![result](/projects/projects-img/height/result3.png)

## Case Study

# Problem

The homepage struggled with clarity because multiple value propositions were presented at the same level, creating visual competition and cognitive overload. Instead of guiding users, the layout forced them to process too much information at once, making it harder to understand the product’s core offering and reducing overall engagement and trust.

# Strategy

The approach focused on structuring content progressively to reduce decision friction and improve clarity. By using hierarchy, spacing, and controlled sequencing, the design guides users from emotional engagement to functional understanding, ensuring each section delivers a single clear message before moving to the next.

# **Design**

The design starts with a strong, immersive hero to capture attention, then transitions into structured sections that group benefits, system features, and trust elements in a logical flow. Visual hierarchy and whitespace are used to separate content clearly, while testimonials and product focus are introduced at the right moments to reinforce credibility and intent.

# **Results**

The result is a more focused and readable homepage where users can understand the product faster and with less effort. By reducing visual noise and guiding attention intentionally, the design improves clarity, strengthens trust, and creates a smoother path toward user action.

# // HEIGHT — Design System "2024"

---

## 1. Color Tokens

| Token                  | Hex         | Usage                                          |
| ---------------------- | ----------- | ---------------------------------------------- |
| `color.background`   | `#584B53` | Main page background — Deep Earth Brown       |
| `color.primary`      | `#E4BB97` | Brand Gold — Navigation, buttons, and accents |
| `color.primary-dark` | `#D1A781` | Hover state for Gold elements                  |
| `color.light`        | `#FEF5EF` | Main text and Cream component background       |
| `color.accent-blue`  | `#D6E3F8` | Secondary element background                   |
| `color.accent-red`   | `#9D5C63` | Aksen warna kontras                            |

---

## 2. Typography

### Font Families

| Role      | Family     | Provider     | Weights | Notes                             |
| --------- | ---------- | ------------ | ------- | --------------------------------- |
| Primary   | Inter      | Google Fonts | 100-900 | Main font for body and UI         |
| Secondary | Geist      | Vercel       | 100-900 | Used for sub-headings             |
| Mono      | Geist Mono | Vercel       | 100-900 | For technical elements and labels |

### Type Scale

| Token                        | Family | Size (Clamp) | Weight | Line Height | Usage                           |
| ---------------------------- | ------ | ------------ | ------ | ----------- | ------------------------------- |
| `typography.hero-title`    | Inter  | 10vw (Max)   | 800    | 110%        | Giant main title in Hero        |
| `typography.section-title` | Inter  | 55px         | 700    | 120%        | Large section title             |
| `typography.subtitle`      | Geist  | 16px - 20px  | 500    | 140%        | Component sub-title             |
| `typography.body`          | Inter  | 14px - 16px  | 400    | 160%        | Description text and paragraphs |

---

## 3. Spacing & Sizing

| Token               | Value | Tailwind      | Usage                             |
| ------------------- | ----- | ------------- | --------------------------------- |
| `spacing.xs`      | 8px   | `p-[8px]`   | Micro element spacing             |
| `spacing.sm`      | 16px  | `p-[16px]`  | Small UI element padding          |
| `spacing.md`      | 24px  | `p-[24px]`  | Card and grid padding             |
| `spacing.lg`      | 32px  | `p-[32px]`  | Margin between content blocks     |
| `spacing.section` | 80px  | `py-[80px]` | Vertical padding between sections |

---

## 4. Border Radius

| Token             | Value | Tailwind           | Usage                         |
| ----------------- | ----- | ------------------ | ----------------------------- |
| `radius.button` | 50px  | `rounded-[50px]` | Pill-shaped button            |
| `radius.card`   | 30px  | `rounded-[30px]` | Main card and modal container |
| `radius.circle` | 50%   | `rounded-full`   | Icons and circular elements   |

---

## 5. Components

### 5.1 Primary Button (`.btn-gold`)

**Status:** Stable

| Property         | Value                |
| ---------------- | -------------------- |
| Background       | `#E4BB97`          |
| Text Color       | `#584B53`          |
| Border Radius    | 50px (radius.button) |
| Hover Background | `#D1A781`          |

---

### 5.2 Product Card

**Status:** Stable

| Property        | Value                |
| --------------- | -------------------- |
| Background      | `#FEF5EF`          |
| Border Radius   | 30px (radius.card)   |
| Backdrop Filter | Blur 30px (Nav Menu) |

---

## 6. CSS Custom Properties (Quick Reference)

```css
:root {
  /* Colors */
  --bg-dark: #584b53;
  --gold: #e4bb97;
  --cream: #fef5ef;
  --blue-pale: #d6e3f8;

  /* Typography */
  --font-primary: 'Inter', sans-serif;
  --font-secondary: 'Geist', sans-serif;

  /* Radius */
  --radius-btn: 50px;
  --radius-card: 30px;
}
```

---

## 7. Token Usage Map

| **Token**           | **Value** | **Used in**                       | **Tailwind**                            |
| ------------------------- | --------------- | --------------------------------------- | --------------------------------------------- |
| `color.background`      | `#584B53`     | Page bg, all section bg, main container | `bg-[#584B53]`                              |
| `color.primer`          | `#E4BB97`     | Navbar bg, all btn-gold, active accent  | `bg-[#E4BB97]`                              |
| `color.light`           | `#FEF5EF`     | Body text, product card background      | `text-[#FEF5EF]`                            |
| `typography.h1`         | Inter 800 10vw  | Hero headline                           | `font-['Inter'] text-[10vw] font-extrabold` |
| `typography.body`       | Inter 400 16px  | Paragraph, product description          | `font-['Inter'] text-[16px]`                |
| `radius.button`         | 50px            | All action buttons                      | `rounded-[50px]`                            |
| `radius.card`           | 30px            | Card container, nav menu popup          | `rounded-[30px]`                            |
| `spacing.content-width` | 1140px          | Inner wrapper for all sections          | `max-w-[1140px]`                            |
