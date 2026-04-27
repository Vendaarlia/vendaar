---
title: "PM-Panel — Design System"
client: "Personal Project / SaaS Platform"
year: "2026"
slug: "pm-panel-ds"
cover: "/projects/projects-img/pm/result4.png"
role: "Full-stack Developer & Designer"
link:
  Live Demo: https://pm.vendaar.top
  GitHub: https://github.com/Vendaarlia/PM-panel
  Demo:
architecture:
  Runtime: "Bun"
  Web Framework: "Astro"
  UI Library: "Vue"
  Data Access: "Drizzle ORM"
  Databas: "Turso"
  Styling: "Css"
  Motion: 
  Deployment & Edge Layer: "Cloudflare Workers"
---
![result](/projects/projects-img/pm/result1.png)
![result](/projects/projects-img/pm/result2.png)
![result](/projects/projects-img/pm/result3.png)

## Case Study

# Problem

Freelancers and project managers often struggle with fragmented management tools. A major pain point is the lack of data security when handling multiple clients simultaneously, as most standard tools do not offer true data isolation, leading to potential data leakage and disorganized workflows.

# Strategy

The strategy involved architecting a multi-tenant SaaS platform using a "Master + Isolated Database" approach. By leveraging an Edge-Native architecture (Astro + Vue + Turso), we ensure that each project has its own dedicated database, providing maximum security and performance while maintaining a unified admin dashboard for the freelancer.

# Design

The design focuses on a "Clean Utility" aesthetic. We implemented a high-density, card-based interface that prioritizes data readability and fast navigation. The light-themed palette is designed to reduce cognitive load, using a modular grid system that adapts seamlessly from desktop complex data views to mobile-friendly status updates.

# Result

The platform successfully delivered a production-ready MVP that allows users to manage multiple isolated projects through a single portal. Key achievements include real-time collaboration features, automated client portal generation with shareable links, and a secure file attachment system, all within a highly scalable technical framework.

# // Optimizing Hostinger Dashboard "2026"

---

## 1. Color Tokens

| Token                    | Hex         | Usage                                          |
| ------------------------ | ----------- | ---------------------------------------------- |
| `color.background`     | `#fafafa` | Global page background color                   |
| `color.surface`        | `#ffffff` | Card background, headers, and modal surfaces   |
| `color.primary`        | `#171717` | Primary brand color used for text and borders  |
| `color.text-secondary` | `#525252` | Sub-headings and secondary descriptive text    |
| `color.text-muted`     | `#737373` | Placeholder text and less important metadata   |
| `color.border`         | `#e5e5e5` | Default border color for inputs and containers |
| `color.success`        | `#22c55e` | Success status indicators and active states    |
| `color.error`          | `#dc2626` | Error alerts and destructive action indicators |
| `color.info-bg`        | `#dbeafe` | Background for informational badges            |

---

## 2. Typography

### Font Families

| Role    | Family     | Provider      | Weights            | Notes                                  |
| ------- | ---------- | ------------- | ------------------ | -------------------------------------- |
| Primary | Sans-Serif | System/Google | 400, 500, 600, 700 | Used for all UI elements and body text |

### Type Scale

| Token                        | Family     | Size            | Weight  | Line Height | Usage                                   |
| ---------------------------- | ---------- | --------------- | ------- | ----------- | --------------------------------------- |
| `typography.hero-title`    | Sans-Serif | 32px            | 700     | 120%        | Main titles on landing and dashboards   |
| `typography.section-title` | Sans-Serif | 1.5rem (24px)   | 600     | 130%        | Card headings and sub-sections          |
| `typography.body`          | Sans-Serif | 16px            | 400     | 150%        | Standard descriptive and paragraph text |
| `typography.caption`       | Sans-Serif | 0.875rem (14px) | 400/500 | 140%        | User names, labels, and small metadata  |

---

## 3. Spacing & Sizing

| Token                     | Value   | Tailwind           | Usage                                |
| ------------------------- | ------- | ------------------ | ------------------------------------ |
| `spacing.container-max` | 1140px  | `max-w-[1140px]` | Maximum width for the inner wrapper  |
| `spacing.padding-base`  | 1rem    | `p-4`            | Default mobile and component padding |
| `spacing.padding-desk`  | 2rem    | `p-8`            | Desktop section and page padding     |
| `spacing.gap-md`        | 0.75rem | `gap-3`          | Spacing between brand logo and name  |

---

## 4. Border Radius

| Token           | Value   | Tailwind         | Usage                                |
| --------------- | ------- | ---------------- | ------------------------------------ |
| `radius.md`   | 0.5rem  | `rounded-lg`   | Buttons, badges, and input fields    |
| `radius.lg`   | 0.75rem | `rounded-xl`   | Main dashboard cards and popup menus |
| `radius.full` | 9999px  | `rounded-full` | Profile avatars and status pills     |

---

## 5. Components

### 5.1 Dashboard Grid (`.dashboard-grid`)

**Status:** Stable

| Property        | Value              |
| --------------- | ------------------ |
| Display         | Grid               |
| Desktop Columns | `repeat(3, 1fr)` |
| Tablet Columns  | `repeat(2, 1fr)` |
| Mobile Columns  | `1fr`            |
| Gap             | 1.5rem             |

---

### 5.2 Portal Header (`.portal-header`)

**Status:** Stable

| Property      | Value                             |
| ------------- | --------------------------------- |
| Background    | `var(--color-surface)`          |
| Border Bottom | `1px solid var(--color-border)` |
| Padding       | 1rem 2rem                         |
| Align Items   | Center (Flex)                     |

---

## 6. CSS Custom Properties (Quick Reference)

```css
:root {
  /* Colors */
  --color-bg: #fafafa;
  --color-surface: #ffffff;
  --color-text: #171717;
  --color-primary: #171717;
  --color-border: #e5e5e5;
  --color-success: #22c55e;
  --color-error: #dc2626;

  /* Layout */
  --container-max: 1140px;
}
```

---

## 7. Token Usage Map

| **Token**           | **Value** | **Used In**                      | **Tailwind**          |
| ------------------------- | --------------- | -------------------------------------- | --------------------------- |
| `color.background`      | `#fafafa`     | Main body, section backgrounds         | `bg-[#fafafa]`            |
| `color.primary`         | `#171717`     | Buttons, main text, active icons       | `bg-[#171717]`            |
| `color.surface`         | `#ffffff`     | Dashboard cards, header navigation     | `bg-white`                |
| `typography.h1`         | Sans-Serif 32px | Hero headlines, page headers           | `text-[32px] font-bold`   |
| `typography.body`       | Sans-Serif 16px | Descriptions, chat notes, instructions | `text-[16px] font-normal` |
| `radius.lg`             | 0.75rem         | Project cards, navigation dropdowns    | `rounded-xl`              |
| `spacing.content-width` | 1140px          | Inner layout wrapper                   | `max-w-[1140px]`          |
