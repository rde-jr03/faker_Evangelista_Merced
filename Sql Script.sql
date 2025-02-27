CREATE DATABASE php_faker;

CREATE TABLE employee (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lastname VARCHAR(50),
    firstname VARCHAR(50),
    office_id INT,
    address VARCHAR(255)
);

CREATE TABLE office (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    contactnum VARCHAR(20),
    email VARCHAR(100),
    address VARCHAR(255),
    city VARCHAR(100),
    country VARCHAR(50),
    postal VARCHAR(20)
);

CREATE TABLE transaction (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT,
    office_id INT,
    datelog DATE,
    action VARCHAR(255),
    remarks TEXT,
    documentcode VARCHAR(50),
    FOREIGN KEY (employee_id) REFERENCES employee(id),
    FOREIGN KEY (office_id) REFERENCES office(id)
);