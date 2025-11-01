
# 🏨 Hotel Booking System (Laravel 10)

A simple hotel booking application built with Laravel 10, featuring authentication, room management, booking validation, and dynamic pricing based on weekends and stay duration.


## Installation

project installtion using composer

```bash
  composer create-project "laravel/laravel:^10.0" hotel_booking
```
create database and config (.env)

```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=hotel_task
    DB_USERNAME=root  
    DB_PASSWORD=
```


## Install laravel breeze auth package and run (required command in CLI)

```bash
    composer require laravel/breeze --dev
    php artisan breeze:install
    php artisan migrate
    npm install
    npm run dev
    php artisan serve
```

## 🧱 Models and Migrations 
Create models and migrations for the following entities:


```bash
    php artisan make:model Room -m
    php artisan make:model RoomCategory -m
    php artisan make:model Booking -m
    php artisan migrate

```

## 🌱 Factories & Seeders

Create factories and seeders to generate dummy data:


```bash
    php artisan make:factory RoomFactory --model=Room
    php artisan make:factory RoomCategoryFactory --model=RoomCategory
    php artisan make:factory BookingFactory --model=Booking

    php artisan make:seeder RoomSeeder
    php artisan make:seeder RoomCategorySeeder
    php artisan make:seeder BookingSeeder

```

Seed the database:

```bash
    php artisan db:seed

```


## 🚀 Features

- ✅ Room category management (with seeded dummy data)

- ✅ Booking form with validation

- ✅ Check room availability between dates

- ✅ Automatic weekend surcharge (+20%)

- ✅ Discount for long stays (10% off for 3+ days)

- ✅ Confirm booking and store in database

- ✅ Thank-you page after booking

- ✅ Built using Eloquent relationships & Laravel validation


## 🔁 Booking Flow (Step-by-Step)



1️⃣ Booking Form

- URL: /booking/form

- Displays a form for user inputs: name, email, phone, from_date, and to_date.

![image](https://github.com/MD-RIFAT-FAKIR/hotel_booking_task_rifat_fakir/blob/d140239659a965ab058a8953a9d6fad037abe775/Screenshot%202025-11-01%20160622.png)

## 2️⃣ Check Availability
Route: POST /check-availability

- Validates input

- Checks available room categories

- Applies:

    - +20% price on Fridays & Saturdays

    - -10% discount for stays ≥ 3 days

- Returns availability.blade.php with available rooms & pricing.

![image](https://github.com/MD-RIFAT-FAKIR/hotel_booking_task_rifat_fakir/blob/af02ce77e8b99aa00ccff7989714d446b0cba7c6/Screenshot%202025-11-01%20161909.png)

## 3️⃣ Confirm Booking
Route: POST /booking/confirm

- Saves booking details to the database.



## 4️⃣ Thank You Page

Route: GET /booking/thank-you/{id}
- Displays booking confirmation details.



## 🧮 Price Calculation Logic



- Condition	Effect
    Friday / Saturday	+20% surcharge

- Stay ≥ 3 days	10% discount on total
## Example Calculation:

```javascript
Base Price: 1000
Stay: 4 days (includes 1 weekend)
→ 1000 + 1000 + 1200 + 1000 = 4200
→ 10% discount = 420
✅ Final Price = 3780

```


## 🧑‍💻 Developer Notes
 - You can modify the maximum number of rooms allowed for booking in BookingController.

 - Add authentication middleware to restrict access if needed.

 - All Blade templates are located in resources/views/.



## ❤️ Credits
Developed by [MD. RIFAT FAKIR]
Built with 💙 using Laravel 10

