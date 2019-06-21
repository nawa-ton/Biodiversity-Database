# Biodiversity Query Project
Set up:
Go to http://localhost/phpmyadmin/server_databases.php and create new database.
Run initialize-master.sql script to create and populate tables in MySQL.
Change the values of db variables in connect.php to your database info (eg. replace root in $dbpass = "root" to your own password).
Go to http://localhost/check-connection.php to check if database is connected.
Go to any of the pages below to browse around.

There are 10 php pages so far:
- guest-homepage.php: allow guest user to make queries on organism
- register.php: allow user without account to create one
- login.php: allow user with account to log in
- user-homepage.php: similar to guest-homepage.php, except there's menu for users to select what they want to do
- report-sighting.php: allow user to report new sighting
(jquey events: https://docs.google.com/document/d/110Z-txbQ0h5wM8usQaigENXgChldzjYaNl96PguI-Fk/edit)
- edit-delete.php: allow user to select edit or delete option
- edit-single.php: allow user to edit the option they selected in edit-delete.php
- update-location-condition.php: allow user to add construction or maintenance for sighting location
- your-account.php: allow users to edit their info
- admin-users-account.php: allow admin user to view/delete users account

CSS & Jquery:
- Css and jquery are in header.php 

Project Checklist: 
https://docs.google.com/spreadsheets/d/1aRqdp6cg0UCQVjWawG1vqUn3zZLzOk1cYETT6WzaGr8/edit#gid=0

Guest Homepage Screenshot:
![homepage screenshot](https://user-images.githubusercontent.com/45963788/59886725-fb1d4680-9374-11e9-8b1a-8fefd40bba0b.png)

