CREATE TABLE password_list (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user varchar(255),
    title VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    FOREIGN KEY (user) REFERENCES users(username)
);

ALTER TABLE password_list CHANGE COLUMN title uname VARCHAR(255), ADD COLUMN website VARCHAR(255);
