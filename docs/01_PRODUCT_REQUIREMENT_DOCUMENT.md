# 01_PRODUCT_REQUIREMENT_DOCUMENT.md

# Product Requirement Document (PRD)

## Project

SiSampah — Smart Integrated Waste Management Platform

Version : 3.0

Status : Draft

Document Owner : Product Manager

Development Method : Agile Scrum

Priority : Critical

---

# 1. Product Overview

SiSampah adalah platform digital terpadu yang mengelola seluruh siklus operasional Bank Sampah, mulai dari registrasi nasabah, penjadwalan penjemputan, penimbangan, pencairan saldo, edukasi, hingga analisis data lingkungan.

Platform dirancang sebagai Progressive Web Application (PWA) yang dapat berjalan pada desktop, tablet, maupun perangkat mobile tanpa perlu instalasi aplikasi native.

Sistem juga mengintegrasikan Artificial Intelligence (AI) untuk edukasi, klasifikasi sampah, rekomendasi, dan analitik.

---

# 2. Product Goals

## Business Goals

* Mendigitalisasi operasional Bank Sampah.
* Meningkatkan efisiensi proses administrasi.
* Mengurangi kesalahan pencatatan transaksi.
* Mempermudah proses pencairan saldo.
* Meningkatkan transparansi pengelolaan.

## Social Goals

* Meningkatkan kesadaran masyarakat terhadap daur ulang.
* Mendorong budaya memilah sampah dari rumah.
* Memberikan edukasi yang mudah dipahami.

## Environmental Goals

* Mengurangi volume sampah ke TPA.
* Meningkatkan jumlah sampah yang didaur ulang.
* Mengukur estimasi pengurangan emisi karbon.

---

# 3. Stakeholder

## Internal

* Product Owner
* Project Manager
* UI/UX Designer
* Backend Developer
* Frontend Developer
* DevOps Engineer
* QA Engineer

## External

* Nasabah
* Petugas
* Admin Bank Sampah
* Pemerintah Desa
* Dinas Lingkungan Hidup

---

# 4. User Persona

## Persona 1 — Nasabah

Usia: 18–60 tahun

Tujuan:

* Menjual sampah dengan mudah.
* Mengetahui saldo secara real-time.
* Mendapatkan informasi harga.

Hambatan:

* Tidak mengetahui harga terbaru.
* Tidak ingin datang langsung ke Bank Sampah.

---

## Persona 2 — Petugas

Usia: 20–50 tahun

Tujuan:

* Menyelesaikan penjemputan dengan cepat.
* Mengurangi pencatatan manual.

Hambatan:

* Banyak lokasi jemput.
* Sulit mengatur rute.

---

## Persona 3 — Administrator

Tujuan:

* Mengelola seluruh operasional.
* Membuat laporan.
* Memantau transaksi.

Hambatan:

* Data tersebar.
* Sulit melakukan evaluasi.

---

# 5. Product Scope

## In Scope

* Manajemen pengguna
* Role management
* Jadwal penjemputan
* Penimbangan
* QR Code
* Dompet digital
* Withdrawal
* Edukasi
* Artikel
* AI Assistant
* Dashboard Analitik
* Gamifikasi
* PWA
* Push Notification
* Laporan PDF
* Export Excel

## Out of Scope (Versi 1)

* Payment Gateway
* Marketplace
* Multi Bahasa
* IoT Smart Bin
* Integrasi e-wallet
* Integrasi pemerintah pusat

---

# 6. User Roles

## Guest

Hak akses:

* Landing Page
* Artikel
* Harga Sampah
* FAQ
* Registrasi

---

## Nasabah

Hak akses:

* Dashboard
* Jadwalkan Jemput
* Setor Mandiri
* Dompet
* Tarik Saldo
* Edukasi
* AI Assistant
* Leaderboard
* Profil

---

## Petugas

Hak akses:

* Dashboard
* Jadwal
* Navigasi
* QR Scanner
* Penimbangan
* Upload Bukti
* Riwayat

---

## Admin

Hak akses penuh terhadap seluruh sistem.

---

# 7. Functional Requirements

## Authentication

FR-001 Login

FR-002 Register

FR-003 Logout

FR-004 Forgot Password

FR-005 Email Verification

FR-006 Session Management

---

## Dashboard

FR-010 Dashboard Nasabah

FR-011 Dashboard Petugas

FR-012 Dashboard Admin

FR-013 Dashboard Monitoring

---

## Waste Management

FR-020 CRUD Kategori Sampah

FR-021 Harga Sampah

FR-022 Jadwal Jemput

FR-023 Setor Mandiri

FR-024 Input Timbangan

FR-025 Upload Foto

FR-026 QR Code

---

## Financial

FR-030 Saldo

FR-031 Withdrawal

FR-032 Riwayat

FR-033 Mutasi

---

## Education

FR-040 Artikel

FR-041 Video Edukasi

FR-042 Quiz

FR-043 AI Tutor

---

## Analytics

FR-050 Grafik

FR-051 Heatmap

FR-052 Statistik RT

FR-053 Statistik RW

FR-054 Statistik Desa

---

## AI

FR-060 AI Chat

FR-061 Waste Recognition

FR-062 AI Recommendation

FR-063 AI Insight

---

## Notification

FR-070 Push Notification

FR-071 WhatsApp Simulation

FR-072 Email

---

# 8. Non Functional Requirements

Availability

99.9%

Performance

< 2 detik

Scalability

10.000 pengguna

Security

OWASP Top 10

Accessibility

WCAG AA

Responsive

Desktop

Tablet

Mobile

---

# 9. Use Case Summary

Guest

* Registrasi
* Login
* Melihat artikel

Nasabah

* Jadwalkan jemput
* Tarik saldo
* Lihat transaksi
* Scan QR

Petugas

* Melihat tugas
* Menimbang sampah
* Upload bukti

Admin

* Mengelola data
* Validasi
* Laporan
* Monitoring

---

# 10. Feature Priority (MoSCoW)

## Must Have

* Login
* Dashboard
* Jadwal Jemput
* Penimbangan
* Saldo
* Withdrawal
* Artikel
* Admin Dashboard

## Should Have

* QR Code
* Leaderboard
* Badge
* Heatmap
* AI Assistant
* PWA

## Could Have

* AI Recognition
* AI Recommendation
* Offline Sync
* Carbon Calculator

## Won't Have (V1)

* IoT Smart Bin
* Marketplace
* E-commerce
* Blockchain

---

# 11. Success Metrics (KPI)

* Waktu pencatatan transaksi < 2 menit.
* Akurasi transaksi > 99%.
* Tingkat keberhasilan penjemputan > 95%.
* Pengurangan proses manual > 80%.
* Kepuasan pengguna > 4,5/5.
* Peningkatan partisipasi nasabah > 30%.
* Peningkatan volume sampah yang didaur ulang setiap bulan.

---

# 12. Risks

* Koneksi internet tidak stabil.
* Pengguna belum terbiasa menggunakan aplikasi.
* Perubahan harga sampah.
* Perangkat petugas berbeda-beda.
* Kesalahan input data.

Mitigasi:

* PWA Offline Mode.
* Validasi berlapis.
* Snapshot harga.
* Audit log.
* Sinkronisasi otomatis.

---

# 13. Product Roadmap

## Version 1.0

Digital Waste Bank

## Version 2.0

AI Assistant

## Version 3.0

Analytics & Heatmap

## Version 4.0

Waste Recognition

## Version 5.0

Regional Smart Waste Network

---

# 14. Definition of Done

Sebuah fitur dinyatakan selesai apabila:

* Seluruh acceptance criteria terpenuhi.
* Lulus pengujian unit dan integrasi.
* Memenuhi standar keamanan.
* Responsif pada desktop, tablet, dan mobile.
* Mendukung mode terang dan gelap.
* Terdokumentasi.
* Tidak menghasilkan error kritis.
* Memenuhi standar performa yang ditetapkan.

---

# 15. Guiding Principles

* User Experience First
* Security by Design
* Mobile First
* Accessibility First
* Performance First
* Scalability First
* Data Integrity
* AI as an Assistant
* Sustainability Focus
* Production Ready
