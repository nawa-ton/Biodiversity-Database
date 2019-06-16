# README PLEASE :-)
1. Make sure that you have access to your public_html directory on undergrad server (refer to tutorial 7).
2. Transfer all files to your public_html directory (do not create subdirectory). 
3. Access the site: https://www.students.cs.ubc.ca/~yourcwlaccount/index.php
4. You can play around by clicking the links. 
To see the page flow, go to https://docs.google.com/drawings/d/1ZrqPRGDGm7kvMzRPUnyFfhQtQUIfDNNONw0GriSln-g/edit?fbclid=IwAR3CNsVhBPx3z6J1f2s0J_l-2tvYwUdhwnT6TURPaBvrO9x_vbKGEModMB0


There are 10 php pages so far:
- guest-homepage.php: allow guest user to make queries on organism
- register.php: allow user without account to create one
- login.php: allow user with account to log in
- user-homepage.php: similar to index.php, except there's menu for users to select what they want to do
- report-sighting.php: allow user to report new sighting
(I added some jquey event on this page. Please see: https://docs.google.com/document/d/110Z-txbQ0h5wM8usQaigENXgChldzjYaNl96PguI-Fk/edit)
- edit-delete.php: allow user to select edit or delete option
- edit-single.php: allow user to edit the option they selected in edit-delete.php
- update-location-condition.php: allow user to add construction or maintenance for sighting location
- your-account.php: allow users to edit their info
- admin-users-account.php: allow admin user to view/delete users account
(since everything else for admin is pretty much the same as regular user, I'm not sure if we need to create other pages for admin. 
Anyway, let's finish regular user part first and it'll be easy to create admins pages later if we want to.)


SQL Tables:
- when you are in public_html, run sqlplus and then run this command "start biodiversity.sql" (refer to tutorial 9 #6)
this will create all the tables we need.
- Then run "start insertdata.sql", this will insert some values into all tables, so we have some data to work on.
- I found that we can actually merge some tables because of total participation. 
Now, toxin is merged with produce_toxin, construction is merged with remodel, and maintenance is merged with location maintanance.
- I also changed all ID domains from varchar to NUMBER GENERATED ALWAYS AS IDENTITY. This is like AUTO_INCREMENT in MySql.
It will generate IDs automatically by incrementing by 1.
- if you want to clear delete all tables in one go. You can run this command "start dropalltables.sql"


CSS & Jquery:
- Css and jquery are in header.php 
(I tried to create subfolder for this, but not sure why it doesn't work. So, I keep them in header for now.)


Project Checklist: 
https://docs.google.com/spreadsheets/d/1aRqdp6cg0UCQVjWawG1vqUn3zZLzOk1cYETT6WzaGr8/edit#gid=0
