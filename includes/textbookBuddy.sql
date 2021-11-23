DROP TABLE IF EXISTS BookIMG;
DROP TABLE IF EXISTS books;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS subjects;

CREATE TABLE users (
    id INT AUTO_INCREMENT primary key NOT NULL
    , fname VARCHAR(20) 
    , lname VARCHAR(20)
    , email VARCHAR(20) UNIQUE NOT NULL
    , password VARCHAR(100) NOT NULL
);

insert into users values(1, "", "", "admin@rpi.edu", "admin");

CREATE TABLE subjects (
    subjectCode CHAR(4) primary key
)

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
    ('admn'), ('busn')

CREATE TABLE books(
    id INT AUTO_INCREMENT primary key NOT NULL
    , bookID INT UNIQUE
    , title VARCHAR(200)
    , authors VARCHAR(1000)
    , isbn INT
    , subjectCode CHAR(4)
    , `condition` ENUM ('poor', 'fair', 'good', 'very good', 'like new', 'new')
    , `desc` text
    , price numeric(5, 2)
    , sellerEmail VARCHAR(20)
    , FOREIGN KEY (subjectCode) references subject(subjectCode) on delete set null
    , FOREIGN KEY (sellerEmail) references users(email) on delete cascade
);

CREATE TABLE BookIMG (
    bookID INT
    , ImgNo INT primary key NOT NULL
    , FOREIGN KEY (bookID) references books(bookID) on delete cascade
)