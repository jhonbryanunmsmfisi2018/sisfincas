<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="<?php echo BASE_URL; ?>assets/images/favicon-32x32.png" type="image/png" />
	<link href="<?php echo BASE_URL; ?>assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="<?php echo BASE_URL; ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?php echo BASE_URL; ?>assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="<?php echo BASE_URL; ?>assets/css/pace.min.css" rel="stylesheet" />
	<script src="<?php echo BASE_URL; ?>assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo BASE_URL; ?>assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="<?php echo BASE_URL; ?>assets/css/app.css" rel="stylesheet">
	<link href="<?php echo BASE_URL; ?>assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  



	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/dark-theme.css" />
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/semi-dark.css" />
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/header-colors.css" />
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/DataTables/datatables.min.css" />
	<title><?php echo TITLE . ' - ' . $data['title']; ?></title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="<?php echo BASE_URL; ?>assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">UNIDAD DE FINCAS</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="javascript:;">
						<div class="parent-icon"><i class='fa-solid fa-house-user'></i>
						</div>
						<div class="menu-title">TABLERO</div>
					</a>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fa-solid fa-clipboard-list"></i>
						</div>
						<div class="menu-title">ADMINISTRACIÓNS</div> 
					</a>
					<ul>
						<li> <a href="<?php echo BASE_URL . 'usuarios';?>"><i class="bx bx-right-arrow-alt"></i>USUARIO</a>
						</li>
						<li> <a href="<?php echo BASE_URL . 'admin/datos';?>"><i class="bx bx-right-arrow-alt"></i>CONFIGURACIÓN</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fa-solid fa-clipboard-list"></i>
						</div>     
						<div class="menu-title">MANTENIMIENTO</div> 
					</a>
					<ul>
						<li> <a href="<?php echo BASE_URL . 'medidas'; ?>">   <i class="bx bx-right-arrow-alt"></i>MEDIDAS</a>
						</li>
						<li> <a href="<?php echo BASE_URL . 'categorias'; ?>"><i class="bx bx-right-arrow-alt"></i>CATEGORIAS</a>
						</li>
						<li> <a href="<?php echo BASE_URL . 'fincas'; ?>">    <i class="bx bx-right-arrow-alt"></i>FINCAS</a>
						</li>
						<li> <a href="<?php echo BASE_URL . 'consecionarios'; ?>">    <i class="bx bx-right-arrow-alt"></i>CONCESIONARIOS</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="widgets.html">
						<div class="parent-icon"><i class="fa-solid fa-users"></i>
						</div>
						<div class="menu-title">ARRENDATARIOS</div>
					</a>
				</li>
			           
				<li>
					<a href="widgets.html">
						<div class="parent-icon"><i class="fa-solid fa-users"></i>
						</div>
						<div class="menu-title">GESTION CONTABLE</div>
					</a>
				</li>
				<li>
					<a href="widgets.html">
						<div class="parent-icon"><i class="fa-solid fa-users"></i>
						</div>
						<div class="menu-title">GESTION DE PREDIOS</div>
					</a>
				</li>
				<li>
					<a href="widgets.html">
						<div class="parent-icon"><i class="fa-solid fa-users"></i>
						</div>
						<div class="menu-title">GESTION WEB</div>
					</a>
				</li>
<!-- 
				<li>
					<a href="widgets.html">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">PROVEEDORES</div>
					</a>
				</li> -->
				<li>
					<a href="widgets.html">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">CAJA</div>
					</a>
				</li>
				<!-- <li>
					<a href="widgets.html">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">COMPRAS</div>
					</a>
				</li>	
				<li>
					<a href="widgets.html">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">VENTAS</div>
					</a>
				</li>	
				<li>
					<a href="widgets.html">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">ADMINISTRAR</div>
					</a>
				</li>	
				<li>
					<a href="widgets.html">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">CREDITOS</div>
					</a>
				</li>	
				<li>
					<a href="widgets.html">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">COTIZACIONES</div>
					</a>
				</li>
				<li>
					<a href="widgets.html">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">APARTADOS</div>
					</a>
				</li>
				<li>
					<a href="widgets.html">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">INVENTARIO & KARDEX</div>
					</a>
				</li> -->
			</ul>
			<!--end navigation--> 
		</div>
		<!--end sidebar wrapper -->
		
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative">
							<h6><?php echo TITLE; ?></h6>
						</div>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
							role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="<?php echo BASE_URL; ?>assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0">Pauline Seitz</p>
								<p class="designattion mb-0">Web Designer</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="javascript:;"><i
										class="bx bx-user"></i><span>Profile</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i
										class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">