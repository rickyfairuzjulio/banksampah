# 02_SOFTWARE_REQUIREMENT_SPECIFICATION.md

# Software Requirement Specification (SRS)

## Project

**SiSampah – Smart Integrated Waste Management Platform**

Version : 3.0

Status : Draft

Standard : IEEE 830 / ISO 29148 Inspired

---

# 1. Introduction

## 1.1 Purpose

Dokumen ini mendefinisikan seluruh kebutuhan perangkat lunak SiSampah, termasuk kebutuhan fungsional, nonfungsional, batasan sistem, aturan bisnis, serta spesifikasi teknis yang menjadi acuan seluruh proses pengembangan.

Dokumen ini digunakan oleh:

* Product Owner
* System Analyst
* UI/UX Designer
* Backend Developer
* Frontend Developer
* QA Engineer
* DevOps Engineer

---

# 1.2 Scope

SiSampah merupakan platform pengelolaan Bank Sampah berbasis web yang menyediakan layanan:

* Manajemen pengguna
* Penjemputan sampah
* Penimbangan digital
* Dompet digital
* Withdrawal
* Edukasi
* AI Assistant
* Dashboard Analitik
* Gamifikasi
* Monitoring RT/RW
* PWA

---

# 2. System Context

```text
                   INTERNET
                        │
        ┌───────────────┴────────────────┐
        │                                │
  Desktop Browser                Mobile Browser
        │                                │
        └───────────────┬────────────────┘
                        │
                   PWA Client
                        │
                Laravel Application
                        │
 ┌─────────────┬─────────────┬─────────────┐
 │             │             │             │
Authentication Business AI Engine Analytics
 │             │             │             │
 └─────────────┴─────────────┴─────────────┘
                        │
                     MySQL
                        │
                 File Storage
```

---

# 3. Actors

## Guest

Tidak memiliki akun.

Hak akses:

* Landing Page
* Edukasi
* FAQ
* Registrasi

---

## Nasabah

Melakukan transaksi sampah.

---

## Petugas

Melakukan penjemputan dan penimbangan.

---

## Admin

Mengelola seluruh sistem.

---

## Kepala Desa (Read Only)

Monitoring laporan.

---

# 4. Business Rules

## BR-001

Nasabah hanya boleh melakukan penjadwalan jika estimasi berat minimal 5 Kg.

---

## BR-002

Harga transaksi menggunakan snapshot harga saat transaksi dibuat.

---

## BR-003

Saldo hanya bertambah apabila transaksi selesai.

---

## BR-004

Withdrawal wajib divalidasi Admin.

---

## BR-005

Admin wajib mengunggah bukti transfer sebelum status menjadi Disetujui.

---

## BR-006

Petugas hanya dapat mengakses tugas yang menjadi tanggung jawabnya.

---

## BR-007

QR Code bersifat unik untuk setiap nasabah.

---

## BR-008

Semua aktivitas penting wajib tercatat pada Audit Log.

---

# 5. Functional Requirement

## Authentication Module

AUTH-001

Login menggunakan Email.

AUTH-002

Register.

AUTH-003

Logout.

AUTH-004

Forgot Password.

AUTH-005

Remember Session.

AUTH-006

Email Verification.

AUTH-007

Role Based Access Control.

AUTH-008

Rate Limiting.

---

## Dashboard Module

Dashboard harus bersifat personal sesuai role.

Nasabah:

* Saldo
* Grafik
* Leaderboard
* Edukasi
* Jadwal

Petugas:

* Daftar Tugas
* Maps
* Target
* Insentif

Admin:

* Statistik
* Heatmap
* Pending
* Laporan

---

## Waste Module

CRUD kategori.

CRUD harga.

Kategori:

* Plastik
* Kardus
* Logam
* Kertas
* Organik
* Elektronik

Setiap kategori memiliki:

* kode
* nama
* satuan
* harga
* status

---

## Pickup Module

Nasabah memilih:

* kategori
* estimasi berat
* lokasi
* jadwal
* catatan

Sistem melakukan validasi.

Petugas menerima tugas.

Petugas menuju lokasi.

Petugas scan QR.

Petugas input berat.

Petugas upload foto.

Transaksi selesai.

Saldo otomatis bertambah.

---

## Wallet Module

Menampilkan:

Saldo

Riwayat

Mutasi

Withdrawal

---

## Education Module

Artikel

Video

Infografis

Quiz

AI Tutor

---

## AI Module

Chatbot

Waste Recognition

Recommendation

Prediction

Analytics

---

## Notification Module

In App Notification

Email

WhatsApp Simulation

Push Notification

---

# 6. Non Functional Requirement

## Security

HTTPS Only

CSRF

CSP

XSS Protection

SQL Injection Prevention

Rate Limiting

Password Hashing

Activity Log

Audit Log

Session Timeout

Role Permission

---

## Performance

TTFB < 200ms

Response < 2 second

Image Lazy Loading

Queue Background Process

Redis Cache Ready

Database Index

Pagination

---

## Scalability

Horizontal Ready

Docker Ready

REST API Ready

Service Layer

Repository Pattern

---

## Reliability

Backup Database

Automatic Retry Queue

Transaction Rollback

Error Logging

Monitoring

---

## Accessibility

WCAG AA

Keyboard Navigation

Screen Reader

Color Contrast

Focus Ring

Touch Target 44x44 px

---

# 7. User Flow

## Nasabah

Login

↓

Dashboard

↓

Jemput Sampah

↓

Validasi

↓

Menunggu Petugas

↓

Penimbangan

↓

Saldo Bertambah

↓

Riwayat

↓

Withdrawal

---

## Petugas

Login

↓

Dashboard

↓

Today's Task

↓

Navigasi

↓

QR Scan

↓

Timbang

↓

Upload Foto

↓

Submit

↓

Notifikasi

---

## Admin

Login

↓

Dashboard

↓

Validasi

↓

Monitoring

↓

Laporan

↓

Export

---

# 8. Validation Rules

Berat

Minimal 5 Kg.

Email

Unique.

Nominal Withdrawal

Tidak boleh melebihi saldo.

Foto

jpg

jpeg

png

maksimal 5 MB.

---

# 9. Audit Log

Sistem wajib mencatat:

Login

Logout

Create

Update

Delete

Withdrawal

Harga

Role

Permission

---

# 10. Error Handling

404

403

401

419

422

429

500

503

Semua error menggunakan halaman khusus.

---

# 11. Integration

Google Maps / Leaflet

Google Gemini

SMTP

Storage

QR Generator

---

# 12. Acceptance Criteria

Setiap fitur dianggap selesai apabila:

* Seluruh validasi berhasil.
* Tidak terdapat bug kritis.
* Seluruh role telah diuji.
* Responsif pada seluruh perangkat.
* Mendukung mode terang dan gelap.
* Lulus pengujian keamanan dasar.
* Lulus Lighthouse Performance minimal 95.
* Dokumentasi tersedia.

---

# 13. Future Extension

IoT Smart Bin

Computer Vision

Machine Learning Prediction

GIS Heatmap

Government Dashboard

Public API

Marketplace Daur Ulang

Carbon Credit Integration

Smart Village Integration

Regional Waste Management

---

# 14. Constraints

* Laravel 11
* PHP 8.2+
* MySQL 8+
* Tailwind CSS
* Blade Components
* Alpine.js
* PWA
* RESTful Architecture
* UUID/ULID untuk transaksi
* Session-based Authentication
* Spatie Permission
* Clean Architecture
* PSR-12 Coding Standard

---

# 15. Software Quality Attributes

Maintainability

Seluruh kode harus modular, terdokumentasi, dan mengikuti SOLID Principle.

Availability

Target uptime 99,9%.

Interoperability

Sistem harus mudah diintegrasikan dengan API eksternal.

Observability

Semua aktivitas penting harus dapat dimonitor melalui logging dan dashboard.

Portability

Aplikasi harus dapat dijalankan pada Linux server menggunakan Docker maupun deployment tradisional (Nginx/Apache + PHP-FPM).

Extensibility

Seluruh modul harus dirancang agar fitur baru seperti IoT, Computer Vision, atau integrasi pemerintah dapat ditambahkan tanpa mengubah arsitektur inti.
