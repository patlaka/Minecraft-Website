# Atrium Minecraft
## A simple website for managing a minecraft server.

Purpose: Post announcements for users to see as well as allow users to create accounts that will be automatically added to whitelist on the server.

See Issues for a list of tasks yet to be added

### Author(s): 
 * Tony Grosinger
 
### Images by: 
 * Lincoln Reedy
 * Tony Grosinger
 
 
# Installation
 * Create includes/connect.php that will connect to the mysql database that you will be using.
 * Use sql dump to create database
 * Change the lowerheader.php and footer.php to have the correct information about your minecraft server.
 * Change the title in header.php
 
# Notes
 * I have all the pictures from my site like screenshots and projects in git, you probably don't need those
 * When a new user is created they are automatically level 1, to view the admin control panel they have to be level 4 and to change items in the admin control panel they have to be level 5.
 * User levels 2 and 3 do not do anything more than 1.
 * Users are automatically given ability to refer people. If someone they refer breaks the rules you can take away their ability to refer more people.
 * I currently have register.php create a line in the whitelist table.  This is for Hey0, and allows people that register on the website to automatically be able to start playing.  This is nice because if a user wants to play with their friend they can immediately start playing