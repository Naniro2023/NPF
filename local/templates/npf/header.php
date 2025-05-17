<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<?$APPLICATION->ShowHead();?>
		<title><?$APPLICATION->ShowTitle();?></title>
		<link rel="icon" type="image/x-icon" href="/local/markup/dist/favicon/favicon.ico"/>
	</head>
<body>
	<div id="panel">
		<?$APPLICATION->ShowPanel();?>
	</div>
	<?$APPLICATION->IncludeComponent("bitrix:main.include", "test", Array(
	"AREA_FILE_SHOW" => "page",	// Показывать включаемую область
		"AREA_FILE_SUFFIX" => "cookie",	// Суффикс имени файла включаемой области
		"EDIT_TEMPLATE" => "",	// Шаблон области по умолчанию
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "N"
	)
);?>
<div id="bg" class="bg hidden"></div>
<div class="wrapper">
	<header id="head" class="head head__sticky">
		<div class="container">
			<div class="row">
				<div class="col-12 header-col-12">
					<a href="/" class="nav__link desktop_logo">
						<img src="/local/markup/dist/img/logo.svg" alt="">
					</a>
					<nav class="nav">
						<a href="/" class="nav__link adaptive__logo">
							<img src="/local/markup/dist/img/logo.svg" alt="">
						</a>
						<?$APPLICATION->IncludeComponent("bitrix:menu", "main_menu", Array(
							"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
								"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
								"DELAY" => "N",	// Откладывать выполнение шаблона меню
								"MAX_LEVEL" => "3",	// Уровень вложенности меню
								"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
									0 => "",
								),
								"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
								"MENU_CACHE_TYPE" => "N",	// Тип кеширования
								"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
								"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
								"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
							),
							false
						);?>
						<ul class="nav__list nav__list-right">
							<li class="nav__item d-flex">
								<div class="nav__social-container">
									<a href="tel:88002001429" class="nav__phone-number">
										8-800-200-14-29
									</a>
									<div class="nav__social-box">
										<div class="nav__social">
											<a href="https://vk.com/npfsng" class="nav__link">
												<img src="/local/markup/dist/img/VK.svg" alt="" class="nav__social-img">
											</a>
										</div>
										<div class="nav__social">
											<a href="#" class="nav__link nav__search nav__open" data-menu-id="search">
												<svg xmlns="http://www.w3.org/2000/svg" width="26.979" height="25.344" viewbox="0 0 26.979 25.344"><g fill="none" stroke="#0069aa" stroke-width="2"><circle cx="10.5" cy="10.5" r="10.5" stroke="none"></circle><circle cx="10.5" cy="10.5" r="9.5" fill="none"></circle></g><path d="M1.466-.045A1.349,1.349,0,0,1,2.887,1.349l-.271,8.64A1.567,1.567,0,0,1,1.1,11.474,1.349,1.349,0,0,1-.317,10.08l.271-8.64A1.567,1.567,0,0,1,1.466-.045Z" transform="matrix(0.602, -0.799, 0.799, 0.602, 16.077, 18.184)" fill="#0069aa"></path></svg>
											</a>
										</div>
										<div class="nav__social">
											<a href="" class="nav__link callback-link">
												<img src="/local/markup/dist/img/headset_blue.svg" alt="" class="nav__social-img" width="26.979" height="25.344">
											</a>
										</div>
									</div>
								</div>
							</li>
						</ul>
						<ul class="nav__list nav__list__lastChild">
							<li class="nav__last__child nav__item d-flex flex-column align-items-center justify-content-center">
								<a href="https://client.npf-sng.ru/" class="sng__link-medium sng__link-medium--background mb-2 position-relative nav__lastChild-btn" target="_blank">
									Личный кабинет
								</a>
								<a href="/contacts" class="nav__link" data-menu-id="contacts">Обратиться в Фонд</a>
							</li>
						</ul>
					</nav>
					<div class="burger-menu">
						<svg xmlns="http://www.w3.org/2000/svg" width="30" height="23" class="burger-open-svg">
							<path fill="#0069AA" fill-rule="evenodd" d="M0 1.5A1.5 1.5 0 0 1 1.508 0h26.984a1.5 1.5 0 1 1 0 3H1.508A1.5 1.5 0 0 1 0 1.5zm0 10c0-.828.665-1.5 1.503-1.5h16.994c.83 0 1.503.666 1.503 1.5 0 .828-.665 1.5-1.503 1.5H1.503C.673 13 0 12.334 0 11.5zm22 0c0-.828.668-1.5 1.505-1.5h4.99a1.5 1.5 0 1 1 0 3h-4.99A1.5 1.5 0 0 1 22 11.5zm-22 10A1.5 1.5 0 0 1 1.508 20h26.984a1.5 1.5 0 1 1 0 3H1.508A1.5 1.5 0 0 1 0 21.5z"/>
						  </svg>
						  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="burger-close-svg">
							<path fill="#0069AA" fill-rule="evenodd" d="M14.373 10.84l6.724-6.723c.77-.772.773-2.043-.01-2.826l-.7-.7C19.6-.193 18.34-.194 17.56.58l-6.723 6.725L4.114.58c-.778-.776-2.04-.775-2.826.01l-.7.7c-.783.784-.782 2.055-.01 2.827l6.724 6.724-6.724 6.725c-.772.772-.773 2.043.01 2.826l.7.7c.786.787 2.048.788 2.826.01l6.723-6.723L17.56 21.1c.78.777 2.04.776 2.827-.01l.7-.7c.783-.783.78-2.054.01-2.826l-6.724-6.723z"/>
						  </svg>
					</div>
				</div>
			</div>
		</div>
	</header>
	<section id="main" class="main">
	<link href="/bitrix/css/main/font-awesome.css?156509675228777" type="text/css" rel="stylesheet" />
	<div class="bx-breadcrumb" itemprop="http://schema.org/breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="breadcrumbs__content">
							<div class="" id="bx_breadcrumb_0" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
								<a class="breadcrumbs__link" href="/allinfo/" title="Раскрытие информации" itemprop="url">Раскрытие информации</a>
								<meta itemprop="position" content="1" />
							</div>
							<div class="" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
								<i class="fa fa-angle-right"></i>
								<span class="breadcrumbs__text" itemprop="name">Устав</span>
								<meta itemprop="position" content="2" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="sng__section">
		<div class="container sng__container">
			<div class="sng__content">
				<div class="row">
					<div class="col-12">
						<div class="sng__box">
							<div class="sng__header">
								<h1 class="sng__title">
									Устав							</h1>
							</div>
	