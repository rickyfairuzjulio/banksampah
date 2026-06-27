# 11_SECURITY_ARCHITECTURE.md

# Security Architecture

Project

SiSampah – Smart Integrated Waste Management Platform

Version

3.0

Security Level

Enterprise Grade

Reference Standards

- OWASP Top 10 (2021)
- OWASP ASVS
- NIST Cybersecurity Framework
- ISO/IEC 27001
- CIS Controls v8

---

# 1. Security Philosophy

Keamanan merupakan bagian dari arsitektur sistem, bukan fitur tambahan.

Seluruh modul harus menerapkan prinsip:

- Security by Design
- Privacy by Design
- Least Privilege
- Zero Trust
- Defense in Depth
- Fail Secure
- Secure Default

---

# 2. Security Objectives

Melindungi:

- Data Pengguna
- Data Transaksi
- Data Finansial
- AI Conversation
- Dokumen
- API
- Infrastruktur

Menjamin:

- Confidentiality
- Integrity
- Availability
- Accountability
- Non Repudiation

---

# 3. Security Layers

```text
User

↓

Browser Security

↓

HTTPS

↓

Firewall

↓

Reverse Proxy

↓

Laravel Middleware

↓

Authentication

↓

Authorization

↓

Validation

↓

Business Rules

↓

Database

↓

Backup
```

---

# 4. Zero Trust Architecture

Prinsip:

Never Trust

Always Verify

Setiap request harus:

- terautentikasi
- terotorisasi
- tervalidasi
- tercatat

Tidak ada request yang dipercaya secara otomatis.

---

# 5. Authentication

Metode

Email + Password

Future

Google OAuth

SSO

Passkey

Password Policy

Minimal 12 karakter

Huruf besar

Huruf kecil

Angka

Simbol

Tidak boleh menggunakan password umum.

Password disimpan menggunakan Argon2ID.

---

# 6. Multi Factor Authentication

Versi 1

Opsional untuk Admin

Versi 2

Opsional untuk Petugas

Versi 3

Semua Role

Metode

Email OTP

Authenticator App

Recovery Code

---

# 7. Authorization

Menggunakan

RBAC

(Role Based Access Control)

Roles

Guest

Nasabah

Petugas

Admin

Super Admin

Permission menggunakan Spatie Permission.

---

# 8. Permission Matrix

Contoh:

Nasabah

✓ View Wallet

✓ Request Pickup

✓ Withdrawal

✗ Approve Withdrawal

✗ Manage Users

Petugas

✓ View Assignment

✓ Update Pickup

✗ Manage Price

✗ Delete Transaction

Admin

✓ Full Operational Access

Super Admin

✓ System Configuration

✓ Permission Management

✓ Backup

---

# 9. Session Management

Session Timeout

30 menit tidak aktif.

Remember Login

30 hari.

Logout otomatis ketika:

Password berubah.

Permission berubah.

Akun dinonaktifkan.

---

# 10. CSRF Protection

Semua Form menggunakan:

Laravel CSRF Token

Semua request POST

PUT

PATCH

DELETE

wajib menggunakan token.

---

# 11. Input Validation

Seluruh input harus divalidasi.

Server Side

Wajib.

Client Side

Sebagai bantuan UX.

Tidak boleh mengandalkan validasi frontend saja.

---

# 12. Output Encoding

Semua output HTML:

Escape otomatis.

Markdown AI:

Disanitasi.

HTML mentah tidak diperbolehkan kecuali telah melalui proses sanitasi.

---

# 13. SQL Injection Prevention

Seluruh query menggunakan:

Laravel Eloquent

atau

Query Builder

Raw Query hanya diperbolehkan jika menggunakan parameter binding.

---

# 14. XSS Protection

Blade Escaping

Content Security Policy

HTML Sanitizer

Markdown Sanitizer

Upload Sanitizer

---

# 15. File Upload Security

Format

jpg

jpeg

png

pdf

Ukuran maksimal

5 MB

Semua file:

Rename otomatis

Virus Scan (Future)

MIME Validation

Extension Validation

Storage Outside Public Root (untuk dokumen sensitif)

---

# 16. API Security

Authentication

Sanctum

Rate Limiting

60 request/menit

Signed URL

Request Validation

JSON Response

Audit Logging

API Versioning

---

# 17. HTTP Security Header

Wajib mengaktifkan:

Content-Security-Policy

Strict-Transport-Security

X-Frame-Options

X-Content-Type-Options

Referrer-Policy

Permissions-Policy

Cross-Origin-Resource-Policy

Cross-Origin-Embedder-Policy

---

# 18. Encryption

Data Sensitif

AES-256

Password

Argon2ID

HTTPS

TLS 1.3

Backup

Encrypted

API Secret

Environment Variable

---

# 19. Audit Trail

Semua aktivitas dicatat.

Login

Logout

Register

Update Profile

Transaction

Withdrawal

Price Update

Delete Data

Role Update

Permission Update

---

# 20. Activity Logging

Disimpan:

User

Role

IP

Browser

Device

Timestamp

Module

Action

Status

---

# 21. Threat Detection

Sistem mendeteksi:

Brute Force

Repeated Login Failure

SQL Injection Attempt

XSS Attempt

CSRF Failure

Permission Abuse

API Abuse

---

# 22. Rate Limiting

Login

5 kali / menit

API

60 request / menit

AI Chat

30 request / jam

Upload

20 file / jam

---

# 23. Secure File Storage

Avatar

Public Storage

Withdrawal Proof

Private Storage

Report

Private Storage

Backup

Encrypted Storage

---

# 24. Disaster Recovery

Backup Database

Harian

Backup File

Mingguan

Restore Test

Bulanan

Recovery Time Objective (RTO)

< 4 Jam

Recovery Point Objective (RPO)

< 24 Jam

---

# 25. Incident Response

Tahapan:

Detection

↓

Analysis

↓

Containment

↓

Eradication

↓

Recovery

↓

Post Incident Review

---

# 26. Secure Development Lifecycle (SSDLC)

Requirement

↓

Threat Modeling

↓

Secure Design

↓

Implementation

↓

Code Review

↓

Static Analysis

↓

Dynamic Testing

↓

Penetration Testing

↓

Deployment

↓

Monitoring

---

# 27. OWASP Top 10 Mitigation

A01 Broken Access Control

- RBAC
- Policy
- Middleware

A02 Cryptographic Failures

- Argon2ID
- AES-256
- TLS 1.3

A03 Injection

- Eloquent
- Prepared Statement

A04 Insecure Design

- Threat Modeling
- Business Rule Validation

A05 Security Misconfiguration

- Secure Default
- Environment Separation

A06 Vulnerable Components

- Dependency Audit
- Composer Update

A07 Authentication Failures

- MFA
- Rate Limiting

A08 Software Integrity

- Signed Deployment
- CI/CD Verification

A09 Logging Failure

- Audit Log
- Activity Log
- Error Log

A10 SSRF

- URL Validation
- Allowlist External Service

---

# 28. Monitoring Dashboard

Admin Security Dashboard menampilkan:

- Login Hari Ini
- Gagal Login
- AI Usage
- API Usage
- Upload Activity
- Error Rate
- Security Event
- Server Health
- Backup Status

---

# 29. Privacy Protection

Data pribadi hanya ditampilkan kepada pihak yang berwenang.

Prinsip:

- Data Minimization
- Purpose Limitation
- Storage Limitation
- User Consent
- Right to Access
- Right to Delete (sesuai kebijakan yang berlaku)

---

# 30. Security Checklist

Sebelum rilis:

✓ HTTPS aktif

✓ CSRF aktif

✓ CSP aktif

✓ Rate Limit aktif

✓ Audit Log aktif

✓ Backup berhasil

✓ Password Hashing

✓ Validasi Input

✓ Escape Output

✓ Policy & Permission

✓ Security Header

✓ Environment Variable aman

✓ Tidak ada debug mode di Production

✓ Dependency diperiksa

✓ Penetration Test dasar dilakukan

---

# 31. Future Security Roadmap

Version 1

RBAC + Audit Log

↓

Version 2

Multi Factor Authentication

↓

Version 3

Security Dashboard

↓

Version 4

Intrusion Detection

↓

Version 5

Behavior Analytics

↓

Version 6

AI Threat Detection

↓

Version 7

Zero Trust Full Implementation

↓

Version 8

SIEM Integration

---

# 32. Security Principles

Seluruh pengembangan SiSampah harus mengikuti prinsip:

- Never Trust, Always Verify
- Least Privilege
- Defense in Depth
- Secure by Default
- Security by Design
- Privacy by Design
- Continuous Monitoring
- Continuous Improvement
- Compliance Ready
- Incident Preparedness

Keamanan merupakan tanggung jawab seluruh tim pengembang. Setiap fitur baru wajib melalui proses analisis risiko, pengujian keamanan, dan validasi sebelum dipublikasikan ke lingkungan produksi.