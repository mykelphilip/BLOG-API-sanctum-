 Laravel Blog REST API

Overview
The Laravel Blog REST API  provides a robust and scalable foundation for managing user-generated content with Laravel. Leveraging Eloquent ORM for smooth database interaction and Laravel Sanctum for secure token-based authentication, this API is designed to ensure data integrity, flexibility, and a seamless user experience across client applications.

Features
User & Post Management: Efficient CRUD operations on Users and Posts tables.
Token-Based Authentication: Secure endpoints with Laravel Sanctum for SPA or mobile app compatibility.
Flexible Data Handling: User and Post relationships defined using Eloquent ORM for easy retrieval and scalability.
Efficient Querying: Supports eager loading and dynamic scoping for optimized data access.
RESTful Standards: Follows standard REST conventions for API responses, with JSON formatting for client ease.

Technical Specifications
Framework: Laravel
Authentication: Laravel Sanctum
ORM: Eloquent
Design Patterns: Service Container and Repository Pattern

 Installation

1. Clone the Repository:
   ```Git Bash
   git clone https://github.com/yourusername/laravel-blog-api.git
   cd laravel-blog-api
   ```

2. Install Dependencies:
   ```Git Bash
   composer install
   ```



3. Environment Setup:
   Copy the `.env.example` file to `.env` and update the database credentials:
   ```Git Bash
   cp .env.example .env
   ```

4. Generate Application Key:
   ```Git Bash
   php artisan key:generate
   ```

5. Run Migrations:
   ```Git Bash
   php artisan migrate
   ```

6. Install Laravel Sanctum:
   Run the Sanctum installation command:
   ```Git Bash
   php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
   ```

7. Start the Server:
   ```Git Bash
   php artisan serve
   ```

Endpoints

 Authentication
Login: `POST /api/login`
Register: `POST /api/register`
Logout: `POST /api/logout`

Users
List Users: `GET /api/users`
Get User by ID: `GET /api/users/{id}`
Update User: `PUT /api/users/{id}`
Delete User: `DELETE /api/users/{id}`

Posts
List Posts: `GET /api/posts`
Create Post: `POST /api/posts`
Get Post by ID: `GET /api/posts/{id}`
Update Post: `PUT /api/posts/{id}`
Delete Post: `DELETE /api/posts/{id}`


Example Usage

To create a new post, send a `POST` request to `/api/posts` with a valid user token:
```json
{
    "title": "New Blog Post",
    "content": "Content of the blog post",
    "user_id": 1
}
```

Testing
Run the tests to ensure the API is functioning as expected:
```Git bash
php artisan test
```

License
This project is open-sourced under the MIT license. 


