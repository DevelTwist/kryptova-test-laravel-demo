# kryptoval-test-laravel-demo
Laravel test for job appliance

- Install Laravel

- Create following migrations

  - Users (name, email, age, dob, address, password, role, profile_picture) Role allowed values: admin and manager
  - Employee (name, age, salary, profile_picture)
  - Students (first_name (required), last name (not required), address)

- Create a signup form in Laravel views as per the users migration fields (Role should be a dropdown, Do not use Laravel’s default Auth Controllers and Models).
    - Use Laravel’s validation functions, using Request classes.
    - Store profile picture in storage/app/public folder and make them accessible from public.

- Basic Laravel Auth: Ability to log in as administrator and manager. Show different welcome messages for both roles.

- Create a Laravel resource controller with default methods. Students table data will be inserted, updated, deleted, show with this (Show students data with pagination on a view).
- Create an artisan command (php artisan fetch-data), the data will be fetched from this API http://dummy.restapiexample.com/api/v1/employees which will, fetch a record and will add it to a Laravel job. The records will be inserted into employees table only once the queue will run. (php artisan queue:work)