<?php

$conn = mysqli_connect("localhost", "root", "", "dbevent");

if (!$conn) {
    echo "Connection Failed";
}