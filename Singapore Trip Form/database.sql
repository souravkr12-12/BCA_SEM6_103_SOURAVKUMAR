-- Create database
CREATE DATABASE IF NOT EXISTS singapore_trip;

-- Use the database
USE singapore_trip;

-- Create table
CREATE TABLE IF NOT EXISTS trip_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    gender VARCHAR(10) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    other TEXT,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);