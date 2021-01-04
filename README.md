My Project : Create reports page
=================

Hey, i did this in two ways. First without Database and Second with Database. 

I use yii2 php framework for this and mysql database.

First : Without Database
------------------------

1) Download or git clone the project and run composer update for vender.

2) Run yii2 framework using : php yii serve 

3) Load up the app in your browser!

    http://localhost:8080

    - For Api : http://localhost:8080/api/report/report-list

    - For Web Page : http://localhost:8080/report/list  (with pagination)

4) Thats Finish



Second : With Database
----------------------

1) Download or git clone the project and run composer update for vender.

2) Change database connection setting in db.php file, stored at : my_project/config/db.php

2) Install sql file into database,  stored at my_project/data/instal_sql.sql

2) Run yii2 framework using : php yii serve 

3) Load up the app in your browser!

    http://localhost:8080

    - Firstly hit : http://localhost:8080/api/report/save-data  (it will save reports.json file data into database, it may takes 5-10 minutes )

    - For Api : http://localhost:8080/api/report/list

    - http://localhost:8080/api/report/list?page=2  (with pagination)

    - For Web Page : http://localhost:8080/report/index  (with pagination and search functionality)

4) Finish


Thanks & Regards,

Jasvir Markandy