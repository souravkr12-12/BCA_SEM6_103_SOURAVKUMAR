# 🎨 MyEPortfolio

A personal ePortfolio web application where users can register, login, and showcase their projects online.

🌐 **Live Demo:** [myeportfolio.site](https://myeportfolio.site)

---

## ✨ Features

- 📝 User Registration & Login
- 🖼️ Profile Photo Upload
- ➕ Add, Edit & Delete Projects
- 📸 Project Image Upload
- 🔗 Project Link Support
- 👤 Public Portfolio Page
- 🔒 Session-based Authentication
- 📱 Responsive Design

---

## 🛠️ Tech Stack

| Technology | Usage |
|---|---|
| HTML & CSS | Frontend Design |
| PHP | Backend Logic |
| MySQL | Database |
| XAMPP | Local Development |
| InfinityFree | Web Hosting |
| Cloudflare | Security & SSL |
| Hostinger | Domain |

---

## 📁 Project Structure

```
E-Portfolio/
├── index.php          # Landing/Home page
├── register.php       # User Registration
├── login.php          # User Login
├── dashboard.php      # User Dashboard (Add/Delete Projects)
├── edit_project.php   # Edit Project Details
├── portfolio.php      # Public Portfolio Page
├── logout.php         # Logout
├── config.php         # Database Config (not included)
├── database.sql       # Database Structure
└── uploads/           # Uploaded Images (not included)
```

---

## ⚙️ Setup Locally

### 1. Clone the Repository
```bash
git clone https://github.com/souravkr12-12/eportfolio.git
```

### 2. Setup XAMPP
- Install XAMPP
- Start **Apache** and **MySQL**

### 3. Import Database
- Open `localhost/phpmyadmin`
- Create new database — `eportfolio`
- Import `database.sql` file

### 4. Configure Database
Create `config.php` file:
```php
<?php
session_start();
$host     = "localhost";
$dbname   = "eportfolio";
$username = "root";
$password = "";
$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
```

### 5. Run Project
- Open browser
- Go to `localhost/E-Portfolio`

---

## 🔒 Security Notes

- `config.php` is **not included** for security reasons
- `uploads/` folder is **not included** in repository
- Cloudflare SSL is enabled on live site

---

## 📄 License

This project is for personal/educational use only.

---

## 👨‍💻 Developer

**Sourav Kumar**
- 🌐 [myeportfolio.site](https://myeportfolio.site)
- 📧 souravkumarmgr72@gmail.com
