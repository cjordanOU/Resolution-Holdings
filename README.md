# Resolution-Holdings
Website for CSI 3450 Project.

Created by Cameron Jordan, William Buerkle, and Brandon Sharp.

# How to run the website using PHP
-The easiest way to run this website using PHP on your own local computer is to download and install XAMPP.

https://www.apachefriends.org/index.html

-After installing, move the Resolution-Holdings folder inside of the htdocs directory in xampp.

-Next, make sure Apache and mySQL is running from the XAMPP Control Panel.

-You should now be able to see the website running at http://localhost/Resolution-Holdings/index.php

# NOTE: You won't be able to display the pages properly without using apache or another PHP server.
PHP requires a webserver to process the webpage before displaying it in your browser, so you can't just open it like you can with an HTML document.

# How to set up the SQL database
-Make sure Apache and mySQL are running from the XAMPP Control Panel.

-Navigate to the phpMyAdmin page to view the mySQL information.

http://localhost/phpmyadmin/index.php

-Make new database called "resolution-holdings"

-Import members.sql into "resolution-holdings"

-Make sure $dbLocation is set to the proper database location in the file "Includes/dbConfig.php"
(For running locally with XAMPP, keep the default location specified)

-Set $dbUsername and $dbPassword to the password used on your db
