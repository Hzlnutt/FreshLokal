# FreshLokal API Documentation

## Authentication

### Login
```http
POST /api/login
```
Request Body:
```json
{
    "email": "user@example.com",
    "password": "password123"
}
```
Response:
```json
{
    "status": "success",
    "data": {
        "user": {
            "id": 1,
            "name": "User Name",
            "email": "user@example.com",
            "role": "user"
        },
        "token": "YOUR_AUTH_TOKEN"
    }
}
```

### Register
```http
POST /api/register
```
Request Body:
```json
{
    "name": "User Name",
    "email": "user@example.com",
    "password": "password123"
}
```
Response: Same as login response

### Logout
```http
POST /api/logout
```
Headers:
```
Authorization: Bearer YOUR_AUTH_TOKEN
```
Response:
```json
{
    "status": "success",
    "message": "Berhasil logout"
}
```

### Get Current User
```http
GET /api/user
```
Headers:
```
Authorization: Bearer YOUR_AUTH_TOKEN
```
Response:
```json
{
    "status": "success",
    "data": {
        "user": {
            "id": 1,
            "name": "User Name",
            "email": "user@example.com",
            "role": "user",
            "email_verified_at": null,
            "created_at": "2024-03-06T12:00:00.000000Z",
            "updated_at": "2024-03-06T12:00:00.000000Z"
        }
    }
}
```

## Users (Admin Only)

### Get All Users
```http
GET /api/users
```
Headers:
```
Authorization: Bearer YOUR_ADMIN_TOKEN
```
Response:
```json
{
    "status": "success",
    "data": [
        {
            "id": 1,
            "name": "Admin",
            "email": "admin@admin.com",
            "role": "admin",
            "email_verified_at": null,
            "created_at": "2024-03-06T12:00:00.000000Z",
            "updated_at": "2024-03-06T12:00:00.000000Z"
        }
    ]
}
```

## Products

### Get All Products
```http
GET /api/products
```
Headers:
```
Authorization: Bearer YOUR_AUTH_TOKEN
```
Response:
```json
{
    "status": "success",
    "data": [
        {
            "id": 1,
            "name": "Product Name",
            "description": "Product Description",
            "price": 50000,
            "formatted_price": "Rp 50.000",
            "image": "http://localhost:8000/images/products/image.jpg",
            "stock": 10,
            "status": "ada",
            "category": "Category"
        }
    ]
}
```

### Search Products
```http
GET /api/products/search?q=keyword
```
Headers:
```
Authorization: Bearer YOUR_AUTH_TOKEN
```
Response: Same as Get All Products

### Get Product Detail
```http
GET /api/products/{id}
```
Headers:
```
Authorization: Bearer YOUR_AUTH_TOKEN
```
Response:
```json
{
    "status": "success",
    "data": {
        "id": 1,
        "name": "Product Name",
        "description": "Product Description",
        "price": 50000,
        "formatted_price": "Rp 50.000",
        "image": "http://localhost:8000/images/products/image.jpg",
        "stock": 10,
        "status": "ada",
        "category": "Category"
    }
}
```

## Orders (Admin Only)

### Get All Orders
```http
GET /api/orders
```
Headers:
```
Authorization: Bearer YOUR_ADMIN_TOKEN
```
Response:
```json
{
    "status": "success",
    "data": [
        {
            "id": 1,
            "user": {
                "id": 2,
                "name": "User Name",
                "email": "user@example.com"
            },
            "product": {
                "id": 1,
                "name": "Product Name",
                "price": 50000
            },
            "quantity": 2,
            "total_price": 100000,
            "formatted_total_price": "Rp 100.000",
            "status": "pending",
            "shipping_address": "Shipping Address",
            "phone_number": "081234567890",
            "notes": "Order Notes",
            "created_at": "2024-03-06 12:00:00",
            "updated_at": "2024-03-06 12:00:00"
        }
    ]
}
```

### Get Order Detail
```http
GET /api/orders/{id}
```
Headers:
```
Authorization: Bearer YOUR_ADMIN_TOKEN
```
Response:
```json
{
    "status": "success",
    "data": {
        "id": 1,
        "user": {
            "id": 2,
            "name": "User Name",
            "email": "user@example.com"
        },
        "product": {
            "id": 1,
            "name": "Product Name",
            "price": 50000
        },
        "quantity": 2,
        "total_price": 100000,
        "formatted_total_price": "Rp 100.000",
        "status": "pending",
        "shipping_address": "Shipping Address",
        "phone_number": "081234567890",
        "notes": "Order Notes",
        "created_at": "2024-03-06 12:00:00",
        "updated_at": "2024-03-06 12:00:00"
    }
}
```

### Update Order Status
```http
PATCH /api/orders/{id}/status
```
Headers:
```
Authorization: Bearer YOUR_ADMIN_TOKEN
```
Request Body:
```json
{
    "status": "accepted" // Options: pending, accepted, paid, shipped, completed
}
```
Response:
```json
{
    "status": "success",
    "message": "Status pesanan berhasil diupdate",
    "data": {
        "id": 1,
        "status": "accepted"
    }
}
```

## Error Responses

### Unauthorized (401)
```json
{
    "status": "error",
    "message": "Unauthorized. Silakan login terlebih dahulu."
}
```

### Forbidden (403)
```json
{
    "status": "error",
    "message": "Forbidden. Anda tidak memiliki akses."
}
```

### Not Found (404)
```json
{
    "status": "error",
    "message": "Data tidak ditemukan"
}
```

### Validation Error (400)
```json
{
    "status": "error",
    "message": "Validation error message"
}
```
