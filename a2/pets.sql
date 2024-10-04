CREATE DATABASE IF NOT EXISTS petsvictoria;
USE petsvictoria;

CREATE TABLE pets (
  petid INT AUTO_INCREMENT PRIMARY KEY,
  petname VARCHAR(255) NOT NULL,
  type VARCHAR(100) NOT NULL,
  description TEXT,
  age DOUBLE,
  location VARCHAR(255),
  image VARCHAR(255),
  caption VARCHAR(255)
);
