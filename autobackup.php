<?php
  // Settings
  $cpaneluser = 'cpanelusername'; // cPanel username
  $cpaneluserpass = 'cpanelpassword'; // cPanel password
  $theme = 'paper_lantern'; // Must match current selected cPanel theme ('paper_lantern' in the majority of cases, 'x3' is possible as well)
  $ftp = true; // If it's false the backup will be stored in user's home directory, otherwise it will be uploaded via FTP to some custom location
  $ftpserver = 'ftp.domain.com'; // Must be localhost for current server or custom hostname for remote FTP upload
  $ftpusername = 'ftpusername'; // cPanel/SFTP username. Should be the same as cPanel username for local upload or custom for remote upload
  $ftppassword = 'ftppassword'; // cPanel/SFTP password. Should be the same as cPanel password for local upload or custom for remote upload
  $ftpport = '21'; // SFTP port. Should be 21 in most cases.
  $ftpdirectory = '/backup'; // Directory on FTP server to store backups. MUST EXIST BEFORE BACKUP OR BACKUP PROCESS WILL FAIL

  // Do not edit below this line
  $domain = 'localhost';
  $secure = true;
  $auth = base64_encode($cpaneluser . ":" . $cpaneluserpass);
  if ($secure) { 
      $url = "ssl://" . $domain; 
      $port = 2083; 
  } else {  
      $url = $domain;  
      $port = 2082;
  }
  $socket = fsockopen('localhost', 2082);
  if (!$socket) {  
      exit("Failed to open socket connection.");
  }
  if ($ftp) {
      $params = "dest=ftp&server=$ftpserver&user=$ftpusername&pass=$ftppassword&port=$ftpport&rdir=$ftpdirectory&submit=Generate Backup";
  } else {
      $params = "submit=Generate Backup";
  }
  fputs($socket, "POST /frontend/" . $theme . "/backup/dofullbackup.html?" . $params . " HTTP/1.0\r\n");
  fputs($socket, "Host: $domain\r\n");
  fputs($socket, "Authorization: Basic $auth\r\n");
  fputs($socket, "Connection: Close\r\n");
  fputs($socket, "\r\n");
  while (!feof($socket)) {
      $response = fgets($socket, 4096);
      // echo $response; //uncomment this line for debugging
  }
  fclose($socket);
?>
