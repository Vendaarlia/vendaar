---
title: "3D Room Walkthrough: Let Clients Experience the Space Before It's Built"
client: "Personal Project"
year: "2026"
slug: "vr-room-3d-viewer"
cover: "/projects/projects-img/vr-room/result1.webp"
role: "as Creative Developer"
link:
  Live Demo: https://www.by.vendaar.top/08312/vr-room/index.html
architecture:
  Web Framework: "HTML"
  Styling: "Css"
  Interaction: "JavaScript"
  Animation: "GSAP/DrawSVG"
  3D Engine: "Three.js"
  3D Modeling: "three.js editor"
  Deployment: "Shared Hosting"
---
![result](/projects/projects-img/vr-room/result1.webp)
![result](/projects/projects-img/vr-room/result2.gif)
![result](/projects/projects-img/vr-room/result3.gif)

## Case Study

I thought, what if architects had an easy way to show their designs to clients live? Not just static rendered images, but clients could walk inside the space, feel the scale, as if they're really there. That's my only motivation.

# Problem

Honestly, I thought I could just load it into Three.js, done. Turns out no. Materials missing, textures not loading, what appears is just a lifeless grey object. Had to export textures one by one, manually wire them up in code, learn about UV maps, node graphs, sRGB color spaces — things that for a non-3D person like me felt like learning a foreign language from scratch. So naive.

# Core 3D Experience

What I'm trying to build is simple: people can see and walk inside a 3D room through the browser. Two navigation modes:

- **Orbit Mode** — rotate, zoom, pan, look at the room from any angle.
- **FPS Walk Mode** — click the floor, the camera walks to that point. Once there, you can look around left and right with your mouse, like you're actually standing inside the room.

> Clicking the floor uses raycasting — you click a spot, the system knows it's the floor, the camera moves there. Simple.

> That's it. What I want to help with: architects have an easy way for their clients to experience the design directly, without installing software, without a VR headset, just open a browser.

# Immersive Interaction

In a web-based 3D environment, abrupt camera snapping triggers immediate user fatigue.

> I treated the transition between Orbit Mode and Walk Mode like a precise digital dolly shot. When a user taps a target vector on the floor mesh, the camera doesn't just instantly teleport; it glides along a calculated coordinate vector using custom linear interpolation (Lerp) with a smooth ease-out curve. This gives the audience a genuine, grounded sense of physical scale and spatial presence inside the room without requiring a VR headset.

# // VR Room 3D Viewer — Design System "2026"

---

## 1. Color Tokens

| Token               | Hex/Value   | Usage                                                             |
| ------------------- | ----------- | ----------------------------------------------------------------- |
| `color.bg`        | `#f5f5f3` | Canvas backdrop setting and neutral page base                     |
| `color.surface`   | `#ffffff` | Card wrappers, UI overlays, and clean content containers          |
| `color.text`      | `#0f0f0f` | Primary typography, dark background settings, and headings        |
| `color.muted`     | `#6b6b6b` | Secondary descriptions, sub-labels, and loading indicator borders |
| `color.accent`    | `#000000` | Primary high-conversion buttons and stark visual callouts         |
| `color.hov-color` | `#333333` | Interactive hover transition states for primary triggers          |
| `color.warning`   | `#ffc107` | Accent highlights, star rating icons, and system alerts           |

---

## 2. Typography

# Font Families

| Role              | Family                  | Provider              | Weights                                     | Notes                                         |
| ----------------- | ----------------------- | --------------------- | ------------------------------------------- | --------------------------------------------- |
| Primary & UI      | Inter                   | Google Fonts          | 100, 200, 300, 400, 500, 600, 700, 800, 900 | Universal body and interface font             |
| Accent & Eyebrows | Source Serif 4[cite: 2] | Google Fonts[cite: 2] | 200 to 900 (Italic)[cite: 2]                | Elegant editorial accents and quotes[cite: 2] |
| Code & Metrics    | B612 Mono[cite: 2]      | Google Fonts[cite: 2] | 100 to 900[cite: 2]                         | Data values and technical readouts[cite: 2]   |

# Type Scale

| Token                     | Size          | Weight       | Line Height   | Usage                                                                                              |
| ------------------------- | ------------- | ------------ | ------------- | -------------------------------------------------------------------------------------------------- |
| `typography.heading-xl` | 96px[cite: 2] | 700[cite: 2] | 0.95[cite: 2] | Main landing hero titles (`h1`, `.heading-xl`)[cite: 2]                                        |
| `typography.heading-lg` | 56px[cite: 2] | 700[cite: 2] | 1.2[cite: 2]  | Section titles and large metric stat values (`h2`, `.section-title`, `.stat-value`)[cite: 2] |
| `typography.heading-md` | 48px[cite: 2] | 700[cite: 2] | 1.2[cite: 2]  | Standard sub-headers (`.heading-md`)[cite: 2]                                                    |
| `typography.heading-sm` | 36px[cite: 2] | 700[cite: 2] | 1.2[cite: 2]  | CTA section overlay headers (`.cta-overlay h2`)[cite: 2]                                         |
| `typography.body-lg`    | 18px[cite: 2] | 400[cite: 2] | 1.6[cite: 2]  | Lead introduction paragraphs and large author names (`.lead`)[cite: 2]                           |
| `typography.body-md`    | 16px[cite: 2] | 400[cite: 2] | 1.6[cite: 2]  | Standard body copy and secondary descriptions (`body`)[cite: 2]                                  |
| `typography.body-sm`    | 14px[cite: 2] | 500[cite: 2] | 1.6[cite: 2]  | Button text, loading indicators, and feature text (`.btn`, `.feature p`)[cite: 2]              |
| `typography.eyebrow`    | 12px[cite: 2] | 100[cite: 2] | 1.6[cite: 2]  | Small uppercase tags and ghost button labels (`.eyebrow`)[cite: 2]                               |

---

## 3. Spacing & Sizing

| Token                      | Value           | Usage                                                                                    |
| -------------------------- | --------------- | ---------------------------------------------------------------------------------------- |
| `spacing.container-wide` | 1400px[cite: 2] | Maximum width limit for expanded grid layouts (`.container-wide`)[cite: 2]             |
| `spacing.container-max`  | 1200px[cite: 2] | Standard maximum page bounding container (`.container`)[cite: 2]                       |
| `spacing.section-gap`    | 120px[cite: 2]  | Default vertical margin applied between major layout sections (`.section`)[cite: 2]    |
| `spacing.space-4xl`      | 96px[cite: 2]   | Extra-large gap utility applied to major component separations[cite: 2]                  |
| `spacing.space-3xl`      | 64px[cite: 2]   | Internal vertical gap inside the Three.js viewer layout (`.viewer-container`)[cite: 2] |
| `spacing.space-xl`       | 32px[cite: 2]   | Standard padding for containers and feature items (`var(--space-xl)`)[cite: 2]         |
| `spacing.space-lg`       | 24px[cite: 2]   | Card internal content padding and standard layout margins[cite: 2]                       |
| `spacing.space-md`       | 16px[cite: 2]   | Standard inner grid gap utility[cite: 2]                                                 |

---

## 4. Border Radius

| Token           | Value          | Usage                                                                            |
| --------------- | -------------- | -------------------------------------------------------------------------------- |
| `radius.full` | 999px[cite: 2] | Pill-shaped trigger buttons (`.btn`) and circular spinning indicators[cite: 2] |
| `radius.lg`   | 32px[cite: 2]  | Outer corner rounding applied to large UI wrappers[cite: 2]                      |
| `radius.md`   | 24px[cite: 2]  | Standard card corner rounding (`.card`) and floating alert boxes[cite: 2]      |
| `radius.sm`   | 16px[cite: 2]  | Subtle rounding for small media components and testimonial thumbnails[cite: 2]   |

---

## 5. CSS Custom Properties (Quick Reference)

```css
:root {
  /* Colors */
  --bg: #f5f5f3;
  --surface: #ffffff;
  --text: #0f0f0f;
  --muted: #6b6b6b;
  --accent: #000000;
  --hov-color: #333;
  --white: #ffffff;
  --warning: #ffc107;

  /* Spacing Scale */
  --space-xs: 4px;
  --space-sm: 8px;
  --space-md: 16px;
  --space-lg: 24px;
  --space-xl: 32px;
  --space-3xl: 64px;
  --section-gap: 120px;

  /* Border Radius */
  --radius-sm: 16px;
  --radius-md: 24px;
  --radius-full: 999px;
}
```

---

## 6. Token Usage Map

| **Token** | **Value** | **Used on** | **Utility Method / Class Combination** |
| --- | --- | --- | --- |
| `color.surface` | `#ffffff` | `.card`, `.btn-secondary`, `.portfolio-item` | Generates clean foreground contrast layers |
| `color.accent` | `#000000` | `.btn-primary`, `.primary` | High-contrast conversion trigger colors |
| `color.muted` | `#6b6b6b` | `.feature-item p`, `.stat-label`, `h6` | De-emphasizes secondary helper typography |
| `spacing.section-gap` | 120px | `.section`, `.mt-section` | Establishes consistent vertical page rhythm |
| `radius.full` | 999px | `.btn`, `.btn-sm`, `.btn-lg` | Applies modern pill geometry to action triggers |
| `spacing.container-max` | 1200px | `.container` | Centers main layout columns via `margin: 0 auto` |