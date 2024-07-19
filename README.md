<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Overiew
Laravel ecommerce is built in laravel 8 version and MySQL database for the backend. It has different features for the user like a user can view all the category, select a product and select the quantity and add the product to his cart. The user can add multiple products in cart and wishlist. There are mutliple payment methods in the checkout page such as PayPal, Razorpay and COD.

## About My Project

### Intro
- Build project at: 17/06/2567
- Developer: Supatsara Bangnimnoi
- Email: supatsara.bnn@gmail.com
- Location: TH


- Permission at :: 21/06/2567
- Role at :: 22/06/67

### Tools
- vscode
- php laravel framwork 10.0
- php version 8.2.12
- boostrap
- mysql
- Spatie : for role and permission

### Requirements
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
6. Checkout information validation before placing order
7. Checkout Page (Payment)
<!-- 8. Multiple payment option during checkout - PayPal , Razorpay and Cash on Delivery -->
9. View orders and order status
<!-- 10. User can rate a product, out of 5 stars, only after purchasing the product -->
<!-- 11. User can review a product only after purchasing the product -->
<!-- 13. User can edit and update his ratings and reviews -->


#### Admin Side:

1. Category CRUD
2. Product CRUD
<!-- 3. Control the visibility of product and category (Hide/Show) -->
4. All Statistics on Dashboard (Total Orders, Uses, Completed Orders, etc)
5. View Order and order items
6. Update Order status

#### SuperAdmin Side:
1. View registered users
2. Permission CRUD
2. Role CRUD
3. Give role to user


-------------------
## Instruction

1. Clone the repository: git clone <repository-url>
2. Navigate to the project directory: cd <repository-name>
3. Install dependencies: composer install
4. Set up environment variables: cp .env.example .env
5. Generate an application key: php artisan key:generate
6. Configure the database and run migrations: php artisan migrate
7. (Optional) Seed the database: php artisan db:seed
Start the development server: php artisan serve

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
