<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

🚀 CRM System — Laravel 10 Powered Business Dashboard

Welcome to your all-in-one CRM System — a clean, modern, and powerful dashboard application crafted with Laravel 10. Whether you're managing clients, sending proposals, generating invoices, or tracking transactions — this system has got your back.

Built with the goal of simplicity, scalability, and speed, it seamlessly integrates with Stripe for payments and Mailtrap for email notifications — all wrapped in a secure authentication layer with Laravel Breeze.

✨ Core Features at a Glance

✅ User Auth with Laravel Breeze<br>
👥 Customer Management — Add, Edit, Delete, View <br>
📑 Proposal Tracking — Organized, Editable, Reusable<br>
🧾 Invoice Generation — Easy, Fast & Professional<br>
💰 Transaction Records — Stay Financially Aware<br>
📬 Email Notifications via Mailtrap<br>
💳 Stripe Payment Integration<br>
⚙️ Background Jobs with Laravel Queues (Queue Workers FTW)

🛠️ How to Run Locally

Make sure XAMPP is up and running before you begin.

🔽 Clone the Repo

git clone https://github.com/NaveenDeemantha/crm_system.git
cd crm_system

⚙️ Setup Environment

cp .env.example .env
Set your database, Stripe, and Mailtrap credentials in .env

📦 Install Dependencies

composer install
npm install

🛢️ Migrate the Database

php artisan migrate

🖥️ Serve the App

php artisan serve

🔧 Compile Assets

npm run dev

🔄 Start Queue Worker

bash
Copy
Edit
php artisan queue:work


🌐 Tech Stack
Laravel 10<br>
Laravel Breeze<br>
Blade Templating + Alpine.js<br>
MySQL (XAMPP)<br>
Mailtrap for Dev Emails<br>
Stripe API for Payments<br>
Laravel Queues for Background Jobs<br>

📌 Final Thoughts
This CRM system is built to be clean, modular, and extendable. Whether you're building it for your business, portfolio, or next big startup — you're already halfway there. Dive into the code, customize it, and make it your own.
