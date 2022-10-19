<?php
require "systems.php";
session_destroy();
saveAuth(4);
header("Location: login.php");