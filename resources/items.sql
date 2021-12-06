delete from books;
delete from users;

insert into users values(1, "admin", "", "admin@rpi.edu", "admin");
insert into users values(2, "Jane", "Koy", "koyj@rpi.edu", "firstUser1!");

INSERT INTO `books` (`id`, `imgID`, `title`, `authors`, `isbn`, `subjectCode`, `condition`, `desc`, `price`, `sellerEmail`) VALUES
    (1, 'csci-2844507230.jpg', 'Algorithms', 'Sanjoy Dasgupta, Christos Papadimitriou, Umesh Vazirani', '9780073523408', 'csci', 'good', 'includes handwritings+highlightings', '15.00', 'admin@rpi.edu'),
    (2, 'biol-8129677909.jpg', 'Essential Cell Biology', 'Bruce Alberts, Karen Hopkin, Alexander Johnson, David Morgan, Martin Raff, Keith Roberts, Peter Walter', '9780393680379', 'biol', 'fair', 'includes handwritings+highlightings', '20.00', 'admin@rpi.edu'),
    (3, 'csci-5109354294.jpg', 'Practical Programming', 'Paul Gries, Jennifer Campbell, Jason Montojo', '9781680502688', 'csci', 'new', 'csci1100, lightly used', '30.00', 'admin@rpi.edu'),
    (4, 'mgmt-5123364294.jpg', 'Principiles of Management', 'David S Bright,  Anastasia H Cortes,  Eva Hartmann', '9384781502789', 'mgmt1100', 'new', 'shrink wrap included', '45.00', 'admin@rpi.edu'),
    (5, 'econ-5345574294.jpg', 'Principles of Microeconomics', 'N. Gregory Mankiw', '9384781502789', 'econ', 'fair', 'some water damage but all pages inact', '30.00', 'admin@rpi.edu'),
    (6, 'math-5234973584.jpg', 'Calculus Third Edition', 'William L Briggs, William Briggs, Lyle Cochran, Bernard Gillett, Eric L Schulz, Eric Schulz', '9234690702489', 'math', 'fair', 'used', '55.99', 'admin@rpi.edu'),
    (7, 'astr-6038484371.jpg', 'Foundations of Astrophysics', 'Barbara S. Ryden, Bradley M. Peterson', '9780321595584', 'astr', 'poor', '&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit i', '15.75', 'koyj@rpi.edu'),
    (8, 'econ-1658630216.jpg', 'Intermediate Microeconomics: A Modern Approach', 'Hal R. Varian', '9780393934243', 'econ', 'poor', '&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit i', '21.00', 'koyj@rpi.edu'),
    (9, 'math-2371036874.jpg', 'Introduction to Linear Algebra', 'Gilbert Strang', '9781733146654', 'math', 'very good', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis', '87.34', 'koyj@rpi.edu');