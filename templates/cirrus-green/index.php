<?php

/**
 * @subpackage	Cirrus Green v1.6 HM02J
 * @copyright	Copyright (C) 2010-2013 Hurricane Media - All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted access');
$LeftMenuOn = ($this->countModules('position-4') or $this->countModules('position-5') or $this->countModules('position-7'));
$RightMenuOn = ($this->countModules('position-6') or $this->countModules('position-8'));
$TopNavOn = ($this->countModules('position-13'));
$app = JFactory::getApplication();
$sitename = $app->getCfg('sitename');
$logopath = $this->baseurl . '/templates/' . $this->template . '/images/logo-demo-green.gif';
$logo = $this->params->get('logo', $logopath);
$logoimage = $this->params->get('logoimage');
$sitetitle = $this->params->get('sitetitle');
$sitedescription = $this->params->get('sitedescription');

JHtml::_('jquery.framework');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">

<head>
	<jdoc:include type="head" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/fonts/font-awesome.min.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template.css" type="text/css" />
	<link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
	<link rel="icon" href="images/favicon/favicon.ico">
	<link rel="manifest" href="images/favicon/site.webmanifest">
	<link href='//fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' />
	<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/sfhover.js"></script>
	<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/responsive-menu.js"></script>
</head>

<body>

	<div id="wrapper">

		<!-- TopNav -->
		<?php if ($TopNavOn) : ?>
			<div id="topnav_wrap">
				<div id="topnav">
					<jdoc:include type="modules" name="position-13" style="xhtml" />
				</div>
			</div>
		<?php endif; ?>


		<div id="header_wrap">
			<div id="header">

				<!-- Logo -->
				<div id="logo">

					<?php if ($logo && $logoimage == 1) : ?>
						<a href="<?php echo $this->baseurl ?>"><img src="<?php echo htmlspecialchars($logo); ?>" alt="<?php echo $sitename; ?>" /></a>
					<?php endif; ?>
					<?php if (!$logo || $logoimage == 0) : ?>

						<?php if ($sitetitle) : ?>
							<a href="<?php echo $this->baseurl ?>"><?php echo htmlspecialchars($sitetitle); ?></a><br />
						<?php endif; ?>

						<?php if ($sitedescription) : ?>
							<div class="sitedescription"><?php echo htmlspecialchars($sitedescription); ?></div>
						<?php endif; ?>

					<?php endif; ?>

				</div>

				<div id="topmenu_wrap">
					<!-- Search -->
					<div id="search">
						<jdoc:include type="modules" name="position-0" />
					</div>

					<div id="topmenu">
						<jdoc:include type="modules" name="position-1" />
					</div>
					<div id="menu-toggle">&#9776;</div>
				</div>

			</div>
		</div>

		<nav id="menu-resp">
			<jdoc:include type="modules" name="menu-resp" style="xhtml" />
		</nav>

		<!-- Breadcrumbs -->
		<?php if ($this->countModules('position-2')) : ?>
			<div id="breadcrumbs">
				<jdoc:include type="modules" name="position-2" />
			</div>
		<?php endif; ?>

		<!-- Content/Menu Wrap -->
		<div id="content-menu_wrap_bg">
			<div id="content-menu_wrap">




				<!-- Left Menu -->
				<?php if ($LeftMenuOn) : ?>
					<div id="leftmenu">
						<jdoc:include type="modules" name="position-7" style="xhtml" />
						<jdoc:include type="modules" name="position-4" style="xhtml" />
						<jdoc:include type="modules" name="position-5" style="xhtml" />
					</div>
				<?php endif; ?>


				<!-- Contents -->
				<?php if ($LeftMenuOn and $RightMenuOn) : ?>
					<div id="content-w1">
					<?php elseif ($LeftMenuOn or $RightMenuOn) : ?>
						<div id="content-w2">
						<?php else : ?>
							<div id="content-w3">
							<?php endif; ?>

							<?php if ($this->countModules('position-12')) : ?>
								<div id="content-top">
									<jdoc:include type="modules" name="position-12" />
								</div>
							<?php endif; ?>

							<jdoc:include type="message" />
							<jdoc:include type="component" />
							</div>


							<!-- Right Menu -->
							<?php if ($RightMenuOn) : ?>
								<div id="rightmenu">
									<jdoc:include type="modules" name="position-6" style="xhtml" />
									<jdoc:include type="modules" name="position-8" style="xhtml" />
									<jdoc:include type="modules" name="position-3" style="xhtml" />
								</div>
							<?php endif; ?>


						</div>
					</div>

					<div id="bottom_wrap">
						<!-- Footer -->
						<div id="footer_wrap">
							<div id="footer">
								<jdoc:include type="modules" name="position-14" />
							</div>
						</div>


						<!-- Banner/Links -->
						<div id="box_wrap">
							<div id="box_placeholder">
								<div id="box1">
									<jdoc:include type="modules" name="position-9" style="xhtml" />
								</div>
								<div id="box2">
									<jdoc:include type="modules" name="position-10" style="xhtml" />
								</div>
								<div id="box3">
									<jdoc:include type="modules" name="position-11" style="xhtml" />
								</div>
							</div>
						</div>

						<!--<div id="push"></div>-->
						<div id="copyright">
							Copyright&copy;<?php echo date('Y'); ?> <?php echo $sitename; ?> - Todos os direitos reservados

							<a class="sd" href="http://www.sdrummond.com.br" title="Sdrummond Tecnologia" target="_blank">
								<img src="images/sd.png" alt="Sdrummond Tecnologia" title="Sdrummond Tecnologia">
							</a>
						</div>

					</div>

					<div id="whatsapp">
						<jdoc:include type="modules" name="whatsapp" style="none" />
					</div>

			</div>






			<!-- Page End -->







</body>

</html>