<?php

session_start();
session_destroy();
echo "<script>window.open('overview','_self')</script>";
?>