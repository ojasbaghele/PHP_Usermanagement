How To Run This Project - 

1) Download Xampp(https://www.apachefriends.org/download.html)_[~150mb] And Install it inside C drive.

2) Extract Zip inside C:\xampp\htdocs Folder.

3) Close all application using my sql server. eg- mysql Workbench.

4) Open Xampp Control Panel And Run Apache And My SQL.

5) Open phpMyAdmin page by clicking on Admin Button Under MySQL.
Enter This URL In Browser - http://localhost/phpmyadmin/index.php

6) Create A Database in phpMyAdmin. Database Name : php_user

7) Import SQL Text File(php_user) Given In The Zip.
OR Use This SQL Script-

 CREATE TABLE `user_management` ( `id` int(3) NOT NULL, `userType` varchar(5) NOT NULL, `username` varchar(30) NOT NULL, `email` varchar(45) NOT NULL, `password` varchar(255) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

8) Enter This URL Browser - http://localhost:3000/PHP_project/signup.php

------------  DONE ------------

Default Details If Imported From SQL Text File.

--- User ---
Username - user
Email - user@gmail.com
Password - User@1234
--- Admin ---
Username - admin
Email - admin@gmail.com
Password - Admin@1234

Username Should be in Alphablets Only.
Password must Have Atleast 1 Uppercase, 1 Lowercase,1 Number, 1 Special Character.

