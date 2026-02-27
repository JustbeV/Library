#Anime & Manga Library System

**Status:** Development / Proof-of-Concept

Anime & Manga Library is a web-based system developed using Laravel.
Users can browse available anime and manga titles, while administrators manage and maintain content through a secured dashboard.

#Overview

This project provides a structured platform for organizing anime and manga collections.
Role-based access control separates user permissions:

- **Users**: View and explore content
- **Administrators**: Create, update, and delete entries

> Regular users cannot modify content; only administrators have full control over the library.

#Features

##User

- Browse anime and manga entries
- View detailed information for each title
- Responsive and organized interface

##Administrator

- Secure login authentication
- Add new anime and manga entries
- Edit existing entries
- Delete entries
- Upload and manage cover images
- Access content management dashboard

#Technology Stack

- Laravel
- PHP
- MySQL
- Blade Templates
- HTML & CSS

#Database

Structured tables include:

- Users
- Anime
- Manga

> CRUD operations are restricted to administrator accounts using role-based authorization.

#Security

- Authentication system
- Role-based access control
- CSRF protection
- Server-side validation

#Planned Improvements

- Support for large video uploads
- Advanced search and filtering
- Pagination
- Rating and review system
- Performance optimization

#Installation

```bash
git clone https://github.com/JustbeV/Library
cd your-repository
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve

#Developer

Prince Carlo Monacillo
Bachelor of Science in Information Technology
