# Overview

The webapp pastespace is designed to write share and save code on the fly. One of the key features being the inclusion syntax highlighting for
easier understanding of what the code is and what language is it primarily written in if the user happens not to have an IDE. 
Pastespace also of course includes a saving feature for the user to save the code on cloud storage and identified with a unique link to access it 
at any point in time.

# Install Guide


## Pre-requisites:
1) PHP Dependencies (MAMP for MAC and XAMMP for Windows)
2) Database Dependencies for MySQL (MAMP for MAC and XAMMP for Windows)

Due to the website being server intensive, some key parts of the code must be changed whenever installed on a new server.

1) Create a Database on the server to store all the user data in with the following queries:

```
"CREATE database IF NOT EXISTS `scrum2`;

CREATE table `pasteSpace`
(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
author VARCHAR(50) NOT NULL,
title VARCHAR(50) NOT NULL,
language VARCHAR(20),
paste TEXT NOT NULL, 
url VARCHAR(100)
);"
```


2) Once succesful, change the following lines of code in both index.php, push_data.php and result.php to work with your server.

```
$host = 'YourHostAdress';
$db   = 'scrum2';
$user = 'TheUserNameOfTheDatabase';
$pass = 'Password(IfChosen)';
$charset = 'utf8mb4';
```

3) Install the fonts in the directory "Source_Code_Pro" using the two ".ttf" files.