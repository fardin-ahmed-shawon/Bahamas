CREATE TABLE certificates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    seafarer_name VARCHAR(255) NOT NULL,
    nationality VARCHAR(100),
    capacity VARCHAR(100) NOT NULL,
    certificate_type VARCHAR(100) NOT NULL,
    tracking_number VARCHAR(255) NOT NULL,
    date_of_issue DATE NOT NULL,
    date_of_expiry DATE NOT NULL,
    certificate_status VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(150) NOT NULL,
    password VARCHAR(255) NOT NULL
);