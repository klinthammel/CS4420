Installation of this tool
=========================

Assumptions
-----------
We are assuming you have the following:
- Web server running a recent stable version of PHP (PHP 7 has not been tested at this time)
- Database server where you can create a database
- The two servers above can talk.

Steps
-----
1. Download the lastest stable version from [https://github.com/klinthammel/CS4420/releases](https://github.com/klinthammel/CS4420/releases).
2. Unzip the source code archive.
3. Create a database to store the data.
4. Execute sql/full_database.sql against the database you just created.
5. Copy the rest of the archive to the web server.
6. Copy vars/conf.inc.sample.php to vars/conf.inc.php.
7. Open vars/conf.inc.php and modify the values according to the comments in the file.
8. Start your web server, and open the site in your web browser.
