---
title: "Optimizing Hostinger Dashboard"
client: "Personal Project"
year: "2025"
slug: "hostinger-ds"
cover: "/projects/projects-img/hostinger/result3.png"
role: "Designer"
link:
  Design Pitch: ./pdf-view.html?project=hostinger-ds
  Figma Design: https://www.figma.com/design/7aTNNc2DSu7FHZalv57tqv/home-dashboard-hostinger?node-id=77-2027&t=kWAt3eNUJhKaUaf1-1
  GitHub:
architecture:
  Mode: "Plan: It is not the actual architecture they are use."
  Runtime: 
  Web Framework: "NuxJS"
  UI Library: "Vue, Bootstrap"
  Data Access: ""
  Databas: "MySQL"
  Styling: "styled components"
  Motion: 
  Deployment & Edge Layer: "Amazon Web Services"
---
![result](/projects/projects-img/hostinger/result1.png)
![result](/projects/projects-img/hostinger/result2.png)
![result](/projects/projects-img/hostinger/result3.png)

## Case Study

# **Problem**

The hosting dashboard creates daily friction due to inefficient access to essential tools, lack of customization, and poor system visibility. Users managing multiple websites are forced to go through multiple steps just to perform routine actions, while the inability to organize or prioritize websites makes navigation slower and less intuitive. At the same time, the absence of a reliable notification system reduces awareness, making the interface feel static and unresponsive to real-time issues.

# **Strategy**

The approach focuses on reducing friction by prioritizing speed, control, and visibility. Instead of adding more features, the system is restructured to bring essential actions closer to the user through fewer steps, while introducing customization to adapt the interface to different workflows. At the same time, real-time awareness is integrated to ensure users can monitor and respond to issues without actively searching for information.

# **Design**

The design introduces actionable website cards that allow direct access to key tools in a single click, combined with a fully customizable website list that supports drag-and-drop, favorites, and personalized ordering. A real-time notification center is added to surface critical updates such as system status, security alerts, and resource usage, transforming the dashboard into an active control hub. The layout prioritizes essential information above the fold, ensuring that the majority of daily actions and insights are immediately visible without unnecessary navigation.

# **Results**

The result is a more efficient and responsive dashboard that significantly reduces the number of steps required for daily tasks while improving overall system awareness. Users gain more control through customization, faster access to tools, and clearer visibility of important updates, creating a workflow that feels more direct, personalized, and aligned with real usage patterns.

# // Optimizing Hostinger Dashboard "2025"

---

## 1. Color Tokens

| Token                    | Hex         | Usage                                             |
| ------------------------ | ----------- | ------------------------------------------------- |
| `color.background`     | `#F0F2F5` | Main application background (Main Canvas)         |
| `color.primary`        | `#673DE6` | Hostinger Brand Purple — Primary buttons & icons |
| `color.primary-light`  | `#EFEBFF` | Soft purple for active states and highlights      |
| `color.card-bg`        | `#FFFFFF` | Sidebar and card component background             |
| `color.text-primary`   | `#2D3134` | Headings and primary labels                       |
| `color.text-secondary` | `#72757E` | Descriptions and secondary metadata               |
| `color.status-error`   | `#EB5757` | Error alerts and expired domain indicators        |
| `color.status-success` | `#27AE60` | Active status and success indicators              |

---

## 2. Typography

### Font Families

| Role    | Family | Provider     | Weights       | Notes                                   |
| ------- | ------ | ------------ | ------------- | --------------------------------------- |
| Primary | Inter  | Google Fonts | 400, 600, 700 | Main UI font for all dashboard elements |

### Type Scale

| Token                   | Family | Size | Weight  | Line Height | Usage                    |
| ----------------------- | ------ | ---- | ------- | ----------- | ------------------------ |
| `typography.h1`       | Inter  | 24px | 700     | 120%        | Main page titles         |
| `typography.h2`       | Inter  | 18px | 600     | 120%        | Card headings            |
| `typography.body`     | Inter  | 14px | 400     | 150%        | Standard descriptions    |
| `typography.nav-item` | Inter  | 14px | 500/600 | Auto        | Sidebar navigation links |

---

## 3. Spacing & Sizing

| Token                 | Value | Tailwind      | Usage                                 |
| --------------------- | ----- | ------------- | ------------------------------------- |
| `spacing.card-p`    | 24px  | `p-6`       | Inner padding for all dashboard cards |
| `spacing.sidebar-w` | 260px | `w-[260px]` | Fixed width for sidebar navigation    |
| `spacing.gap-sm`    | 4px   | `gap-1`     | Small gaps between list items         |
| `spacing.gap-md`    | 12px  | `gap-3`     | Spacing between icon and nav text     |

---

## 4. Border Radius

| Token         | Value | Tailwind           | Usage                           |
| ------------- | ----- | ------------------ | ------------------------------- |
| `radius.lg` | 12px  | `rounded-[12px]` | Main cards and large containers |
| `radius.md` | 8px   | `rounded-[8px]`  | Buttons, inputs, and nav items  |

---

## 5. Components

### 5.1 Sidebar Navigation (`.nav-item`)

**Status:** Stable

| Property          | Value           |
| ----------------- | --------------- |
| Text Color        | `#72757E`     |
| Border Radius     | 8px (radius.md) |
| Active Background | `#EFEBFF`     |
| Active Text       | `#673DE6`     |

---

### 5.2 Dashboard Card (`.card`)

**Status:** Stable

| Property      | Value                          |
| ------------- | ------------------------------ |
| Background    | `#FFFFFF`                    |
| Border        | `1px solid #E0E2E7`          |
| Border Radius | 12px (radius.lg)               |
| Shadow        | `0 2px 4px rgba(0,0,0,0.05)` |

---

## 6. CSS Custom Properties (Quick Reference)

```css

:root {
    /* Colors */
    --primary-purple: #673DE6;
    --primary-light: #EFEBFF;
    --bg-main: #F0F2F5;
    --bg-card: #FFFFFF;
  
    /* Semantic */
    --status-error: #EB5757;
    --status-success: #27AE60;
    --border-color: #E0E2E7;

    /* Radius */
    --radius-lg: 12px;
    --radius-md: 8px;
}
```

---

## 7. Token Usage Map

| **Token**         | **Value** | **Used In**                           | **Tailwind**                       |
| ----------------------- | --------------- | ------------------------------------------- | ---------------------------------------- |
| `color.background`    | `#F0F2F5`     | App main canvas, dashboard background       | `bg-[#F0F2F5]`                         |
| `color.primary`       | `#673DE6`     | Active nav items, primary buttons, branding | `bg-[#673DE6]`                         |
| `color.card-bg`       | `#FFFFFF`     | All cards, sidebar, navigation menus        | `bg-white`                             |
| `typography.h1`       | Inter 700 24px  | Main dashboard titles                       | `font-['Inter'] text-[24px] font-bold` |
| `typography.nav-item` | Inter 500 14px  | Sidebar links, dropdown items               | `font-['Inter'] text-[14px]`           |
| `radius.lg`           | 12px            | Main dashboard cards, resource widgets      | `rounded-[12px]`                       |
| `spacing.sidebar-w`   | 260px           | Main navigation drawer                      | `w-[260px]`                            |
