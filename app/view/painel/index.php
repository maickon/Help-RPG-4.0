<?php
session_start();
if (isset($_SESSION['id']) and isset($_SESSION['nome']) and isset($_SESSION['login'])) {
	require 'partials/home_page.php';
	// <!-- Content -->
	require 'partials/content.php';
	// <!-- #END# Content -->
	require 'partials/footer_page.php';
} else {
	header("Location: " . URL_BASE);
}

    