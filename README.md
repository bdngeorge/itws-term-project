# TEXTBOOK BUDDY

## Steps to get database to work

1. start xampp
1. clone dir under `htdocs/textbook_buddy`
1. go to `http://localhost/textbook_buddy`
1. Go to phpmyadmin  `localhost`
1. create db called `textbook_buddy`
1. import sql from `resources/textbookBuddy.sql`. THEN import `resources/items.sql`
    1. I periodically update these from time to time
    1. if you want to add data, put it under `resources/items.sql`
1. Go to `includes/dbconnect.php` and change line 6 to your password
1. Run

## Functionalities So Far
1. you can create account
1. you can login
1. you can log out
1. you can upload a book (only if you're logged in)
    1. If you're not logged in, sell book form page will be redirected to login page
1. you can filter books (not by search bar yet)
1. you can click on book for more info


## ToDo
1. Upload Books form
    1. make it look nice
    1. Add fake data, 
        1. Login `account/account.php`
        2. Upload  `catalog/uploadBooks.php`
            all book img will be located under resources/bookIMG in format `subject-10randomDigits.ext`. Using the form will do that for you
        4. Then in phpmyadmin, go to 
            ``` 
            textbook_buddy 
            -> books 
            -> export, 
            and copy and paste things under INSERT INTO `books` into `items.sql`
            ````
1. Catalog
    1. make filters look nice
        1. make it so checkboxes aren't deleted when submit is clicked
    1. show books
        1. make UI look nice
    1. book info
        1. clicking on image will show more info about that book
            1. make UI look nice
1. Seller Profile
1. Home page
1. click on book from catalog for more info
1. purchase book
1. ... 
