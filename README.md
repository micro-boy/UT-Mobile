# UT-Mobile

## Laravel-based Loan Application

This is a Laravel-based loan application that allows users to apply for loans, view loan details, and manage their loan applications.

## Setup Instructions

1. Clone the repository:
   ```
   git clone https://github.com/micro-boy/UT-Mobile.git
   ```
2. Navigate to the project directory:
   ```
   cd UT-Mobile
   ```
3. Install the dependencies:
   ```
   composer install
   ```
4. Copy the `.env.example` file to `.env`:
   ```
   cp .env.example .env
   ```
5. Generate the application key:
   ```
   php artisan key:generate
   ```
6. Set up the database configuration in the `.env` file.

7. Run the database migrations:
   ```
   php artisan migrate
   ```

## Running the Application

1. Start the development server:
   ```
   php artisan serve
   ```
2. Open your browser and navigate to `http://localhost:8000` to access the application.
