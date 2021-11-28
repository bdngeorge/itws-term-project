delete from books;
delete from users;

insert into users values(1, "", "", "admin@rpi.edu", "admin");

-- insert into books values
INSERT INTO `books` (`id`, `imgID`, `title`, `authors`, `isbn`, `subjectCode`, `condition`, `desc`, `price`, `sellerEmail`) VALUES
    (1, 'csci-2844507230.jpg', 'Algorithms', 'Sanjoy Dasgupta, Christos Papadimitriou, Umesh Vazirani', '978-0073523408', 'csci', 'good', 'includes handwritings+highlightings', '15.00', 'admin@rpi.edu'),
    (2, 'biol-8129677909.jpg', 'Essential Cell Biology', 'Bruce Alberts, Karen Hopkin, Alexander Johnson, David Morgan, Martin Raff, Keith Roberts, Peter Walter', '978-0393680379', 'biol', 'fair', 'includes handwritings+highlightings', '20.00', 'admin@rpi.edu'),
    (3, 'csci-5109354294.jpg', 'Practical Programming', 'Paul Gries, Jennifer Campbell, Jason Montojo', '9781680502688', 'csci', 'new', 'csci1100, lightly used', '30.00', 'admin@rpi.edu');