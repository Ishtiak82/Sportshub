# Sportshub 🏟️

**Sportshub** is a PHP-based web application where users can browse and buy sports jerseys for home delivery.  
Admins can upload/manage jerseys, and users can explore products by category (Cricket, Football, Esports) as well as view sports news.

---

## ✨ Features

### 🧍 User Features
- Browse jerseys by **category**:
  - 🏏 Cricket  
  - ⚽ Football  
  - 🎮 Esports
- View product details:
  - Jersey name  
  - Price  
  - Category  
  - Availability
- Add jerseys to cart (or place orders – depending on implementation).
- Enter delivery details for **home delivery**.
- View **sports news** section on the website.

### 🛠️ Admin Features
- Admin login panel.
- Add new jerseys:
  - Jersey name  
  - Category (Cricket / Football / Esports)  
  - Price  
  - Image (if implemented)  
  - Availability status
- Manage existing jerseys (edit / delete, depending on your implementation).
- Control what appears in the store.

---

## 🧰 Tech Stack

- **Language:** PHP
- **Frontend:** HTML, CSS, (optional) JavaScript
- **Backend:** Core PHP
- **Database:** MySQL (or MariaDB)
- **Server:** XAMPP / WAMP / Localhost

---

## 📁 Project Structure (example)

> The exact structure may differ, but roughly:

- `index.php` – Homepage / landing page
- `products/` – Product listing / category pages
- `admin/` – Admin dashboard, add jersey, manage jerseys
- `includes/` – Common header/footer, DB connection
- `assets/` – CSS, images, JS files
- `sql/` or `sportshub.sql` – Database schema (if included)

---

## 🚀 Getting Started (Local Setup)

### 1. Prerequisites

- [XAMPP](https://www.apachefriends.org/) or WAMP installed
- PHP & MySQL enabled

### 2. Clone the Repository

```bash
git clone https://github.com/Ishtiak82/Sportshub.git
