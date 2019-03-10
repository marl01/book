<?php

// Oturumu baslat
session_start();


// Oturumu kapat
session_destroy();

// Ana sayfaya yonlendir
header("Location: index.php");

