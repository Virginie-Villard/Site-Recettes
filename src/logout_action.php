<?php
session_start();

require_once 'authentication.php';

logout();

header('Location: index.php');