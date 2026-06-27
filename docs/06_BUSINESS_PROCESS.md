# 06_BUSINESS_PROCESS.md

# Business Process Documentation

## Project

SiSampah — Smart Integrated Waste Management Platform

Version : 3.0

Document Type :

Business Process Management (BPM)

---

# 1. Business Philosophy

SiSampah dirancang untuk mendigitalisasi seluruh rantai pengelolaan sampah dari sumber hingga pelaporan.

Setiap aktivitas dalam sistem harus memiliki:

* Aktor yang jelas
* Input yang jelas
* Output yang jelas
* Validasi
* Audit Trail
* Notifikasi
* Status yang dapat dilacak (Trackable)

---

# 2. Business Actors

## Guest

Belum memiliki akun.

---

## Nasabah

Menyetor sampah.

Mendapatkan saldo.

Melakukan withdrawal.

Belajar melalui modul edukasi.

---

## Petugas

Menjemput sampah.

Melakukan penimbangan.

Mengunggah bukti.

---

## Admin

Mengelola seluruh aktivitas.

---

## Kepala Desa

Monitoring laporan.

---

# 3. Business Lifecycle

```text
Guest
   │
   ▼
Register
   │
   ▼
Verification
   │
   ▼
Nasabah
   │
   ▼
Pickup Request
   │
   ▼
Officer Assignment
   │
   ▼
Pickup Process
   │
   ▼
Transaction
   │
   ▼
Wallet
   │
   ▼
Withdrawal
```

---

# 4. Core Business Processes

Platform memiliki enam proses utama:

1. Registrasi pengguna
2. Penjemputan sampah
3. Penimbangan
4. Perhitungan saldo
5. Withdrawal
6. Pelaporan

---

# 5. Registration Process

## Flow

```text
Guest

↓

Klik Daftar

↓

Isi Data

↓

Validasi

↓

Simpan

↓

Verifikasi Email

↓

Akun Aktif

↓

Login
```

Validasi:

* Email unik
* Nomor HP unik
* Password minimal 8 karakter
* Alamat wajib

---

# 6. Login Process

```text
Email

↓

Password

↓

Authentication

↓

Role Detection

↓

Dashboard
```

Jika gagal lebih dari lima kali:

↓

Temporary Lock

↓

Captcha

---

# 7. Pickup Request Process

```text
Dashboard

↓

Klik Jadwalkan Jemput

↓

Pilih Lokasi

↓

Estimasi Berat

↓

Pilih Kategori

↓

Pilih Jadwal

↓

Submit
```

Output:

Pickup Request dibuat.

Status:

Pending.

---

# 8. Officer Assignment Process

Admin

↓

Melihat Request

↓

Memilih Petugas

↓

Assign

↓

Notifikasi Petugas

↓

Status

Assigned

---

# 9. Officer Process

```text
Petugas Login

↓

Today's Task

↓

Open Detail

↓

Open Maps

↓

Menuju Lokasi

↓

Scan QR

↓

Input Berat

↓

Upload Foto

↓

Submit
```

---

# 10. Weighing Process

Petugas

↓

QR Scan

↓

Data Nasabah

↓

Jenis Sampah

↓

Input Berat

↓

Hitung Harga

↓

Konfirmasi

↓

Simpan

↓

Saldo Bertambah

---

# 11. Wallet Process

Transaksi selesai

↓

Wallet Update

↓

Point Bertambah

↓

Carbon Bertambah

↓

Leaderboard Update

↓

Notification

↓

History

Semua proses dilakukan otomatis menggunakan Queue.

---

# 12. Withdrawal Process

Nasabah

↓

Input Nominal

↓

Validasi Saldo

↓

Submit

↓

Pending

↓

Admin Review

↓

Approve / Reject

↓

Transfer

↓

Upload Bukti

↓

Completed

---

# 13. Education Process

User

↓

Artikel

↓

Video

↓

Quiz

↓

AI Tutor

↓

Point Reward

---

# 14. AI Assistant Process

User

↓

Pertanyaan

↓

Prompt Builder

↓

Gemini API

↓

Response

↓

History

↓

Suggestion

---

# 15. Waste Classification Process

User Upload Foto

↓

AI Recognition

↓

Kategori

↓

Estimasi Berat

↓

Estimasi Harga

↓

Recommendation

---

# 16. Notification Process

Event

↓

Notification Service

↓

Queue

↓

Email

↓

Push Notification

↓

In App Notification

↓

History

---

# 17. Reporting Process

Data

↓

Aggregation

↓

Statistics

↓

Chart

↓

PDF

↓

Excel

↓

Download

---

# 18. Gamification Process

Transaksi

↓

Point

↓

Achievement

↓

Badge

↓

Leaderboard

↓

Reward

↓

Notification

---

# 19. Carbon Calculation Process

Jenis Sampah

↓

Berat

↓

Formula

↓

CO₂ Saved

↓

Tree Equivalent

↓

Dashboard

---

# 20. Analytics Process

Transaction

↓

Aggregation

↓

Daily

↓

Weekly

↓

Monthly

↓

Yearly

↓

Heatmap

↓

Dashboard

---

# 21. Status Lifecycle

## Pickup

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

Cancelled

---

## Withdrawal

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

↓

Rejected

---

## Transaction

Draft

↓

Verified

↓

Completed

↓

Archived

---

# 22. Exception Handling

Jika petugas tidak datang:

↓

Admin Reassign

↓

Notifikasi Nasabah

Jika foto gagal diunggah:

↓

Retry

↓

Queue

↓

Fallback

Jika internet terputus:

↓

Offline Storage

↓

Auto Sync

---

# 23. Business Rules

* Harga transaksi menggunakan snapshot harga saat transaksi dibuat.
* Satu permintaan penjemputan hanya dapat diproses oleh satu petugas.
* Saldo bertambah setelah transaksi selesai.
* Withdrawal tidak boleh melebihi saldo tersedia.
* Setiap perubahan status wajib dicatat dalam Audit Log.
* Seluruh proses finansial menggunakan database transaction untuk menjaga konsistensi data.

---

# 24. KPI Monitoring

Sistem memantau indikator berikut:

* Jumlah penjemputan per hari.
* Waktu rata-rata penjemputan.
* Berat sampah yang dikumpulkan.
* Nilai transaksi.
* Saldo yang dicairkan.
* Partisipasi pengguna.
* Tingkat penyelesaian tugas petugas.
* Pengurangan estimasi emisi karbon.

---

# 25. SOP Digital

### Nasabah

1. Daftar akun.
2. Lengkapi profil.
3. Pilah sampah.
4. Ajukan penjemputan.
5. Pantau status.
6. Verifikasi hasil penimbangan.
7. Gunakan saldo atau lakukan penarikan.

### Petugas

1. Login.
2. Lihat daftar tugas.
3. Ikuti rute.
4. Verifikasi identitas melalui QR.
5. Timbang sampah.
6. Dokumentasikan hasil.
7. Selesaikan transaksi.

### Admin

1. Verifikasi data.
2. Kelola harga sampah.
3. Pantau aktivitas.
4. Validasi penarikan saldo.
5. Analisis laporan.
6. Publikasikan konten edukasi.
7. Evaluasi kinerja petugas dan sistem.

---

# 26. Business Value

Implementasi proses bisnis ini diharapkan menghasilkan:

* Pengurangan pekerjaan administrasi manual.
* Transparansi transaksi bagi seluruh pihak.
* Waktu layanan yang lebih singkat.
* Pelaporan otomatis dan akurat.
* Peningkatan partisipasi masyarakat.
* Pengambilan keputusan berbasis data.
* Platform yang siap dikembangkan hingga skala kabupaten, provinsi, maupun nasional.
