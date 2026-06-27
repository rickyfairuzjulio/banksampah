---
name: Ecotrash Design System
colors:
  surface: '#f9f9f7'
  surface-dim: '#dadad8'
  surface-bright: '#f9f9f7'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#f4f4f1'
  surface-container: '#eeeeec'
  surface-container-high: '#e8e8e6'
  surface-container-highest: '#e2e3e0'
  on-surface: '#1a1c1b'
  on-surface-variant: '#3d4943'
  inverse-surface: '#2f3130'
  inverse-on-surface: '#f1f1ef'
  outline: '#6d7a73'
  outline-variant: '#bccac1'
  surface-tint: '#006c4e'
  primary: '#00694c'
  on-primary: '#ffffff'
  primary-container: '#008560'
  on-primary-container: '#f5fff7'
  inverse-primary: '#68dbae'
  secondary: '#57605e'
  on-secondary: '#ffffff'
  secondary-container: '#d9e2df'
  on-secondary-container: '#5c6462'
  tertiary: '#795600'
  on-tertiary: '#ffffff'
  tertiary-container: '#986d00'
  on-tertiary-container: '#fffbff'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#86f8c9'
  primary-fixed-dim: '#68dbae'
  on-primary-fixed: '#002115'
  on-primary-fixed-variant: '#00513a'
  secondary-fixed: '#dbe4e2'
  secondary-fixed-dim: '#bfc8c6'
  on-secondary-fixed: '#151d1c'
  on-secondary-fixed-variant: '#404947'
  tertiary-fixed: '#ffdea8'
  tertiary-fixed-dim: '#ffba20'
  on-tertiary-fixed: '#271900'
  on-tertiary-fixed-variant: '#5e4200'
  background: '#f9f9f7'
  on-background: '#1a1c1b'
  surface-variant: '#e2e3e0'
typography:
  display-lg:
    fontFamily: Inter
    fontSize: 32px
    fontWeight: '700'
    lineHeight: 40px
    letterSpacing: -0.02em
  headline-md:
    fontFamily: Inter
    fontSize: 24px
    fontWeight: '600'
    lineHeight: 32px
    letterSpacing: -0.01em
  headline-sm:
    fontFamily: Inter
    fontSize: 20px
    fontWeight: '600'
    lineHeight: 28px
  body-lg:
    fontFamily: Inter
    fontSize: 16px
    fontWeight: '400'
    lineHeight: 24px
  body-md:
    fontFamily: Inter
    fontSize: 14px
    fontWeight: '400'
    lineHeight: 20px
  label-md:
    fontFamily: Inter
    fontSize: 12px
    fontWeight: '600'
    lineHeight: 16px
    letterSpacing: 0.05em
  headline-lg-mobile:
    fontFamily: Inter
    fontSize: 28px
    fontWeight: '700'
    lineHeight: 36px
rounded:
  sm: 0.25rem
  DEFAULT: 0.5rem
  md: 0.75rem
  lg: 1rem
  xl: 1.5rem
  full: 9999px
spacing:
  unit: 4px
  xs: 4px
  sm: 8px
  md: 16px
  lg: 24px
  xl: 32px
  container-margin: 20px
  gutter: 16px
---

## Brand & Style
The design system is built on a foundation of **Modern Minimalism** infused with **Tactile Softness**. It aims to foster a sense of environmental responsibility within a university ecosystem by balancing academic professionalism with youthful energy. 

The brand personality is "The Sophisticated Steward"—reliable and organized, yet vibrant and community-focused. The UI avoids the clinical coldness of typical utility apps, instead utilizing generous whitespace, soft depth, and an earthy palette to create an inviting, low-stress user experience. The emotional response should be one of clarity, progress, and collective impact.

## Colors
The palette is centered around **Forest Emerald** (#1D9E75), a mature, earthy green that conveys growth and sustainability without leaning into fluorescent "eco" tropes. 

- **Primary:** Used for key actions, progress indicators, and active states.
- **Secondary:** A very pale mint tint used for large surface areas, card backgrounds, and subtle highlights to provide relief from pure white.
- **Status Indicators:** High-chroma but grounded tones of Red, Yellow, and Green are used specifically for community reporting and urgency levels.
- **Neutrals:** We use a deep charcoal (#1A1C1B) for text rather than pure black to maintain a softer, more sophisticated contrast against the white backgrounds.

## Typography
This design system utilizes **Inter** exclusively to ensure maximum readability and a systematic, clean aesthetic. 

The typographic hierarchy is characterized by tight tracking in headlines to create a "locked-in" professional look, while body text maintains standard spacing for legibility in dense informational views (like mission descriptions). Labels use a slightly increased letter spacing and semi-bold weight to distinguish metadata from interactive content.

## Layout & Spacing
The layout follows a **Fluid Grid** model optimized for mobile devices. It utilizes a 4-column structure for phone screens and an 8-column structure for tablets. 

- **Safe Zones:** A consistent 20px margin is maintained on the left and right edges of the screen.
- **Rhythm:** Vertical spacing follows an 8px baseline grid. Elements within a card use 8px or 12px gaps, while major sections are separated by 32px to provide clear visual breathing room.
- **Touch Targets:** All interactive elements maintain a minimum hit area of 44x44px, regardless of their visual size.

## Elevation & Depth
Depth is communicated through **Ambient Shadows** and **Tonal Layering**. 

1. **Base Layer:** Pure white (#FFFFFF) for the main application background.
2. **Surface Layer:** Secondary color (#F0F9F6) or white cards with a very soft, diffused shadow (Blur: 20px, Y: 4px, Opacity: 6% Black). This creates a "hovering" effect that feels light and modern.
3. **Interactive Layer:** Active buttons or cards may use a slightly deeper shadow or a 1px inner stroke in the primary color to indicate focus.
4. **Overlay Layer:** Modals and bottom sheets use a 40% dimmed backdrop to pull the user's focus entirely to the task at hand.

## Shapes
The shape language is defined by **High Circularity**. Following the "roundedness: 2" standard, the base radius is 8px (0.5rem), but for this specific university context, large containers and hero cards should push to `rounded-xl` (24px) or `rounded-2xl` (32px) to emphasize the approachable, friendly nature of the app. 

Buttons are fully pill-shaped (rounded-full) to provide a distinct contrast against the rectangular grid of cards and lists.

## Components
- **Hero Greeting Cards:** Large containers with a 24px corner radius. They feature a subtle gradient of the primary color to a slightly lighter tint and include "Display-LG" typography for personal greetings.
- **Mission Progress Bars:** 8px height tracks with a light gray-green background and a solid primary-colored fill. The leading edge of the fill is rounded to match the container.
- **Status Chips:** Small, semi-pill shapes with low-opacity backgrounds and high-saturation text (e.g., a "Hazardous" report uses a light red background with deep red text).
- **Input Fields:** Outlined style with a 12px radius. On focus, the border transitions from light gray to the 1D9E75 primary color with a 2px width.
- **Primary Buttons:** High-contrast Forest Emerald background with white Inter Bold text. Use a slight scale-down animation (98%) on press to simulate physical tactility.
- **Community Report Cards:** Featuring a "Traffic Light" vertical accent bar on the left edge (Red/Yellow/Green) to quickly communicate the severity of a reported issue.