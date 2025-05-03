
# Automated cPanel Backup Script

`auto-backup` is a PHP script designed to automatically trigger a full backup of a cPanel account. The script can optionally upload the backup file to a remote FTP server. It is typically executed through a cron job to ensure regular and automated backups.

## Features
- Automatically triggers full cPanel account backups.
- Supports optional upload of backup files to a remote FTP server.
- Works with standard cPanel themes such as `paper_lantern`.
- Can run on a schedule via cron job without manual intervention.

## Requirements
- PHP 5.6 or higher
- A cPanel account with access credentials
- Optional: Remote FTP server for off-site backup storage
- Cron job set up on the server to execute the script regularly

## Installation

1. **Configure Credentials**:  
   Open the `autobackup.php` file and set your cPanel and FTP credentials:

   ```php
   $cpaneluser = 'your_cpanel_username';
   $cpaneluserpass = 'your_cpanel_password';
   $ftp = true; // Set to false if you don’t want to use FTP
   $ftpserver = 'ftp.yourdomain.com';
   $ftpusername = 'your_ftp_username';
   $ftppassword = 'your_ftp_password';
   $ftpport = '21';
   $ftpdirectory = '/backup'; // Must exist on the FTP server
   ```

2. **Upload Script**:  
   Upload the `autobackup.php` file to your server (any secure location you prefer).

3. **Set up Cron Job**:  
   Add a cron job to execute the script automatically. For example, to run the script every day at 3:00 AM:

   ```bash
   0 3 * * * /usr/bin/php /path/to/autobackup.php
   ```

   Make sure the path to `php` and `autobackup.php` are correct.

## Customization

- Set `$ftp = false` to save the backup in the home directory instead of uploading to FTP.
- Modify `$theme` if you're using a custom cPanel theme (`paper_lantern` is used by default).
- The `$ftpdirectory` must exist on the remote FTP server before backups are uploaded to it.

## Contributing

Feel free to fork the repository and submit pull requests for improvements or bug fixes.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
