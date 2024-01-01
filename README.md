## Setting up the database

    CREATE DATABASE travolont;

### Countries, States, Cities

Download the [world.sql](https://github.com/dr5hn/countries-states-cities-database/blob/master/sql/world.sql) script.
Used commit 8060f03ab0aec1380f18d2c80b8bc7d5a8afcc6b to avoid data inconsistencies.

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

Create sample data (optional)

    $ php artisan db:demo
