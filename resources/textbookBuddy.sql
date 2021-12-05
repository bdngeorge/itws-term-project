-- DROP TABLE IF EXISTS BookIMG;
DROP TABLE IF EXISTS reservebooks;
DROP TABLE IF EXISTS books;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS subjects, conditions;

CREATE TABLE users (
    id INT AUTO_INCREMENT primary key NOT NULL
    , fname VARCHAR(20) 
    , lname VARCHAR(20)
    , email VARCHAR(20) UNIQUE NOT NULL
    , password VARCHAR(100) NOT NULL
);

-- insert into users values(1, "", "", "admin@rpi.edu", "admin");

CREATE TABLE subjects (
    subjectCode CHAR(4) primary key
);

insert into subjects values
    ('arts'), ('cogs'), ('comm'), ('econ'), 
    ('gsas'), ('ihss'), ('lang'), ('litr'), 
    ('phil'), ('psyc'), ('stso'), ('writ'), 
    ('bmed'), ('chme'), ('civl'), ('ecse'), 
    ('engr'), ('enve'), ('esci'), ('isye'), 
    ('mane'), ('mtle'), ('astr'), ('bcbp'), 
    ('biol'), ('chem'), ('csci'), ('erth'), 
    ('isci'), ('math'), ('matp'), ('phys'),
    ('inev'), ('usaf'), ('usar'), ('usna'), 
    ('arch'), ('lght'), ('itws'), ('mgmt'),
    ('admn'), ('busn');

CREATE TABLE conditions (
    id INT AUTO_INCREMENT primary key NOT NULL
    ,`condition` CHAR(9) unique
);

insert into conditions(`condition`) values 
    ('poor'), ('fair'), ('good'), 
    ('very good'), ('like new'), 
    ('new');

CREATE TABLE books(
    id INT AUTO_INCREMENT primary key NOT NULL
    , imgID VARCHAR(20) UNIQUE    -- references image
    , title VARCHAR(200)
    , authors VARCHAR(1000)
    , isbn VARCHAR(20)
    , subjectCode CHAR(4)
    , `condition` CHAR(9)
    , `desc` text
    , price numeric(5, 2)
    , sellerEmail VARCHAR(20) not null
    , FOREIGN KEY (`condition`) references `conditions`(`condition`) on delete set null
    , FOREIGN KEY (subjectCode) references subjects(subjectCode) on delete set null
    , FOREIGN KEY (sellerEmail) references users(email) on delete cascade
);