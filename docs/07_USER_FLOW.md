# 07_USER_FLOW.md

# User Flow Documentation

Project : SiSampah Smart Integrated Waste Management Platform

Version : 3.0

Last Update : June 2026

---

# 1. Overview

User Flow menjelaskan perjalanan setiap pengguna ketika menggunakan sistem.

Dokumen ini digunakan oleh:

- UI Designer
- UX Designer
- Frontend Developer
- Backend Developer
- QA Engineer
- Product Manager

Setiap flow memiliki:

- Entry Point
- Action
- Decision
- System Process
- Exit Point

---

# 2. User Roles

Platform memiliki lima role utama.

Guest

↓

Nasabah

↓

Petugas

↓

Admin

↓

Super Admin

---

# 3. Global Navigation Flow

```text
Landing Page

↓

Login / Register

↓

Authentication

↓

Role Detection

↓

Dashboard

↓

Feature

↓

Logout
```

---

# 4. Guest Flow

```text
Landing Page

↓

Tentang Kami

↓

Cara Kerja

↓

Harga Sampah

↓

Artikel

↓

FAQ

↓

Register

↓

Login
```

Guest tidak dapat mengakses dashboard.

---

# 5. Register Flow

```text
Klik Daftar

↓

Isi Data

↓

Validasi

↓

Email Verification

↓

Akun Aktif

↓

Login
```

Validasi

✓ Email unik

✓ Nomor HP unik

✓ Password minimal 8 karakter

✓ Alamat wajib

✓ Persetujuan Kebijakan Privasi

---

# 6. Login Flow

```text
Email

↓

Password

↓

Authentication

↓

Role Check

↓

Dashboard
```

Jika password salah

↓

Tambah Counter

↓

Apabila >5 kali

↓

Temporary Lock

↓

Captcha

↓

Login kembali

---

# 7. Forgot Password Flow

```text
Masukkan Email

↓

Verifikasi

↓

Kirim Link Reset

↓

Reset Password

↓

Login
```

---

# 8. Dashboard Nasabah

```text
Dashboard

↓

Saldo

↓

Jadwal

↓

Riwayat

↓

Artikel

↓

Leaderboard

↓

AI Assistant
```

Quick Action

- Jadwalkan Jemput

- Tarik Saldo

- Scan QR

- Chat AI

---

# 9. Jadwalkan Penjemputan

```text
Dashboard

↓

Jadwalkan Jemput

↓

Pilih Lokasi

↓

Pilih Kategori

↓

Estimasi Berat

↓

Tanggal

↓

Jam

↓

Catatan

↓

Submit

↓

Status Pending
```

---

# 10. Tracking Penjemputan

```text
Pending

↓

Assigned

↓

Petugas Berangkat

↓

Petugas Tiba

↓

Penimbangan

↓

Selesai
```

User dapat melihat lokasi petugas secara real-time.

---

# 11. Scan QR Flow

```text
Dashboard

↓

QR Code

↓

Petugas Scan

↓

Verifikasi

↓

Penimbangan
```

QR Code berubah secara berkala untuk meningkatkan keamanan.

---

# 12. Penimbangan

```text
Petugas

↓

Input Berat

↓

Hitung Harga

↓

Konfirmasi

↓

Transaksi
```

User menerima notifikasi.

---

# 13. Saldo Flow

```text
Transaksi

↓

Wallet Update

↓

Riwayat

↓

Dashboard Refresh
```

---

# 14. Withdrawal Flow

```text
Klik Tarik Saldo

↓

Input Nominal

↓

Validasi

↓

Konfirmasi

↓

Pending

↓

Admin Review

↓

Transfer

↓

Completed
```

---

# 15. Edukasi Flow

```text
Dashboard

↓

Artikel

↓

Video

↓

Quiz

↓

Selesai

↓

Point Bertambah
```

---

# 16. AI Chat Flow

```text
Klik AI

↓

Masukkan Pertanyaan

↓

AI Processing

↓

Jawaban

↓

History
```

---

# 17. Petugas Dashboard

```text
Dashboard

↓

Today's Task

↓

Maps

↓

Task Detail

↓

Scan QR

↓

Penimbangan

↓

Upload Foto

↓

Complete
```

---

# 18. Navigasi Petugas

```text
Task

↓

Open Maps

↓

GPS

↓

Lokasi Nasabah

↓

Arrived
```

---

# 19. Upload Bukti

```text
Ambil Foto

↓

Preview

↓

Upload

↓

Compression

↓

Storage

↓

Success
```

---

# 20. Admin Dashboard

```text
Dashboard

↓

Analytics

↓

Users

↓

Petugas

↓

Harga Sampah

↓

Withdrawal

↓

Laporan

↓

Pengaturan
```

---

# 21. CRUD Harga Sampah

```text
Admin

↓

Tambah

↓

Edit

↓

Simpan

↓

Snapshot Harga

↓

Publish
```

Harga lama tetap tersimpan sebagai histori.

---

# 22. Approval Withdrawal

```text
Pending

↓

Review

↓

Approve

↓

Upload Bukti

↓

Completed
```

atau

↓

Reject

↓

Alasan Penolakan

↓

Notifikasi

---

# 23. Notification Flow

```text
Event

↓

Notification Service

↓

Queue

↓

Push Notification

↓

Email

↓

In App
```

---

# 24. Leaderboard Flow

```text
Transaksi

↓

Tambah Point

↓

Hitung Ranking

↓

Update Leaderboard
```

---

# 25. Achievement Flow

```text
Point

↓

Badge

↓

Level

↓

Achievement

↓

Notification
```

---

# 26. AI Waste Recognition

```text
Upload Foto

↓

AI Detection

↓

Kategori

↓

Estimasi Berat

↓

Estimasi Harga

↓

Simpan
```

---

# 27. Carbon Calculator

```text
Transaksi

↓

Jenis Sampah

↓

Formula

↓

CO₂ Saved

↓

Tree Equivalent

↓

Dashboard
```

---

# 28. Report Export

```text
Dashboard

↓

Filter

↓

Generate

↓

Queue

↓

PDF / Excel

↓

Download
```

---

# 29. Logout

```text
Klik Logout

↓

Destroy Session

↓

Redirect Landing Page
```

---

# 30. Error Flow

404

↓

Halaman Tidak Ditemukan

↓

Kembali

---

500

↓

Retry

↓

Laporkan

---

Offline

↓

Offline Mode

↓

Cache

↓

Auto Sync

---

# 31. State Machine Pickup

Draft

↓

Pending

↓

Assigned

↓

On The Way

↓

Arrived

↓

Weighing

↓

Completed

↓

Archived

atau

↓

Cancelled

---

# 32. State Machine Withdrawal

Draft

↓

Pending

↓

Review

↓

Approved

↓

Transferred

↓

Completed

atau

↓

Rejected

---

# 33. State Machine Transaction

Draft

↓

Calculated

↓

Verified

↓

Completed

↓

Archived

---

# 34. UX Principles

Seluruh flow harus memenuhi prinsip berikut.

- Maksimal 3 klik menuju fitur utama.
- Seluruh aksi penting memiliki konfirmasi.
- Terdapat feedback visual untuk setiap proses.
- Loading tidak menghalangi navigasi.
- Seluruh perubahan status terlihat secara real-time.
- Pengguna selalu mengetahui langkah berikutnya.
- Kesalahan input harus dijelaskan dengan jelas.

---

# 35. UX Goals

- Mudah dipahami pengguna baru.
- Cepat digunakan oleh petugas lapangan.
- Responsif pada desktop, tablet, dan mobile.
- Mendukung aksesibilitas (WCAG 2.2 AA).
- Konsisten pada seluruh modul.
- Meminimalkan kesalahan pengguna.
- Memberikan pengalaman yang modern, profesional, dan ramah lingkungan.