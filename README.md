# TEXTBOOK BUDDY

## Steps to get database to work

1. start xampp
1. clone dir under `htdocs/textbook_buddy`
1. Go to phpmyadmin  `localhost`
1. create db called `textbook_buddy`
1. import sql from `resources/textbookBuddy.sql`. THEN import `resources/items.sql`
    1. I periodically update these from time to time
    1. if you want to add data, put it under `resources/items.sql`
1. Go to `includes/dbconnect.php` and change line 6 to your password
1. Open website in browser with link `http://localhost/textbook_buddy`


## ToDo
1. Add more fake data, 
    1. Login `account/account.php`
    2. Upload  `catalog/uploadBooks.php`
        all book img will be located under resources/bookIMG in format `subject-10randomDigits.ext`. Using the form will do that for you
    4. Then in phpmyadmin, go to 
        ``` 
        textbook_buddy 
        -> books 
        -> export, 
        and copy and paste things under INSERT INTO `books` into `items.sql`

