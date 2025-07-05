# ❤️ Blood Donate Management System (BDMS)

A comprehensive system to manage blood donation events, donor registration, medical eligibility, campaign organization, and role-based access for doctors, healthcare agents, and administrators.

> 🔗 [GitHub Repository](https://github.com/Suneeh99/blood_bridge)

---

## 🔹 Overview

The **Blood Donate Management System (BDMS)** provides a user-friendly, smart platform for managing blood donation activities. It ensures secure, streamlined operations for donors, healthcare professionals, and system administrators.

---

## 🔹 Key Features

### 👤 For Donors

* Register and log in with personal credentials.
* View and enroll in upcoming blood donation campaigns.
* Receive reminders and updates.
* Fill and upload the terms and conditions form digitally.
* View donation eligibility status.

### 🎓 For Healthcare Agents

* Review uploaded forms for eligibility.
* Approve or reject donor participation.
* Manage and verify donor health data.
* Approve or reject campaign requests from users.

### 👩‍⚕️ For Doctors

* View donor eligibility forwarded by healthcare agents.
* Conduct physical checkups and update donor medical details.
* Final decision-making on donor eligibility.

### 📅 Campaign Requests

* Users can request a donation campaign (date, time, venue).
* Healthcare agents review and approve requests.
* Approved users can post and pay for advertisements.
* Campaign details can be updated as needed.

### 🚧 Admin Panel

* Register doctors and healthcare agents.
* Manage user accounts.
* Control all system-wide settings.

---

## 📚 System Architecture

This project consists of two major components:

### 1. 🌐 Laravel-Based Web Application

* Repository: [Blood\_Bridge\_Web](https://github.com/Suneeh99/blood_bridge/tree/main/Blood_Bridge_Web)
* Used for the public website and donor/user dashboard.
* Manages donor interaction, login, campaign enrollment, and profile updates.

### 2. 📊 Java MVC Control Panel

* Repository: [Blood\_Bridge\_Controlpanel](https://github.com/Suneeh99/blood_bridge/tree/main/Blood_Bridge_Controlpanel)
* Separate admin, doctor, and healthcare agent dashboards.
* Built with Java MVC architecture.
* Used for form reviews, approvals, campaign management, and health updates.

---

## 💳 Database Schema

* SQL File: [tables.sql](https://github.com/Suneeh99/blood_bridge/blob/main/DB-mysql/tables.sql)
* MySQL-based schema
* Includes tables for users, campaigns, appointments, roles, logs, health records, and payments.

---

## 💻 Installation Instructions

### 🔧 Laravel Web App Setup (`Blood_Bridge_Web`)

1. **Clone the repository:**

   ```bash
   git clone https://github.com/Suneeh99/blood_bridge.git
   cd blood_bridge/Blood_Bridge_Web
   ```

2. **Install PHP dependencies:**

   ```bash
   composer install
   ```

3. **Setup Environment:**

   * Copy `.env.example` to `.env`
   * Configure database credentials

   ```bash
   php artisan key:generate
   php artisan migrate
   php artisan db:seed (if available)
   ```

4. **Run Laravel Server:**

   ```bash
   php artisan serve
   ```

5. **Access:**
   Navigate to `http://localhost:8000`

---

### ☕ Java MVC Control Panel Setup (`Blood_Bridge_Controlpanel`)

1. Open in your preferred Java IDE (IntelliJ/Eclipse).
2. Build the project using Maven or manually set classpaths.
3. Run the main controller/server class.

> Ensure database connection settings match your MySQL setup.

---

## 📅 Future Enhancements

* Email/SMS reminders
* Analytics for campaign efficiency
* QR-code based check-in
* API integration

---

## 👨‍💻 Author

**Suneth Hettiarachchi**
GitHub: [@Suneeh99](https://github.com/Suneeh99)
