<!DOCTYPE html>
<html>

<?php require 'header.php'; ?>

<body class="theme-red">
    <!-- Page Loader -->
    <?php require 'page_loader.php'; ?>
    <!-- #END# Page Loader -->
    
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    
    <!-- Search Bar -->
    <?php require 'search_bar.php'; ?>
    <!-- #END# Search Bar -->

    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">Social Help RPG</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <?php require 'call_search.php'; ?>
                    <!-- #END# Call Search -->

                    <!-- Notifications -->
                    <?php require 'notifications.php'; ?>
                    <!-- #END# Notifications -->
                    
                    <!-- Tasks -->
                    <?php require 'tasks.php'; ?>
                    <!-- #END# Tasks -->

                    <li class="pull-right">
                        <a href="javascript:void(0);" class="js-right-sidebar" data-close="true">
                            <i class="material-icons">more_vert</i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <?php require 'user_info.php'; ?>
            <!-- #User Info -->
            
            <!-- Menu -->
            <?php require 'menu.php'; ?>
            <!-- #Menu -->
            
            <!-- Footer -->
            <?php require 'footer.php'; ?>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        
        <!-- Right Sidebar -->
        <?php require 'right_sidebar.php'; ?>
        <!-- #END# Right Sidebar -->

    </section>