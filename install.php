<?php
require_once './include/const.php';
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS) or exit('could not connect');
echo "connected<br>";

$query = "drop schema if exists $dbname ";
$r = mysqli_query($con, $query) or exit(mysqli_error($con));
echo "db dropped<br>";

$query = "create schema $dbname ";
$r = mysqli_query($con, $query) or exit(mysqli_error($con));
echo "db created<br>";

mysqli_select_db($con, $dbname);


$query = "CREATE  TABLE app_users (
  id INT NOT NULL AUTO_INCREMENT ,
  user_name VARCHAR(45) NULL ,
  email VARCHAR(100) NULL ,  
  pass VARCHAR(45) NULL ,
  phone_no VARCHAR(45) NULL ,
  role VARCHAR(45) NULL ,
  status VARCHAR(45) NULL ,
  education Text NULL,
  t_desc text NULL,
  location varchar(45) NULL,
  skills varchar(200) NULL,
  experience varchar(40) NULL,
  subjects varchar(200) NULL,
  cate varchar(40) NULL,
  min_batch_size int NULL,
  max_batch_size int NULL,
  min_fees double NULL,
  max_fees double NULL,
  PRIMARY KEY (id) ,
  UNIQUE INDEX email_UNIQUE (email ASC) );";
$r = mysqli_query($con, $query) or exit(mysqli_error($con));
echo "table created<br>";

$query = "insert into app_users(user_name, email, pass, phone_no, role, status ) values "
        . "                     ('admin', 'admin', 'admin', 'admin', 'admin', 'approved') ";
$r = mysqli_query($con, $query) or exit(mysqli_error($con));
echo "inserted<br>";

$query = "CREATE  TABLE enquiry (
  id INT NOT NULL AUTO_INCREMENT ,
  name VARCHAR(45) NULL ,
  email VARCHAR(100) NULL ,  
  phone_no VARCHAR(45) NULL ,
  location varchar(45) NULL,
  subjects varchar(200) NULL,
  tid int,
  status VARCHAR(45) NULL ,
  otp varchar(20),
  rating double,  
  PRIMARY KEY (id));";
$r = mysqli_query($con, $query) or exit(mysqli_error($con));
echo "table created<br>";