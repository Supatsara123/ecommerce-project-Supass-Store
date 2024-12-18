<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About My Project
Laravel e-commerce is built in laravel v.10.0 and MySQL database for the backend. It has different features for the user like a user can view all the category, select a product and select the quantity and add the product to your cart. The user can add multiple products in cart and wishlist. There are mutliple payment methods in the checkout page such as PromptPay and COD.


## Intro
- Build project at: 17/06/2567 (Not Complete)
- Developer: Supatsara Bangnimnoi
- Email: supatsara.bnn@gmail.com
- Location: TH

## Tools
- vscode
- php laravel framwork v.10.0
- php version 8.2.12
- boostrap
- mysql
- Spatie : for role and permission

## Requirements
- Host : Localhost
- Composer
- PHP Version : 8.2.12 and above
- Database : MySQL DB
- Web Browser : Chrome, FireFox, Internet Explorer, MS Edge.

### Scope User
1. SuperAdmin : can manage role permission. (1 person)
2. Admin : 
    - can manage Ad Banner.
    - can manage view personal data of seller and customer.
    (Many Person)
3. Seller
    - can register to be seller.
    - can decorate banner & profile store.
    - can update address for shipping.
    - can mannage products.
    (Many Person)
4. Customer
    - can view product (all people).
    - can view info for start seller.
    - can register to be customer and login.
    - add a product to cart.
    - can buy product and payment.
    - check status shipping and get email when status update.
    - confirm complete status when you recieve product already.
    (Many Person)


-----------------------------

### Features
Laravel ecommerce has various features listed below:

#### Customer Side:

1. Login and Register
2. Product quantity increment/decrement before adding to cart
3. Add to Cart
<!-- 4. Add to Wishlist -->
<!-- 5. Add to cart with product quantity increment/decrement from the Cart and Wishlist page. -->
4. Checkout information validation before placing order
5. Checkout Page (Payment)
<!-- 8. Multiple payment option during checkout - PayPal , Razorpay and Cash on Delivery -->
6. View orders and order status
<!-- 10. User can rate a product, out of 5 stars, only after purchasing the product -->
<!-- 11. User can review a product only after purchasing the product -->
<!-- 13. User can edit and update his ratings and reviews -->


#### Admin Side:

1. Category CRUD
2. Product CRUD
<!-- 3. Control the visibility of product and category (Hide/Show) -->
3. All Statistics on Dashboard (Total Orders, Uses, Completed Orders, etc)
4. View Order and order items
5. Update Order status

#### SuperAdmin Side:
1. View registered users
2. Permission CRUD
3. Role CRUD
4. Give role to user


-------------------
## Instruction

### 1. Clone the repository: 
git clone <repository-url>

### 2. Navigate to the project directory: 

```shell
cd <repository-name>
```

### 3. Install dependencies: 

```shell
composer install
```

### 4. Set up environment variables:
```shell
cp .env.example .env
```
Or

```shell
copy .env.example .env
```

### 5. Generate an application key:

```shell
php artisan key:generate
```

### 6. Set Up the Database

Configure your database settings in the .env file. You'll need to provide the database connection details, such as database name, username, and password:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

### 7. Configure the database and run migrations

Run migrations to create the necessary tables in your database:

```shell
php artisan migrate
```

### 8. Seed the database: 
```shell
php artisan db:seed
```


### 9. Vite Installation

- Install dependencies

```shell
npm install
```

- Build Assets

```shell
npm run build
```

### 10. Start the Development Server

To start the built-in Laravel development server, run:

```shell
php artisan serve
```

By default, this will start the server on 'http://localhost:8000.'


## How to Install

1. Run git clone 'link projer github'
2. composer install
3. cp .env.example .env or copy .env.example .env
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed
7. php artisan serve

8. npm install
9. npm run build
