# 09_COMPONENT_LIBRARY.md

# SiSampah Component Library

Version : 3.0

Design Methodology

- Atomic Design
- Component Driven Development
- Design Token Based
- Accessible First
- Responsive First

Framework

- Laravel Blade Component
- Tailwind CSS
- Alpine.js

---

# 1. Introduction

Seluruh antarmuka SiSampah harus dibangun menggunakan komponen reusable.

Tujuan:

- Konsisten
- Mudah dipelihara
- Mudah dikembangkan
- Cepat diimplementasikan
- Mendukung Dark Mode
- Mendukung Accessibility
- Mendukung Responsive Layout

---

# 2. Atomic Design

```text
Atoms

↓

Molecules

↓

Organisms

↓

Templates

↓

Pages
```

---

# 3. Folder Structure

```text
resources/

views/

components/

atoms/

molecules/

organisms/

layouts/

pages/
```

---

# 4. Component Naming

Semua komponen menggunakan PascalCase.

Contoh

ButtonPrimary

InputText

NavbarTop

SidebarAdmin

WalletCard

TransactionTable

PickupTimeline

AIChat

---

# 5. Component Rules

Semua komponen wajib:

Responsive

Dark Mode

Accessible

Reusable

Variant

Animation

Loading State

Disabled State

Error State

---

# 6. ATOMS

## Button

Variants

Primary

Secondary

Outline

Ghost

Danger

Success

Warning

Info

Gradient

AI

Wallet

Download

Upload

Export

Icon

Floating

Square

Rounded

Small

Medium

Large

Loading

Disabled

Block

---

Props

variant

size

loading

icon

disabled

rounded

href

type

target

---

Interaction

Hover

Focus

Pressed

Loading

Disabled

---

## Icon

Library

Lucide

Size

16

20

24

28

32

40

48

---

## Badge

Variants

Success

Warning

Danger

Info

AI

Carbon

Wallet

Point

Level

Badge

Outline

Soft

Solid

---

## Avatar

Image

Initial

Online

Offline

Verified

Admin

Officer

Customer

---

## Typography

Heading

Title

Subtitle

Body

Caption

Overline

Code

Quote

---

## Divider

Horizontal

Vertical

Gradient

Dashed

---

## Spinner

Circle

Dots

Bars

Pulse

---

## Skeleton

Text

Avatar

Table

Card

Dashboard

Article

Wallet

---

# 7. MOLECULES

## Search Box

Features

Search

Clear

Voice (Future)

Suggestion

History

---

## Notification Item

Avatar

Title

Description

Time

Read Status

Action

---

## Wallet Card

Balance

Income

Expense

Point

Carbon

---

## Waste Card

Category

Price

Icon

Weight

Trend

---

## User Card

Avatar

Name

Role

Village

Status

---

## Article Card

Thumbnail

Category

Title

Description

Author

Date

Reading Time

---

## Statistic Card

Icon

Value

Percentage

Mini Chart

Trend

---

## KPI Card

Today's Pickup

Revenue

Carbon

Users

Waste

Growth

---

## AI Suggestion Card

Question

Category

Estimated Time

Action

---

# 8. ORGANISMS

## Sidebar

Logo

Navigation

Collapse

Search

User

Theme Switch

Logout

---

## Top Navigation

Search

Notification

Language

Theme

AI

Profile

---

## Bottom Navigation

Home

Pickup

Wallet

Education

Profile

---

## Dashboard Header

Greeting

Weather (Future)

Quick Action

Notification

Date

---

## Transaction Table

Search

Filter

Sort

Pagination

Export

Bulk Action

Responsive

---

## Pickup Timeline

Pending

Assigned

On The Way

Arrived

Weighing

Completed

---

## Leaderboard

Top 10

Rank

Avatar

Point

Badge

---

## Carbon Widget

CO₂ Saved

Equivalent Tree

Trend

History

---

## AI Chat

Conversation

Markdown

History

Prompt

Suggestion

Copy

Regenerate

Feedback

---

## Wallet Widget

Current Balance

Withdraw

Income

Expense

Chart

---

## Calendar

Month

Week

Day

Schedule

Holiday

Task

---

## Notification Center

Unread

Read

Archive

Delete

Filter

---

## File Upload

Drag Drop

Preview

Progress

Retry

Compression

---

## QR Scanner

Camera

Flash

Success

Retry

History

---

## Camera Capture

Preview

Retake

Upload

Compress

---

## Heatmap

Village

District

Waste Density

Color Scale

Tooltip

---

## Map

Realtime Location

Marker

Route

Cluster

Heatmap

---

# 9. TEMPLATES

Landing Page

Dashboard

Authentication

Settings

Profile

Analytics

Wallet

Pickup

Education

AI Chat

Leaderboard

Admin

Officer

---

# 10. PAGE STRUCTURE

Landing

Navbar

Hero

Features

Statistics

Testimonials

FAQ

Footer

---

Dashboard

Sidebar

Topbar

Widgets

Charts

Recent Activity

Footer

---

# 11. Component States

Idle

Hover

Focused

Pressed

Loading

Disabled

Success

Warning

Error

Empty

Offline

---

# 12. Accessibility

ARIA Label

Keyboard Navigation

Screen Reader

Focus Ring

Contrast 4.5

Tab Navigation

Escape Shortcut

---

# 13. Responsive Rules

Desktop

Sidebar Expanded

---

Laptop

Sidebar Collapse

---

Tablet

Drawer Sidebar

---

Mobile

Bottom Navigation

Floating AI

---

# 14. Theme Support

Light

Dark

High Contrast (Future)

---

# 15. Motion

Hover

Fade

Scale

Slide

Ripple

Toast

Drawer

Modal

Chart

---

# 16. Empty State

Illustration

Title

Description

CTA

---

# 17. Error State

404

500

403

Offline

Retry

Support

---

# 18. Loading State

Spinner

Skeleton

Progress

Linear Loader

---

# 19. Component Quality Standard

Semua komponen wajib memenuhi:

- Reusable
- Responsive
- Accessible
- Dark Mode Ready
- Animation Ready
- Localization Ready
- Testable
- Type Safe
- Performance Optimized

---

# 20. Component Inventory

Atoms

- 35+ komponen

Molecules

- 45+ komponen

Organisms

- 50+ komponen

Templates

- 20+ template

Pages

- 30+ halaman

Total estimasi komponen yang tersedia pada SiSampah mencapai lebih dari **180 reusable components** yang dapat digunakan kembali di seluruh aplikasi tanpa duplikasi kode.

---

# 21. Future Components

Versi berikutnya akan menambahkan:

- AI Voice Assistant
- AI Image Recognition Panel
- Smart Bin Monitoring Card
- IoT Device Card
- Carbon Trading Widget
- Government Monitoring Dashboard
- Recycling Marketplace Card
- Real-time Collaboration Panel
- Advanced Data Visualization
- Predictive Analytics Widgets

Seluruh komponen baru harus tetap mengikuti Design Token, Atomic Design, dan prinsip konsistensi visual yang telah ditetapkan dalam Design System SiSampah.