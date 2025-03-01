CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL
);

INSERT INTO users (name, email) VALUES 
('John Doe', 'john@example.com'),
('Jane Doe', 'jane@example.com');
