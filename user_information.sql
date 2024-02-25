-- SQL commands to create a new database and table for storing user details
CREATE DATABASE IF NOT EXISTS UserInformation;
USE UserInformation;

-- Creating a table named 'user_details' to store the form data
CREATE TABLE IF NOT EXISTS user_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(100) NOT NULL,
    secondName VARCHAR(100) NOT NULL,
    familyName VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phoneNumber VARCHAR(15) NOT NULL,
    documentPhoto VARCHAR(255) NOT NULL
);