---
title: "MAXIM Hair Restoration — Design System"
client: "MAXIM Hair Restoration"
year: "2025"
slug: "maxim-ds-css"
cover: "/projects/projects-img/maxim/hero-section.png"
role: "as Designer"
link:
  Design Pitch: 
  Live Demo: https://www.by.vendaar.top/maxim/index.html
  Figma Design: https://www.figma.com/design/A5bn55Pre7yH4sRsuz3bfn/MAXIM-WEBSITE?node-id=166-274&t=VE1qSMqtSUuYumvg-1
---
![result](/projects/projects-img/maxim/hero-section.png)
![result](/projects/projects-img/maxim/doctor-section.png)
![result](/projects/projects-img/maxim/shop-section.png)

## Case Study

This project focused on redesigning the homepage for Maxim Hair Restoration. My role was limited to design, with no involvement in development. As a result, the live website may not fully reflect the design presented here.

# Problem

The original structure presented multiple value points in a linear format, reducing clarity and making it harder to retain key information. Important elements such as before-and-after results and team credibility were visually under-emphasized, despite being critical trust signals.

# Strategy

The structure was reorganized into three primary groups to improve scanning and recall, while preserving the full depth of information. Secondary points were nested as sub-points to maintain clarity without losing content.

# Design

Before-and-after results were elevated to a primary section to increase visibility.

The team section was made more personal to improve approachability while keeping a professional tone.

Location details were simplified using a live map instead of static addresses.

# Results

The redesigned structure improves clarity, prioritizes key trust signals, and makes the homepage easier to scan. Information is more accessible, and critical elements are no longer overlooked.

# // MAXIM Hair Restoration "2025"

## 1. Color Tokens

| Token                  | Hex         | Usage                                         |
| ---------------------- | ----------- | --------------------------------------------- |
| `color.background`   | `#FDF5EB` | Main background of the page — Warm cream     |
| `color.primary`      | `#8B3A36` | Main brand colors — Navbar, buttons, borders |
| `color.primary-soft` | `#A25957` | Soft color accents — Info & card background  |
| `color.bg-muted`     | `#F1E2DE` | Secondary element background or hover state   |
| `color.text`         | `#2B2B2B` | Main text color (Heading & Body)              |
| `color.text-muted`   | `#6B6B6B` | Supporting text color and metadata            |

---

## 2. Typography

# Font Families

| Role    | Family | Provider     | Weights       | Notes                                  |
| ------- | ------ | ------------ | ------------- | -------------------------------------- |
| Primary | Roboto | Google Fonts | 400, 500, 700 | The main font for the entire interface |

# Type Scale

| Token                | Family | Size | Weight | Line Height | Usage                      |
| -------------------- | ------ | ---- | ------ | ----------- | -------------------------- |
| `typography.h1`    | Roboto | 75px | 700    | 100%        | Main page title            |
| `typography.h2`    | Roboto | 48px | 700    | 110%        | Large section title        |
| `typography.h3`    | Roboto | 32px | 600    | 120%        | Card title or sub-section  |
| `typography.body`  | Roboto | 16px | 400    | 150%        | Main content text          |
| `typography.small` | Roboto | 14px | 400    | 140%        | Supporting text or caption |

---

## 3. Spacing & Sizing

| Token               | Value | Tailwind       | Usage                                |
| ------------------- | ----- | -------------- | ------------------------------------ |
| `spacing.xs`      | 8px   | `gap-[8px]`  | Gap between small elements           |
| `spacing.sm`      | 16px  | `p-[16px]`   | Button padding, list gap             |
| `spacing.md`      | 24px  | `p-[24px]`   | Gap between cards, container padding |
| `spacing.lg`      | 32px  | `p-[32px]`   | Card padding, text block margin      |
| `spacing.xl`      | 48px  | `gap-[48px]` | Large gap between grids              |
| `spacing.section` | 80px  | `py-[80px]`  | Vertical padding between sections    |

---

## 4. Border Radius

| Token           | Value | Tailwind           | Usage                               |
| --------------- | ----- | ------------------ | ----------------------------------- |
| `radius.sm`   | 12px  | `rounded-[12px]` | Buttons, form input                 |
| `radius.md`   | 16px  | `rounded-[16px]` | Medium rounded image                |
| `radius.lg`   | 20px  | `rounded-[20px]` | Component card & section background |
| `radius.full` | 999px | `rounded-full`   | Filter labels & avatar              |

---

## 5. CSS Custom Properties (Quick Reference)

```css
:root {
  /* Colors */
  --primary: #8b3a36;
  --primary-soft: #A25957;
  --bg: #fdf5eb;
  --bg-muted: #f1e2de;
  --text: #2b2b2b;
  --text-muted: #6b6b6b;

  /* Spacing */
  --space-xs: 8px;
  --space-sm: 16px;
  --space-md: 24px;
  --space-lg: 32px;
  --space-section: 80px;

  /* Border Radius */
  --radius-sm: 12px;
  --radius-md: 16px;
  --radius-lg: 20px;
}
```

---

## 6. Token Usage Map

| **Token**      | **Value** | Used in                           | **Tailwind**                        |
| -------------------- | --------------- | --------------------------------- | ----------------------------------------- |
| `color.background` | `#FDF5EB`     | Main page background, section bg  | `bg-[#FDF5EB]`                          |
| `color.primary`    | `#8B3A36`     | Navbar, primary buttons, accents  | `bg-[#8B3A36]`                          |
| `color.text`       | `#2B2B2B`     | All headings, body text           | `text-[#2B2B2B]`                        |
| `typography.h1`    | Roboto 75px     | Hero titles, headline             | `font-['Roboto'] text-[75px] font-bold` |
| `radius.lg`        | 20px            | Main containers, gallery, cards   | `rounded-[20px]`                        |
| `spacing.section`  | 80px            | Vertical padding between sections | `py-[80px]`                             |
