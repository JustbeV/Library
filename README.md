#Anime & Manga Library System

A web-based Anime and Manga Library developed using Laravel.
The system allows users to browse available titles, while administrators manage and maintain the content through a secured dashboard.

Overview

This project was built to provide a structured platform for organizing anime and manga collections. It implements role-based access control to separate user permissions from administrative functions.

Regular users can view and explore content, while only administrators are allowed to create, update, or remove entries.

Features
User

Browse anime and manga entries

View detailed information for each title

Responsive and organized interface

Administrator

Secure login authentication

Add new anime and manga entries

Edit existing entries

Delete entries

Upload and manage cover images

Access content management dashboard

Technology Stack

Laravel

PHP

MySQL

Blade Templates

HTML & CSS

Database

The system includes structured tables for:

Users

Anime

Manga

CRUD operations are restricted to administrator accounts through role-based authorization.

Security

Authentication system

Role-based access control

CSRF protection

Server-side validation

Planned Improvements

Support for large video uploads

Search and filtering functionality

Pagination

Rating and review system

Performance optimization

Installation

git clone https://github.com/your-username/your-repository.git
cd your-repository
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve


Developer

Prince Carlo Monacillo
Bachelor of Science in Information Technology
