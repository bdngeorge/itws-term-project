DROP TABLE IF EXISTS users;

-- all fields are required
CREATE TABLE users (
    id INT AUTO_INCREMENT primary key NOT NULL
    , fname VARCHAR(20) NOT NULL
    , lname VARCHAR(20) NOT NULL
    , email VARCHAR(10) UNIQUE NOT NULL
    , password VARCHAR(100) NOT NULL
);


-- insert into users values(1, "kelly", "don", "donk1", "password");