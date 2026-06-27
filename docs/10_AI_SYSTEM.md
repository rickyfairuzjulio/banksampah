# 10_AI_SYSTEM.md

# Artificial Intelligence System Specification

Project

SiSampah — Smart Integrated Waste Management Platform

Version

3.0

AI Engine

Google Gemini

Architecture

Hybrid AI Assistant

Last Update

June 2026

---

# 1. Overview

Artificial Intelligence pada SiSampah bukan sekadar chatbot.

AI merupakan Digital Environmental Assistant yang membantu masyarakat, petugas, administrator, hingga pemerintah dalam mengambil keputusan berdasarkan data.

AI dirancang sebagai lapisan (AI Layer) yang dapat digunakan oleh seluruh modul tanpa mengubah Business Logic utama.

---

# 2. AI Vision

Menjadikan SiSampah sebagai platform pengelolaan sampah yang mampu:

- membantu pengguna
- mempercepat pekerjaan
- memberikan rekomendasi
- menganalisis data
- memprediksi tren
- meningkatkan kualitas pelayanan

---

# 3. AI Objectives

## Education

Memberikan edukasi mengenai:

- pemilahan sampah
- daur ulang
- ekonomi sirkular
- lingkungan hidup

---

## Assistance

Membantu pengguna memahami sistem.

---

## Recommendation

Memberikan rekomendasi terbaik berdasarkan data.

---

## Automation

Mengurangi pekerjaan manual administrator.

---

## Prediction

Memprediksi volume sampah.

---

## Analytics

Menghasilkan insight otomatis.

---

# 4. AI Architecture

```text
                User
                  │
                  ▼
        AI Request Gateway
                  │
        Authentication Layer
                  │
         Context Builder
                  │
         Prompt Generator
                  │
         AI Provider Layer
        ┌─────────┴─────────┐
        │                   │
 Google Gemini       Future Models
        │                   │
        └─────────┬─────────┘
                  │
       Response Formatter
                  │
        Safety Validation
                  │
          Cache & History
                  │
             User Interface
```

---

# 5. AI Modules

Platform memiliki AI pada berbagai modul.

AI Assistant

Waste Recognition

Smart Recommendation

Analytics

Prediction

Carbon Intelligence

Education

Knowledge Base

---

# 6. AI Assistant

Berfungsi sebagai chatbot utama.

Mampu menjawab:

- cara menggunakan aplikasi
- harga sampah
- jadwal penjemputan
- cara memilah sampah
- edukasi lingkungan
- FAQ

---

# 7. AI Waste Recognition

Input

Foto Sampah

↓

AI Vision

↓

Deteksi Jenis

↓

Estimasi Berat

↓

Estimasi Harga

↓

Rekomendasi

Output

- kategori
- estimasi harga
- cara pengelolaan

---

# 8. AI Recommendation

AI memberikan rekomendasi:

Hari terbaik penjemputan.

Jenis sampah yang bernilai tinggi.

Cara meningkatkan pendapatan.

Cara mendapatkan badge.

Artikel yang relevan.

---

# 9. AI Carbon Intelligence

Menghitung:

CO₂ Saved

↓

Equivalent Tree

↓

Environmental Impact

↓

Progress

↓

Recommendation

---

# 10. AI Analytics

Administrator mendapatkan:

Ringkasan otomatis.

Anomali transaksi.

Prediksi volume.

Petugas terbaik.

Wilayah aktif.

Jenis sampah terbanyak.

---

# 11. AI Education

AI mampu menjelaskan:

- plastik
- logam
- organik
- kertas
- kaca
- B3

menggunakan bahasa sederhana.

---

# 12. AI Prompt Engineering

Prompt terdiri dari:

System Prompt

↓

Role Prompt

↓

Context

↓

Conversation History

↓

User Prompt

↓

Output Format

---

# 13. System Prompt

AI selalu bertindak sebagai:

Environmental Expert

Customer Service

Waste Management Assistant

Education Assistant

Data Analyst

AI tidak boleh memberikan jawaban di luar ruang lingkup apabila data tidak tersedia.

---

# 14. Context Builder

Context berasal dari:

Profil User

Role

Riwayat Chat

Data Transaksi

Data Wallet

Artikel

Knowledge Base

Pengaturan Sistem

---

# 15. Prompt Template

```text
Role

Context

Goal

Constraints

Knowledge

Question

Output Format
```

---

# 16. AI Knowledge Base

Knowledge berasal dari:

Artikel

FAQ

Harga Sampah

Kategori Sampah

Business Rules

Panduan Pengguna

Kebijakan

---

# 17. Retrieval Layer

Sebelum mengirim prompt ke AI:

↓

Cari data lokal

↓

Bangun Context

↓

Gabungkan Prompt

↓

Kirim ke Gemini

Hal ini mengurangi halusinasi dan memastikan jawaban sesuai dengan data aplikasi.

---

# 18. Conversation Memory

Disimpan:

Conversation

↓

Message

↓

Timestamp

↓

User

↓

Token Usage

↓

Rating

---

# 19. AI Roles

Nasabah

↓

Petugas

↓

Admin

↓

Pemerintah

↓

Guest

Setiap role memperoleh jawaban yang berbeda sesuai hak akses.

---

# 20. AI Response Format

Jawaban AI harus:

- ringkas
- mudah dipahami
- memiliki struktur
- menggunakan markdown
- menyebut sumber internal jika tersedia
- memberikan langkah berikutnya

---

# 21. AI Safety

AI tidak boleh:

Memberikan informasi akun pengguna lain.

Mengubah data transaksi.

Melakukan transfer saldo.

Menghapus data.

Menampilkan informasi rahasia.

Memberikan instruksi yang melanggar hukum.

---

# 22. AI Validation

Semua output AI diperiksa:

↓

Safety Filter

↓

Business Rule

↓

Role Permission

↓

Response Formatter

↓

User

---

# 23. AI Cache

Cache digunakan untuk:

FAQ

Artikel

Harga

Kategori

Prompt Populer

Hal ini mengurangi biaya penggunaan AI dan meningkatkan kecepatan respons.

---

# 24. AI Cost Management

Sistem mencatat:

Jumlah Request

Token Input

Token Output

Estimasi Biaya

Cache Hit

Cache Miss

Average Response Time

---

# 25. AI Monitoring Dashboard

Admin dapat melihat:

Jumlah chat per hari.

Topik paling banyak ditanyakan.

Response Time.

Biaya AI.

Persentase cache.

Rating pengguna.

Error AI.

---

# 26. AI Feedback Loop

Setiap jawaban dapat diberi:

👍 Membantu

👎 Tidak Membantu

↓

Disimpan

↓

Evaluasi

↓

Perbaikan Prompt

---

# 27. AI Explainability

Jika AI memberikan rekomendasi, sistem harus menjelaskan alasan secara sederhana, misalnya:

"Jenis sampah plastik PET direkomendasikan karena harga saat ini lebih tinggi dibanding kategori lain dan sering diterima oleh Bank Sampah."

---

# 28. AI Guardrails

AI wajib:

- menghormati privasi pengguna
- tidak mengarang data transaksi
- tidak menampilkan informasi tanpa izin
- menjawab berdasarkan konteks aplikasi
- menyatakan ketidakpastian apabila informasi tidak tersedia

---

# 29. AI Performance Target

Response Time

< 3 detik

Cache Hit

> 70%

AI Accuracy

> 90%

User Satisfaction

> 4.5 / 5

Hallucination Rate

< 2%

Availability

99.9%

---

# 30. Future AI Roadmap

Version 1

AI Chat Assistant

↓

Version 2

Waste Recognition (Computer Vision)

↓

Version 3

Predictive Analytics

↓

Version 4

Carbon Intelligence

↓

Version 5

Voice Assistant

↓

Version 6

Multilingual AI

↓

Version 7

IoT + AI Smart Waste Monitoring

↓

Version 8

Autonomous Environmental Decision Support System

---

# 31. AI Development Principles

Seluruh pengembangan AI harus mengikuti prinsip:

- Human-in-the-Loop
- Explainable AI (XAI)
- Responsible AI
- Privacy by Design
- Security by Design
- Retrieval-Augmented Generation (RAG)
- Cost Efficient Inference
- Continuous Evaluation
- Prompt Versioning
- Observability
- Bias Monitoring
- Fail-safe Response

AI pada SiSampah berfungsi sebagai **asisten pengambilan keputusan**, bukan pengganti keputusan pengguna maupun administrator. Setiap rekomendasi AI harus dapat ditinjau, diverifikasi, dan dijelaskan kembali berdasarkan data yang tersedia.