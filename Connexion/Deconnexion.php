<?php
session_start();

session_destroy();

header("location: Page-co.php?mes");