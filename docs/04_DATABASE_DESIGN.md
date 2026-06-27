# 04_DATABASE_DESIGN.md

# Database Design Document

## Project

SiSampah – Smart Integrated Waste Management Platform

Version : 3.0

Database Engine :

MySQL 8+

Character Set :

utf8mb4

Collation :

utf8mb4_unicode_ci

Architecture :

Normalized Database (3NF)

Storage Engine :

InnoDB

Primary Key :

ULID

Soft Delete :

Enabled

Timestamp :

Enabled

Audit Log :

Enabled

---

# 1. Database Philosophy

Database dirancang berdasarkan prinsip berikut.

* Data Integrity
* High Performance
* Scalable
* Maintainable
* Transaction Safe
* Fully Normalized
* Audit Friendly
* Future Ready

Semua tabel wajib menggunakan:

* ULID sebagai Primary Key
* created_at
* updated_at
* deleted_at (Soft Delete jika diperlukan)

---

# 2. Database Overview

```text
SiSampah Database

├── Authentication
├── User Management
├── Role & Permission
├── Waste Management
├── Pickup Management
├── Wallet
├── Financial
├── Education
├── AI
├── Analytics
├── Gamification
├── Notification
├── Reporting
├── Audit
├── Configuration
└── System
```

---

# 3. Master Tables

Master tables bersifat relatif statis.

users

roles

permissions

villages

districts

regencies

provinces

waste_categories

waste_prices

reward_levels

badges

settings

articles

article_categories

quiz_categories

quiz_questions

quiz_answers

system_logs

---

# 4. Transaction Tables

pickup_requests

pickup_assignments

pickup_histories

transactions

transaction_details

wallets

wallet_histories

withdrawals

withdrawal_proofs

reward_histories

point_histories

notifications

notification_reads

reports

---

# 5. AI Tables

ai_conversations

ai_messages

ai_predictions

ai_recommendations

waste_classifications

carbon_calculations

analytics_cache

---

# 6. Supporting Tables

activity_logs

audit_logs

failed_jobs

jobs

sessions

password_reset_tokens

cache

cache_locks

personal_access_tokens

---

# 7. Entity Relationship Overview

```text
Province
    │
Regency
    │
District
    │
Village
    │
User
    │
Wallet
    │
Transaction
    │
Transaction Detail
    │
Waste Category
```

---

# 8. Main Relationships

User

↓

One Wallet

↓

Many Transactions

↓

Many Pickup Requests

↓

Many Notifications

↓

Many Rewards

---

Petugas

↓

Many Pickup Assignments

↓

Many Pickup History

↓

Many Transactions

---

Admin

↓

Many Reports

↓

Many Audit Logs

↓

Many Withdrawal Approval

---

# 9. Table: users

Purpose

Menyimpan data seluruh pengguna.

Fields

id

name

email

phone

gender

birth_date

avatar

address

village_id

password

email_verified_at

remember_token

status

created_at

updated_at

deleted_at

Indexes

email

phone

status

village_id

---

# 10. Table: waste_categories

Fields

id

code

name

description

unit

icon

color

status

created_at

updated_at

---

# 11. Table: waste_prices

Fields

id

category_id

buy_price

sell_price

effective_date

expired_date

status

created_at

updated_at

Harga menggunakan sistem historis sehingga perubahan harga tidak mengubah transaksi lama.

---

# 12. Table: pickup_requests

Fields

id

user_id

address

latitude

longitude

estimated_weight

scheduled_date

note

status

created_at

updated_at

Status

Pending

Accepted

On The Way

Arrived

Weighing

Completed

Cancelled

---

# 13. Table: pickup_assignments

Fields

id

pickup_request_id

officer_id

assigned_at

started_at

finished_at

status

---

# 14. Table: transactions

Fields

id

transaction_number

pickup_request_id

user_id

officer_id

total_weight

total_price

carbon_saved

tree_equivalent

status

created_at

---

# 15. Table: transaction_details

Fields

id

transaction_id

category_id

weight

price

subtotal

---

# 16. Table: wallets

Fields

id

user_id

balance

total_income

total_withdraw

point

level

created_at

updated_at

---

# 17. Table: wallet_histories

Fields

id

wallet_id

type

amount

description

reference_number

balance_before

balance_after

created_at

---

# 18. Table: withdrawals

Fields

id

wallet_id

amount

bank_name

account_number

account_name

proof

status

approved_by

approved_at

created_at

---

# 19. Table: reward_histories

Fields

id

user_id

badge_id

point

description

earned_at

---

# 20. Table: articles

Fields

id

category_id

title

slug

thumbnail

content

author

published_at

status

---

# 21. Table: quizzes

Fields

id

category_id

title

difficulty

point_reward

status

---

# 22. Table: notifications

Fields

id

user_id

title

message

type

read_at

created_at

---

# 23. Table: ai_conversations

Fields

id

user_id

session_id

title

created_at

---

# 24. Table: ai_messages

Fields

id

conversation_id

role

message

token

response_time

created_at

---

# 25. Table: carbon_calculations

Fields

id

transaction_id

plastic

paper

metal

glass

organic

co2_saved

tree_equivalent

created_at

---

# 26. Table: analytics_cache

Fields

id

cache_key

cache_value

expired_at

---

# 27. Table: audit_logs

Fields

id

user_id

action

table_name

record_id

old_value

new_value

ip_address

user_agent

created_at

---

# 28. Table: activity_logs

Fields

id

user_id

activity

module

description

created_at

---

# 29. Naming Convention

Primary Key

id

Foreign Key

user_id

category_id

transaction_id

pickup_request_id

officer_id

created_by

updated_by

deleted_by

---

# 30. Index Strategy

Index

email

phone

status

transaction_number

scheduled_date

pickup_status

wallet_balance

leaderboard_point

Composite Index

(user_id,status)

(category_id,status)

(village_id,status)

(officer_id,status)

---

# 31. Data Integrity

Semua Foreign Key menggunakan

ON UPDATE CASCADE

Penghapusan data penting menggunakan

Soft Delete

Transaksi finansial menggunakan

Database Transaction

Rollback otomatis apabila terjadi kegagalan.

---

# 32. Migration Strategy

Urutan migrasi:

1. Roles
2. Permissions
3. Users
4. Provinces
5. Regencies
6. Districts
7. Villages
8. Waste Categories
9. Waste Prices
10. Wallets
11. Pickup Requests
12. Pickup Assignments
13. Transactions
14. Transaction Details
15. Withdrawals
16. Rewards
17. Articles
18. Notifications
19. AI Tables
20. Audit Tables

---

# 33. Database Optimization

* Menggunakan eager loading untuk relasi kompleks.
* Menambahkan index pada kolom yang sering digunakan untuk pencarian.
* Menghindari query N+1.
* Menggunakan pagination untuk data besar.
* Memanfaatkan cache untuk data master seperti harga sampah dan kategori.
* Menjalankan proses berat melalui queue.

---

# 34. Backup Strategy

* Backup database harian.
* Backup mingguan ke penyimpanan terpisah.
* Verifikasi hasil backup secara berkala.
* Menyediakan prosedur restore untuk kondisi darurat.

---

# 35. Future Database Expansion

Database dirancang agar dapat diperluas tanpa perubahan besar pada struktur inti.

Rencana penambahan tabel pada versi mendatang:

* smart_bins
* sensor_readings
* waste_marketplace
* recycling_partners
* carbon_credit_transactions
* government_reports
* regional_statistics
* machine_learning_models
* prediction_results
* environmental_certificates

Dengan pendekatan modular ini, database SiSampah siap berkembang dari implementasi tingkat desa menjadi platform pengelolaan sampah skala regional maupun nasional tanpa perlu melakukan redesign menyeluruh.
