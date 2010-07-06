<?php
require('jdate.class.php');

$date = "2010-01-01 00:12:12";
$udate = 1262300400;

$d = new JDate();
print_r($d->getWeek($date));
print_r($d->getWeek($udate));
print_r($d->getWeek());

