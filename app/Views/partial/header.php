<?php
/**
 * @var object $user_info
 * @var array $allowed_modules
 * @var CodeIgniter\HTTP\IncomingRequest $request
 * @var array $config
 */

use Config\Services;

$request = Services::request();
?>

<!doctype html>
<html lang="<?= $request->getLocale() ?>">

<head>
    <meta charset="utf-8">
    <base href="<?= base_url() ?>">
    <title><?= esc($config['company']) . ' | ' . lang('Common.powered_by') . ' OSPOS ' . esc(config('App')->application_version) ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="<?= 'resources/bootswatch/' . (empty($config['theme']) ? 'flatly' : esc($config['theme'])) . '/bootstrap.min.css' ?>">

    <?php if (ENVIRONMENT == 'development' || get_cookie('debug') == 'true' || $request->getGet('debug') == 'true') : ?>
        <!-- inject:debug:css -->
        <!-- endinject -->
        <!-- inject:debug:js -->
        <!-- endinject -->
    <?php else : ?>
        <!--inject:prod:css -->
        <!-- endinject -->

        <!-- Tweaks to the UI for a particular theme should drop here  -->
        <?php if ($config['theme'] != 'flatly' && file_exists($_SERVER['DOCUMENT_ROOT'] . '/public/css/' . esc($config['theme']) . '.css')) { ?>
            <link rel="stylesheet" href="<?= 'css/' . esc($config['theme']) . '.css' ?>">
        <?php } ?>
        <!-- inject:prod:js -->
        <!-- endinject -->
    <?php endif; ?>

    <?= view('partial/header_js') ?>
    <?= view('partial/lang_lines') ?>

    <style>
        html {
            overflow: auto;
        }
    </style>
<style>
  /* ===== Base Styles ===== */
  html, body {
    height: 100%;
    margin: 0;
  }

  body {
    background-color: #FFFFEE !important;
    color: #004859 !important;
    font-family: 'Montserrat', sans-serif !important;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
  }

  .wrapper {
    flex: 1;
    display: flex;
    flex-direction: column;
  }

  /* ===== Top Bar ===== */
  .topbar {
    background-color: #004859 !important;
    border-bottom: 1px solid #008080 !important;
  }

  /* ===== Main Navbar ===== */
  .navbar, .navbar-default, .navbar-static-top {
    background-color: #92ddc8 !important;
    border-color: #92ddc8 !important;
  }

  /* ===== Text Colors ===== */
  h1, h2, h3, h4, h5, h6, p, span, label {
    color: #004859 !important;
  }

  a {
    color: #008080 !important;
  }
  a:hover, a:focus {
    color: #006666 !important;
  }

  /* ===== Navbar Elements ===== */
  .navbar a,
  .navbar-nav > li > a,
  .navbar-brand {
    color: #004859 !important;
  }

  .navbar-default .navbar-nav > .active > a,
  .navbar-default .navbar-nav > .active > a:hover,
  .navbar-default .navbar-nav > .active > a:focus {
    background-color: #008080 !important;
    color: #FFFFEE !important;
  }

  .topbar .navbar-brand,
  .topbar .nav > li > a,
  .topbar .navbar-text,
  .topbar .navbar-right > li > a {
    color: #FFFFEE !important;
  }

  /* ===== Brand/Logo Styling ===== */
  .navbar-brand.hidden-sm {
    font-family: 'League Spartan', sans-serif !important;
    font-weight: 700 !important;
    font-size: 34px !important;
    letter-spacing: -0.94px !important;
    line-height: 1 !important;
    color: #004859 !important;
    text-transform: uppercase;
  }

  /* ===== Buttons ===== */
  .btn-primary {
    background-color: #008080 !important;
    border-color: #008080 !important;
    color: #FFFFEE !important;
  }
  .btn-primary:hover {
    background-color: #006666 !important;
    border-color: #006666 !important;
  }

  .btn-default {
    background-color: #92ddc8 !important;
    border-color: #7dceb7 !important;
    color: #004859 !important;
  }
  .btn-default:hover {
    background-color: #7dceb7 !important;
    border-color: #68bfa6 !important;
  }

  /* ===== Panels & Cards ===== */
  .panel-primary {
    background-color: #E6F2F2 !important;
    border-color: #008080 !important;
  }
  .panel-primary > .panel-heading {
    background-color: #008080 !important;
    color: #FFFFEE !important;
    border-color: #008080 !important;
  }

  /* ===== Form Elements ===== */
  .form-control:focus {
    border-color: #008080 !important;
    box-shadow: 0 0 0 0.2rem rgba(0, 128, 128, 0.25) !important;
  }

  /* ===== Tables ===== */
  .table > thead > tr > th {
    background-color: #92ddc8 !important;
    color: #004859 !important;
  }

  /* ===== Footer ===== */
  #footer {
    margin-top: auto;
    background-color: #92ddc8 !important; /* Mint green */
    color: #004859 !important;
    text-align: center;
    padding: 10px 0;
    border: none !important;
  }

  .jumbotron.push-spaces {
    background-color: transparent !important;
    margin: 0 !important;
    padding: 0 !important;
    border: none !important;
  }

  /* ===== Utility Classes ===== */
  .text-accent {
    color: #008080 !important;
  }
  .text-mint {
    color: #92ddc8 !important;
  }
  /* ===== Navbar Right Link Colors ===== */
.navbar-right > li > a {
  color: #FFFFFF !important; /* White text */
}

.navbar-right > li > a:hover,
.navbar-right > li > a:focus {
  color: #dff6ee !important; /* Light mint on hover */
}
/* Catch ALL anchor tags in topbar's navbar-right section */
.topbar .navbar-right a {
  color: #FFFFFF !important; /* White by default */
}

.topbar .navbar-right a:hover,
.topbar .navbar-right a:focus {
  color: #dff6ee !important; /* Light mint on hover */
}
.panel.panel-primary {
  background-color: #dff6ee !important; /* Lighter mint */
  border-color: #92ddc8 !important;
}

/* Match the heading */
.panel-primary > .panel-heading {
  background-color: #92ddc8 !important;
  color: #004859 !important;
  border-color: #92ddc8 !important;
}
.modal-header {
  background-color: #92ddc8 !important; /* Match mint */
  color: #004859 !important; /* Dark teal text */
  border-bottom: none !important;
}
/* Light pink sticky header background */
.table > thead > tr.sticky-row,
.table > thead.sticky > tr,
.table thead th {
  background-color: #ffe5ec !important; /* Light pink */
  color: #4c2c21 !important; /* Optional: dark text for contrast */
  position: sticky;
  top: 0;
  z-index: 2;
}
 /* Change the alert-info background to teal */
    .alert.alert-dismissible.alert-info {
        background-color: #008080;
        color: white; /* optional: better contrast */
        border-color: #006666; /* slightly darker border */
    }

    /* Style the new item button */
    #new_item_button {
        background-color: #008080;
        border-color: #006666;
        color: white;
    }

    #new_item_button:hover {
        background-color: #006666;
        border-color: #004d4d;
    }

    /* Style other teal buttons */
    .btn.btn-info.btn-sm.modal-dlg {
        background-color: #008080;
        border-color: #006666;
        color: white;
    }

    .btn.btn-info.btn-sm.modal-dlg:hover {
        background-color: #006666;
        border-color: #004d4d;
    }
        .pagination > .active > span,
    .pagination > .active > span:hover,
    .pagination > .active > span:focus,
    .pagination > .active > a,
    .pagination > .active > a:hover,
    .pagination > .active > a:focus {
        background-color: #008080 !important;
        border-color: #006666 !important;
        color: #ffffff !important;
    }

    .pagination > li > a,
    .pagination > li > span {
        color: #008080 !important;
        border: 1px solid #008080 !important;
    }

    .pagination > li > a:hover,
    .pagination > li > span:hover {
        background-color: #e0f7f7 !important;
        color: #004d4d !important;
        border-color: #006666 !important;
    }

    .pagination > .disabled > span,
    .pagination > .disabled > a {
        color: #ccc !important;
        background-color: #f5f5f5 !important;
        border-color: #ddd !important;
    }
        /* Fix overflowing cash button */
.btn.dropdown-toggle.disabled.btn-default.btn-sm {
    white-space: nowrap;      /* Prevents text wrapping */
    overflow: hidden;         /* Hides overflow */
    text-overflow: ellipsis;  /* Adds "..." if text is too long */
    max-width: 150px;         /* Adjust based on your layout */
    padding: 5px 10px;        /* Adjust padding if needed */
}
</style>
</head>

<body>
    <div class="wrapper">
        <div class="topbar">
            <div class="container">
                <div class="navbar-left">
                    <div id="liveclock"><?= date($config['dateformat'] . ' ' . $config['timeformat']) ?></div>
                </div>

                <div class="navbar-right" style="margin: 0;">
                    <?= anchor("home/changePassword/$user_info->person_id", "$user_info->first_name $user_info->last_name", ['class' => 'modal-dlg', 'data-btn-submit' => lang('Common.submit'), 'title' => lang('Employees.change_password')]) ?>
                    <span>&nbsp;|&nbsp;</span>
                    <?= anchor('home/logout', lang('Login.logout')) ?>
                </div>

                <div class="navbar-center" style="text-align: center;">
                    <strong><?= esc($config['company']) ?></strong>
                </div>
            </div>
        </div>

        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand hidden-sm" href="<?= site_url() ?>">OSPOS</a>
                </div>

                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <?php foreach ($allowed_modules as $module): ?>
                            <li class="<?= $module->module_id == $request->getUri()->getSegment(1) ? 'active' : '' ?>">
                                <a href="<?= base_url($module->module_id) ?>" title="<?= lang("Module.$module->module_id") ?>" class="menu-icon">
                                    <img src="<?= base_url("images/menubar/$module->module_id.svg") ?>" style="border: none;" alt="Module Icon"><br>
                                    <?= lang('Module.' . $module->module_id) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
