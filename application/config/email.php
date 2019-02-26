<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$config['protocol'] = 'smtp';
$config['charset'] = 'utf-8';
$config['wordwrap'] = TRUE;
$config['smtp_auth'] = true;   
$config['smtp_host'] = 'ssl://smtp.gmail.com';
$config['smtp_user'] = 'kaola.no.reply@gmail.com';
$config['smtp_pass'] = 'ifrn2019';
$config['smtp_port'] = '465';
$config['mailtype'] = 'html';
$config['crlf'] = "\r\n";
$config['newline'] = "\r\n";
$config['smtp_timeout'] = '7';