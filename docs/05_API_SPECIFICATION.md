# 05_API_SPECIFICATION.md

# API Specification

## Project

SiSampah — Smart Integrated Waste Management Platform

Version : 3.0

API Style :

RESTful API

Response Format :

JSON

Authentication :

Laravel Sanctum

Content-Type :

application/json

Encoding :

UTF-8

Versioning :

/api/v1/

---

# 1. API Philosophy

API dirancang mengikuti prinsip:

* RESTful
* Stateless
* Predictable
* Secure
* Versioned
* Cache Friendly
* Scalable
* Consistent Response

---

# 2. Base URL

Production

```
https://api.sisampah.id/api/v1
```

Development

```
http://localhost:8000/api/v1
```

---

# 3. Authentication

Authorization

```
Bearer Token
```

Header

```
Authorization: Bearer {token}
```

---

# 4. Standard Response

Success

```json
{
    "success": true,
    "message": "Success",
    "data": {}
}
```

---

Validation Error

```json
{
    "success": false,
    "message": "Validation Error",
    "errors": {}
}
```

---

Server Error

```json
{
    "success": false,
    "message": "Internal Server Error"
}
```

---

# 5. Authentication Module

POST

```
/auth/login
```

POST

```
/auth/register
```

POST

```
/auth/logout
```

POST

```
/auth/forgot-password
```

POST

```
/auth/reset-password
```

GET

```
/auth/profile
```

PUT

```
/auth/profile
```

PATCH

```
/auth/change-password
```

---

# 6. Dashboard API

GET

```
/dashboard
```

Response

* Summary
* Statistics
* Wallet
* Leaderboard
* Chart
* Notification

---

# 7. Waste Category API

GET

```
/waste/categories
```

GET

```
/waste/categories/{id}
```

POST

```
/waste/categories
```

PUT

```
/waste/categories/{id}
```

DELETE

```
/waste/categories/{id}
```

---

# 8. Waste Price API

GET

```
/waste/prices
```

GET

```
/waste/prices/latest
```

POST

```
/waste/prices
```

PATCH

```
/waste/prices/{id}
```

---

# 9. Pickup API

GET

```
/pickup
```

POST

```
/pickup
```

GET

```
/pickup/{id}
```

PATCH

```
/pickup/{id}/cancel
```

PATCH

```
/pickup/{id}/accept
```

PATCH

```
/pickup/{id}/start
```

PATCH

```
/pickup/{id}/complete
```

---

# 10. Transaction API

GET

```
/transactions
```

GET

```
/transactions/{id}
```

POST

```
/transactions
```

GET

```
/transactions/export/pdf
```

GET

```
/transactions/export/excel
```

---

# 11. Wallet API

GET

```
/wallet
```

GET

```
/wallet/history
```

GET

```
/wallet/summary
```

---

# 12. Withdrawal API

POST

```
/withdrawals
```

GET

```
/withdrawals
```

PATCH

```
/withdrawals/{id}/approve
```

PATCH

```
/withdrawals/{id}/reject
```

---

# 13. Notification API

GET

```
/notifications
```

PATCH

```
/notifications/{id}/read
```

PATCH

```
/notifications/read-all
```

DELETE

```
/notifications/{id}
```

---

# 14. Education API

GET

```
/articles
```

GET

```
/articles/{slug}
```

GET

```
/videos
```

GET

```
/quiz
```

POST

```
/quiz/submit
```

---

# 15. AI API

POST

```
/ai/chat
```

POST

```
/ai/classification
```

POST

```
/ai/prediction
```

POST

```
/ai/recommendation
```

GET

```
/ai/history
```

---

# 16. Leaderboard API

GET

```
/leaderboard
```

GET

```
/leaderboard/monthly
```

GET

```
/leaderboard/village
```

---

# 17. Analytics API

GET

```
/analytics/dashboard
```

GET

```
/analytics/carbon
```

GET

```
/analytics/waste
```

GET

```
/analytics/village
```

GET

```
/analytics/report
```

---

# 18. Admin API

GET

```
/admin/users
```

POST

```
/admin/users
```

PATCH

```
/admin/users/{id}
```

DELETE

```
/admin/users/{id}
```

---

GET

```
/admin/officers
```

GET

```
/admin/settings
```

PATCH

```
/admin/settings
```

---

# 19. Upload API

POST

```
/upload/avatar
```

POST

```
/upload/article
```

POST

```
/upload/waste
```

POST

```
/upload/proof
```

---

# 20. Search API

GET

```
/search/users
```

GET

```
/search/articles
```

GET

```
/search/transactions
```

GET

```
/search/pickup
```

---

# 21. API Security

* Laravel Sanctum
* CSRF Protection
* Rate Limiting
* Signed URL
* Request Validation
* API Resource
* Policy Authorization
* Activity Logging

---

# 22. Pagination Standard

```json
{
    "current_page": 1,
    "per_page": 10,
    "total": 200,
    "last_page": 20,
    "data": []
}
```

---

# 23. HTTP Status Code

200 OK

201 Created

204 No Content

400 Bad Request

401 Unauthorized

403 Forbidden

404 Not Found

409 Conflict

422 Validation Error

429 Too Many Requests

500 Internal Server Error

503 Service Unavailable

---

# 24. API Versioning Strategy

Version 1

```
/api/v1/
```

Version 2

```
/api/v2/
```

Versi lama tetap dipertahankan selama masa transisi untuk menjaga kompatibilitas aplikasi klien.

---

# 25. API Documentation

Seluruh endpoint harus terdokumentasi menggunakan OpenAPI (Swagger).

Dokumentasi minimal mencakup:

* Deskripsi endpoint
* Parameter
* Header
* Request Body
* Response
* Status Code
* Contoh penggunaan
* Error Response
* Hak akses (Role)
* Rate Limit
* Catatan keamanan

Dokumentasi harus diperbarui setiap kali terdapat perubahan endpoint agar frontend, mobile app, dan integrasi pihak ketiga selalu menggunakan kontrak API yang konsisten.
