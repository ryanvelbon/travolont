## Setting up the database

    CREATE DATABASE travolont;

### Countries, States, Cities

Download the [world.sql](https://github.com/dr5hn/countries-states-cities-database/blob/master/sql/world.sql) script.

Open a terminal and cd into the directory where you saved `world.sql`.

Launch MySQL Shell

    $ mysqlsh

Connect to your MySQL server 

    > \connect <username>:<password>@<hostname>

    > USE travolont;

Run the SQL file

    > \source world.sql

If you run `SHOW TABLES` you should now see a total of 3 tables: `cities`, `countries`, and `states`.

Now run your migrations.

    $ php artisan migrate
