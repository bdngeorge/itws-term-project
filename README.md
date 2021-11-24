# TEXTBOOK BUDDY

## Steps to get database to work

1. Go to phpmyadmin
1. create db called `textbook_buddy`
1. import sql from `resources/textbookBuddy.sql`
    1. I periodically update this from time to time
1. Go to `includes/dbconnect.php` and change line 6 to your password
1. Run

## Functionalities So Far
1. you can create account
1. you can login
1. you can log out
1. you can upload a book (only if you're logged in)
    1. If you're not logged in, sell book form page will be redirected to login page

## ToDo
1. Upload Books form
    1. make it look nice
    1. upload images
1. Catalog
    1. make filters look nice
        1. make it so checkboxes aren't deleted when submit is clicked
    1. show books
        1. I can make this easily display right book if you can make a nice looking box+grid
1. Seller Profile
1. Home page
1. click on book from catalog for more info
1. purchase book
1. ... 
