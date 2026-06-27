# 03_SYSTEM_ARCHITECTURE.md

# System Architecture

## Project

SiSampah — Smart Integrated Waste Management Platform

Version : 3.0

Architecture Style :

* Clean Architecture
* Domain Driven Design (DDD)
* Modular Monolith
* Service Layer Pattern
* Repository Pattern
* Event Driven Architecture
* Progressive Web Application (PWA)
* RESTful API Ready

---

# 1. Architecture Vision

SiSampah dirancang sebagai platform enterprise yang modular, scalable, aman, dan mudah dipelihara.

Seluruh komponen dipisahkan berdasarkan domain bisnis sehingga perubahan pada satu modul tidak memengaruhi modul lainnya.

Arsitektur harus mampu berkembang dari implementasi Bank Sampah tingkat RT menjadi platform tingkat Kabupaten, Provinsi, bahkan Nasional tanpa perubahan besar pada struktur inti.

---

# 2. High Level Architecture

```text
                                    USER
                                      │
        ┌─────────────────────────────┼──────────────────────────────┐
        │                             │                              │
 Desktop Browser                 Mobile Browser                Tablet Browser
        │                             │                              │
        └─────────────────────────────┼──────────────────────────────┘
                                      │
                           Progressive Web Application
                                      │
──────────────────────────────────────────────────────────────────────────────
                                   Presentation Layer
──────────────────────────────────────────────────────────────────────────────

Blade Components
Tailwind CSS
Alpine.js
Charts
Leaflet
PWA

──────────────────────────────────────────────────────────────────────────────
                                 Application Layer
──────────────────────────────────────────────────────────────────────────────

Authentication

Authorization

Business Services

Transaction Services

Analytics

Notification

Education

Gamification

AI Services

Reporting

──────────────────────────────────────────────────────────────────────────────
                                   Domain Layer
──────────────────────────────────────────────────────────────────────────────

User Domain

Waste Domain

Pickup Domain

Wallet Domain

Reward Domain

Education Domain

Analytics Domain

AI Domain

──────────────────────────────────────────────────────────────────────────────
                                Infrastructure Layer
──────────────────────────────────────────────────────────────────────────────

MySQL

File Storage

Mail

Queue

Cache

Scheduler

External API

──────────────────────────────────────────────────────────────────────────────
```

---

# 3. Clean Architecture

```text
Controller

↓

Request Validation

↓

Application Service

↓

Repository Interface

↓

Repository Implementation

↓

Database

↓

Response Resource
```

Controller **tidak boleh** berisi Business Logic.

Semua Business Logic wajib berada di Service Layer.

---

# 4. Domain Driven Design

Setiap domain memiliki tanggung jawab masing-masing.

```text
Domains

Authentication

User

Waste

Pickup

Wallet

Reward

Education

Analytics

Notification

AI

Settings
```

Masing-masing domain memiliki:

```text
Controller

Service

Repository

Model

Policy

Request

Resource

Event

Listener

Notification

Observer

Test
```

---

# 5. Layer Responsibility

## Presentation Layer

Bertanggung jawab menampilkan antarmuka.

Komponen:

* Blade
* Tailwind
* Alpine
* Charts
* Maps
* Modal
* Toast

Tidak boleh mengakses database secara langsung.

---

## Application Layer

Menjalankan Business Process.

Contoh:

PickupService

WalletService

AnalyticsService

RewardService

---

## Domain Layer

Berisi Entity utama.

Contoh:

User

Waste

Transaction

Wallet

Reward

Pickup

Article

Quiz

---

## Infrastructure Layer

Berhubungan dengan:

Database

Storage

SMTP

Queue

Cache

API

---

# 6. Folder Structure

```text
app/

Actions/

Console/

Contracts/

Domains/

Exceptions/

Helpers/

Http/

Jobs/

Listeners/

Mail/

Models/

Notifications/

Observers/

Policies/

Providers/

Repositories/

Resources/

Rules/

Services/

Traits/

ValueObjects/

Enums/
```

---

# 7. Domain Structure Example

```text
Domains/

Waste/

Controllers/

Services/

Repositories/

Models/

Policies/

Requests/

Resources/

Events/

Listeners/

DTO/

Enums/

Tests/
```

Setiap Domain berdiri sendiri.

---

# 8. Service Layer

Semua logika bisnis dipindahkan ke Service.

Contoh

PickupService

bertugas:

* menerima permintaan
* validasi
* membuat transaksi
* membuat notifikasi
* membuat audit log

Controller hanya memanggil Service.

---

# 9. Repository Pattern

Controller

↓

Service

↓

Repository Interface

↓

Repository

↓

Database

Tujuan:

* mudah testing
* mudah migrasi database
* clean code

---

# 10. Event Driven Architecture

Setiap aktivitas penting menghasilkan Event.

Contoh

```text
PickupCreated

↓

Notification

↓

Audit Log

↓

Queue

↓

Email
```

Transaksi selesai

↓

WalletUpdated

↓

LeaderboardUpdated

↓

CarbonUpdated

↓

AchievementUpdated

↓

NotificationSent

Seluruh proses berjalan asynchronous.

---

# 11. Queue System

Gunakan Queue untuk:

Email

Push Notification

Generate Report

Generate PDF

AI Analysis

Leaderboard Update

Carbon Calculation

Image Optimization

Semua proses berat tidak boleh berjalan pada Request utama.

---

# 12. Scheduler

Cron setiap:

1 menit

Queue Worker

5 menit

Analytics Refresh

10 menit

Leaderboard

30 menit

AI Insight

1 jam

Cache Refresh

1 hari

Database Backup

---

# 13. Cache Strategy

Cache:

Harga Sampah

Dashboard

Leaderboard

Artikel

Kategori

Settings

Gunakan Cache Tag apabila memungkinkan.

---

# 14. Notification Architecture

Notification Center

↓

Email

↓

Push Notification

↓

WhatsApp Simulation

↓

In App Notification

↓

Activity Feed

Semua menggunakan Notification Service.

---

# 15. AI Architecture

```text
User

↓

Prompt Builder

↓

Context Builder

↓

Gemini API

↓

Response Formatter

↓

Cache

↓

Database History
```

AI tidak berinteraksi langsung dengan UI.

Semua request melalui AI Service.

---

# 16. Analytics Engine

Data

↓

Aggregation

↓

Statistics

↓

Chart Generator

↓

Heatmap

↓

Dashboard

↓

Export

---

# 17. Reporting Engine

Generate

PDF

Excel

CSV

↓

Download

↓

Archive

↓

Audit

---

# 18. Storage Architecture

Public Storage

Avatar

Waste Images

Article Images

Private Storage

Reports

Withdrawal Proof

Audit Attachment

Backup

---

# 19. Security Architecture

Authentication

↓

Authorization

↓

Middleware

↓

Validation

↓

Business Rule

↓

Audit Log

↓

Database

Setiap request wajib melewati middleware.

---

# 20. Logging

Application Log

Authentication Log

Transaction Log

Audit Log

Error Log

Security Log

API Log

Performance Log

---

# 21. Performance Strategy

Lazy Loading

Database Index

Pagination

Cache

Image Compression

Code Splitting

Deferred Loading

Queue

Background Job

Optimized Query

---

# 22. Scalability

Saat jumlah pengguna meningkat:

Load Balancer

↓

Multiple Laravel Instance

↓

Redis Queue

↓

MySQL Replication

↓

Object Storage

↓

CDN

Tidak diperlukan pada versi awal, tetapi struktur aplikasi harus siap mendukung arsitektur ini.

---

# 23. Disaster Recovery

Backup Database Harian

Backup File Mingguan

Restore Point

Audit Recovery

Transaction Rollback

Health Check

Monitoring

---

# 24. Development Standards

* PSR-12 Coding Standard
* SOLID Principle
* DRY (Don't Repeat Yourself)
* KISS (Keep It Simple)
* Clean Code
* Clean Architecture
* Domain Driven Design
* Repository Pattern
* Service Layer Pattern
* Event Driven Design
* Testable Code
* Modular Development

---

# 25. Future Architecture

Versi 1

Modular Monolith

↓

Versi 2

REST API

↓

Versi 3

Microservice AI

↓

Versi 4

IoT Integration

↓

Versi 5

Regional Smart Waste Platform

↓

Versi 6

National Smart Waste Ecosystem

Seluruh arsitektur dirancang agar mampu berkembang secara bertahap tanpa perlu melakukan penulisan ulang sistem inti (major rewrite).
