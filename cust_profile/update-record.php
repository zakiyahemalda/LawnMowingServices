<?php
$array = $_POST;
$encodedString = json_encode($array);

file_put_contents('myfile.txt', $encodedString);
