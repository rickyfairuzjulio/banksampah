# 15_DOCUMENTATION_GUIDE.md

# Documentation & Development Guide

Project

SiSampah — Smart Integrated Waste Management Platform

Version

3.0

Document Type

Software Engineering Standard

Reference

- Laravel Best Practice
- PSR-12
- Clean Architecture
- SOLID Principle
- Conventional Commit
- Semantic Versioning

---

# 1. Overview

Dokumen ini menjadi pedoman resmi seluruh tim pengembang SiSampah.

Seluruh developer, UI Designer, QA Engineer, DevOps Engineer, dan Project Manager wajib mengikuti standar yang tertulis pada dokumen ini.

Tujuan utama:

- Konsistensi
- Maintainability
- Scalability
- Readability
- Collaboration

---

# 2. Project Documentation Structure

```text
docs/

01_PROJECT_OVERVIEW.md

02_SYSTEM_ARCHITECTURE.md

03_REQUIREMENT_SPECIFICATION.md

04_DATABASE_DESIGN.md

05_API_SPECIFICATION.md

06_BUSINESS_PROCESS.md

07_USER_FLOW.md

08_UI_UX_DESIGN_SYSTEM.md

09_COMPONENT_LIBRARY.md

10_AI_SYSTEM.md

11_SECURITY_ARCHITECTURE.md

12_PERFORMANCE_SCALABILITY.md

13_DEPLOYMENT_DEVOPS.md

14_TESTING_QA.md

15_DOCUMENTATION_GUIDE.md

16_CODING_STANDARD.md

17_CHANGELOG.md

18_RELEASE_NOTE.md

19_USER_MANUAL.md

20_ADMIN_MANUAL.md
```

---

# 3. Folder Structure

```text
app/

Console/

Events/

Exceptions/

Http/

Jobs/

Listeners/

Mail/

Models/

Notifications/

Policies/

Providers/

Repositories/

Services/

Traits/

Helpers/
```

---

# 4. Naming Convention

Class

PascalCase

Controller

UserController

Service

WalletService

Repository

PickupRepository

Policy

TransactionPolicy

Request

StoreUserRequest

Event

PickupCreated

Job

CalculateCarbonJob

Notification

WalletNotification

Trait

HasWallet

---

# 5. File Naming

Blade

dashboard.blade.php

JavaScript

wallet-chart.js

CSS

dashboard.css

Migration

2026_06_27_create_users_table.php

Seeder

UserSeeder.php

Factory

UserFactory.php

---

# 6. Database Naming

Table

Plural

users

transactions

pickup_requests

Column

snake_case

user_id

created_at

updated_at

Foreign Key

user_id

transaction_id

pickup_request_id

---

# 7. API Naming

RESTful

/users

/users/{id}

/wallet

/pickup

/articles

Gunakan kata benda, bukan kata kerja.

---

# 8. Route Organization

```text
routes/

web.php

api.php

auth.php

admin.php

officer.php
```

---

# 9. Controller Standard

Controller hanya bertugas:

- menerima request
- validasi request
- memanggil service
- mengembalikan response

Business Logic tidak boleh ditulis di Controller.

---

# 10. Service Layer

Seluruh Business Logic ditempatkan pada Service.

Contoh

WalletService

PickupService

CarbonService

TransactionService

NotificationService

---

# 11. Repository Layer

Repository bertugas:

- Query Database
- Filtering
- Pagination
- Search

Tidak boleh terdapat Business Rule.

---

# 12. Request Validation

Gunakan Form Request.

Contoh

StorePickupRequest

UpdateWalletRequest

StoreWithdrawalRequest

Validasi tidak ditulis langsung pada Controller.

---

# 13. Response Standard

Gunakan API Resource.

Format:

```json
{
  "success": true,
  "message": "Success",
  "data": {}
}
```

---

# 14. Error Handling

Gunakan Exception.

Custom Exception:

BusinessException

ValidationException

PermissionException

AIException

---

# 15. Logging

Gunakan Log Channel sesuai jenis:

Application

Security

AI

Queue

Payment

Audit

---

# 16. Coding Style

Standar:

PSR-12

Indentasi:

4 Spasi

Maksimum panjang baris:

120 karakter

---

# 17. PHP Rules

Gunakan:

Strict Typing

Return Type

Typed Property

Readonly jika memungkinkan

Nullable hanya bila diperlukan

---

# 18. Blade Rules

Gunakan:

Blade Component

Blade Slot

Blade Layout

Hindari logika kompleks di Blade.

---

# 19. JavaScript Rules

Gunakan:

ES Module

Async/Await

Arrow Function

Modular

Tidak menggunakan global variable.

---

# 20. Tailwind Rules

Gunakan:

Design Token

Component Class

Utility Class

Hindari inline style.

---

# 21. Comment Standard

Gunakan komentar hanya bila diperlukan.

Contoh:

- Algoritma kompleks
- Rumus perhitungan
- Integrasi pihak ketiga

Hindari komentar yang menjelaskan kode sederhana.

---

# 22. Documentation Standard

Setiap Service memiliki:

- Deskripsi
- Parameter
- Return Value
- Exception
- Contoh penggunaan

---

# 23. Git Workflow

Branch

↓

Commit

↓

Push

↓

Pull Request

↓

Review

↓

Merge

↓

Deploy

---

# 24. Conventional Commit

Format

```text
type(scope): description
```

Contoh

```text
feat(wallet): add withdrawal approval
fix(api): validate pickup schedule
refactor(service): simplify wallet calculation
docs(readme): update installation guide
```

---

# 25. Code Review Checklist

Reviewer memeriksa:

- Clean Code
- SOLID
- Security
- Performance
- Readability
- Test
- Documentation

---

# 26. README Standard

README minimal berisi:

- Project Overview
- Technology Stack
- Installation
- Configuration
- Environment
- Running Project
- Testing
- Deployment
- Contribution
- License

---

# 27. Changelog Standard

Menggunakan format:

Added

Changed

Fixed

Deprecated

Removed

Security

---

# 28. Release Note

Setiap rilis mencantumkan:

- Nomor versi
- Fitur baru
- Perbaikan bug
- Perubahan database
- Catatan migrasi
- Breaking Changes

---

# 29. Architecture Decision Record (ADR)

Setiap keputusan besar harus memiliki ADR.

Contoh:

ADR-001

Menggunakan Laravel 12

ADR-002

Menggunakan Redis

ADR-003

Menggunakan Sanctum

---

# 30. Documentation Versioning

Seluruh dokumen menggunakan:

Major

Minor

Patch

Contoh

3.0.0

3.1.0

3.1.1

---

# 31. Code Quality Metrics

Target:

Code Coverage

≥ 90%

Maintainability Index

≥ 80

Cyclomatic Complexity

≤ 10

Duplicate Code

< 3%

Technical Debt

Minimal

---

# 32. Knowledge Sharing

Seluruh perubahan besar harus disertai:

- Dokumentasi
- Demo
- Catatan implementasi
- Panduan migrasi (jika diperlukan)

---

# 33. Contribution Guide

Kontributor wajib:

- Mengikuti Coding Standard
- Menulis Test
- Memperbarui Dokumentasi
- Lolos Code Review
- Mengikuti CI/CD Pipeline

---

# 34. Documentation Review

Dokumentasi ditinjau:

- Sebelum rilis mayor
- Setelah perubahan arsitektur
- Setelah penambahan modul utama

---

# 35. Documentation Principles

Dokumentasi SiSampah harus:

- Akurat
- Konsisten
- Mudah dipahami
- Selalu diperbarui
- Dapat ditelusuri
- Mendukung pengembangan jangka panjang

Dokumentasi merupakan bagian dari produk. Setiap perubahan pada sistem wajib diikuti dengan pembaruan dokumentasi agar seluruh tim memiliki referensi yang sama dan proses pengembangan tetap terarah.