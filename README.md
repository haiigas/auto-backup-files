## PHP Auto Backup with CronJob and FTP
How to use:
- Set up ftp connection.
- Save the autobackup.php file in the root directory.
- On cPanel open the CronJob menu.
- Set the common settings of cronjob.<br>
````
Minute : 0, Hour : 0, Day : *, Month : *, Weekday : 0
````
- Then enter the following command.<br>
```
/usr/local/bin/php /home/yourname/public_html/autobackup.php
```
The command above will run the autobackup.php file every 1 month at 00:00 AM.
