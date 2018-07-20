<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>KURVAPOS</title>
  <meta name="description" content="Responsive, Bootstrap, BS4" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="images/logo.png">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="images/a10.jpg">
  
	<!-- style -->
	
  <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css/animate.min.css') ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/glyphicons/glyphicons.css') ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome/css/font-awesome.min.css') ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/material-design-icons/material-design-icons.css') ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/ionicons/css/ionicons.min.css') ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/simple-line-icons/css/simple-line-icons.css') ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap/dist/css/bootstrap.min.css') ?>" type="text/css" />

  <!-- build:css css/styles/app.min.css -->
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/styles/app.css') ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/styles/style.css') ?>" type="text/css" />
  <!-- endbuild -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/styles/font.css') ?>" type="text/css" />
  <!-- jQuery -->
  <script src="<?php echo base_url('assets/libs/jquery/dist/jquery.js') ?> "></script>
  <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  
</head>
<body>
<div class="app" id="app">

<!-- ############ LAYOUT START-->

  <!-- aside -->
  <div id="aside" class="app-aside fade nav-dropdown black">
    <!-- fluid app aside -->
    <div class="navside dk" data-layout="column">
      <div class="navbar no-radius">
        <!-- brand -->
        <a href="index.html" class="navbar-brand">
        	<span class="hidden-folded inline">KURVAPOS</span>
        </a>
        <!-- / brand -->
      </div>
      <div data-flex class="hide-scroll">
          <nav class="scroll nav-stacked nav-stacked-rounded nav-color">
            
            <ul class="nav" data-ui-nav>
              <li class="nav-header hidden-folded">
                <span class="text-xs">Menu Utama</span>
              </li>
              <li>
                <a href="<?php echo base_url('Inventory_C/index') ?>" class="b-danger">
                  <span class="nav-icon text-white no-fade">
                    <i class="ion-filing"></i>
                  </span>
                  <span class="nav-text">Dashboard</span>
                </a>
              </li>

              <li>
                <a>
                    <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                    </span>
                    <span class="nav-icon">
                    <i class="ion-ios-grid-view"></i>
                    </span>
                    <span class="nav-text">Master Data</span>
                </a>
                <ul class="nav-sub">
                    <li>
                    <a href="<?php echo base_url('mbarang_c/index') ?>" >
                        <span class="nav-text">Barang</span>
                    </a>
                    </li>
                    <li>
                    <a href="<?php echo base_url('mgudang_c/index') ?>" >
                        <span class="nav-text">Gudang</span>
                    </a>
                    </li>
                    <li>
                    <a href="<?php echo base_url('mkategori_c/index') ?>" >
                        <span class="nav-text">Kategori</span>
                    </a>
                    </li>
                    <li>
                    <a href="<?php echo base_url('msupplier_c/index') ?>" >
                        <span class="nav-text">Supplier</span>
                    </a>
                    </li>
                    <li>
                    <a href="<?php echo base_url('mpengguna_c/index') ?>" >
                        <span class="nav-text">Pengguna</span>
                    </a>
                    </li>
                </ul>
              </li>

              <li>
                <a href="app.project.html" class="b-success">
                  <span class="nav-icon text-white no-fade">
                    <i class="ion-ios-bookmarks"></i>
                  </span>
                  <span class="nav-text">Laporan</span>
                </a>
              </li>
              
              <li>
                <a href="app.project.html" class="b-success">
                    <span class="nav-icon text-white no-fade">
                    <i class="fa fa-credit-card"></i>
                    </span>
                    <span class="nav-text">Transaksi</span>
                </a>
              </li>
            </ul>
          </nav>
      </div>
      <div data-flex-no-shrink>
        <div class="nav-fold dropup">
          <a data-toggle="dropdown">
              <div class="pull-left">
                <div class="inline"><span class="avatar w-40 grey">RI</span></div>
                <img src="<?php echo base_url('assets/images/a0.jpg') ?>" alt="..." class="w-40 img-circle hide">
              </div>
              <div class="clear hidden-folded p-x">
                <span class="block _500 text-muted">Rafi Irvan</span>
                <div class="progress-xxs m-y-sm lt progress">
                    <div class="progress-bar info" style="width: 15%;">
                    </div>
                </div>
              </div>
          </a>
          <div class="dropdown-menu w dropdown-menu-scale ">
            <a class="dropdown-item" href="profile.html">
              <span>Profile</span>
            </a>
            <a class="dropdown-item" href="setting.html">
              <span>Settings</span>
            </a>
            <a class="dropdown-item" href="app.inbox.html">
              <span>Inbox</span>
            </a>
            <a class="dropdown-item" href="app.message.html">
              <span>Message</span>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="docs.html">
              Need help?
            </a>
            <a class="dropdown-item" href="signin.html">Sign out</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- / -->
  
  <!-- CONTENT -->
  <div id="content" class="app-content box-shadow-z2 bg pjax-container" role="main">
    <!-- FOOTER -->
    <div class="app-footer white bg p-a b-t">
        <div class="pull-right text-sm text-muted">Version : 0.0.1</div>
        <span class="text-sm text-muted">&copy; Copyright Kurvasoft : 2018 - 2019.</span>
    </div>
    <!-- END OF FOOTER -->
    <div class="app-body">

        
        
        <!-- PAGE START-->
        <!-- PLACE FOR LAYOUT AND CONTENT-->
        <!-- PUT EVERY DATA IN HERE-->
        <div class="app-body">
          <div class="row-col">
              <div class="col-lg b-r">
                  <div class="padding">
                      <div class="row">
                          <!-- CONTENT DATA HERE -->
                          <?php $this->load->view($Content); ?>
                          <!-- END OF CONTENT DATA -->

                      </div>
                  </div>
              </div>
          </div>
        </div>
        <!-- END OF PAGE-->
    </div>
  </div>
  <!-- CONTENT END-->

<!-- ############ LAYOUT END-->
</div>
<!-- build:js scripts/app.min.js -->

<!-- Bootstrap -->
  <script src="<?php echo base_url('assets/libs/tether/dist/js/tether.min.js') ?> "></script>
  <script src="<?php echo base_url('assets/libs/bootstrap/dist/js/bootstrap.js') ?> "></script>
<!-- core -->
  <script src="<?php echo base_url('assets/libs/jQuery-Storage-API/jquery.storageapi.min.js') ?> "></script>
  <script src="<?php echo base_url('assets/libs/PACE/pace.min.js') ?> "></script>
  <script src="<?php echo base_url('assets/libs/jquery-pjax/jquery.pjax.js') ?> "></script>
  <script src="<?php echo base_url('assets/libs/blockUI/jquery.blockUI.js') ?> "></script>
  <script src="<?php echo base_url('assets/libs/jscroll/jquery.jscroll.min.js') ?> "></script>

  <script src="<?php echo base_url('assets/scripts/config.lazyload.js') ?> "></script>
  <script src="<?php echo base_url('assets/scripts/ui-load.js') ?> "></script>
  <script src="<?php echo base_url('assets/scripts/ui-jp.js') ?> "></script>
  <script src="<?php echo base_url('assets/scripts/ui-include.js') ?> "></script>
  <script src="<?php echo base_url('assets/scripts/ui-device.js') ?> "></script>
  <script src="<?php echo base_url('assets/scripts/ui-form.js') ?> "></script>
  <script src="<?php echo base_url('assets/scripts/ui-modal.js') ?> "></script>
  <script src="<?php echo base_url('assets/scripts/ui-nav.js') ?> "></script>
  <script src="<?php echo base_url('assets/scripts/ui-list.js') ?> "></script>
  <script src="<?php echo base_url('assets/scripts/ui-screenfull.js') ?> "></script>
  <script src="<?php echo base_url('assets/scripts/ui-scroll-to.js') ?> "></script>
  <script src="<?php echo base_url('assets/scripts/ui-toggle-class.js') ?> "></script>
  <script src="<?php echo base_url('assets/scripts/ui-taburl.js') ?> "></script>
  <script src="<?php echo base_url('assets/scripts/app.js') ?> "></script>
  <script src="<?php echo base_url('assets/scripts/ajax.js') ?> "></script>
<!-- endbuild -->
</body>
</html>
