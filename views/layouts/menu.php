<div class="container-fluid">
	<div class="row seller-menu-top">
		<div class="col-xs-2 col-sm-2 col-md-4 admin">
			<ul class="nav nav-admin">
			  <li class="nav-item">
			    <a 	class="nav-link"
							href="<?php if($_SESSION['user_status'] == 'admin') {
														echo '/admin/adminHome';
													} else
														{ echo '/admin/adminIhkFragenEinlegen';
														} ?>
									">
						Admin
					</a>

			  </li>
		</div>
		<div class="col-xs-10 col-sm-10 col-md-8 logout">
			<ul class="nav justify-content-end nav-logout">
			  <li class="nav-item">
			    <a class="nav-link" href="/personalProfil">Hi, <?php echo GetName::getNameFromSession($_SESSION['user_id'])['user_name']; ?><i class="fas fa-user-graduate"></i></a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" href="/logout">Logout</a>
			  </li>
			</ul>
		</div>
	</div>
</div>
<div class="container-nav-menu">
	<div class="container">
		<nav class="navbar nav-pills navbar-expand-lg nav-menu ">
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon">
		    	<i class="fas fa-bars fa-2x"></i>
		    </span>
		  </button>



		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav p-2 mx-auto">
		      <li class="nav-item px-2">
		        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/home') echo 'active'; ?>" href="/home">Home</a>
		      </li>
		      <li class="nav-item px-2">
		         <a class="nav-link
		        <?php
		         	if(	$_SERVER['REQUEST_URI'] == '/ihkFach' ||
		         		strpos($_SERVER['REQUEST_URI'], 'ihkFachTest') === 1 ) echo 'active';
		         ?>"
		         href="/ihkFach">IHK-Fachqualifikation</a>
		      </li>

		      <li class="nav-item px-2">
		        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/ihkWirt' ||
		        strpos($_SERVER['REQUEST_URI'], 'ihkWirtTest') === 1 ) echo 'active'; ?>"
		        href="/ihkWirt">IHK-Wirtschaft</a>
		      </li>

					<li class="nav-item px-2">
		        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/ihkZwischen' ||
							strpos($_SERVER['REQUEST_URI'], 'ihkZwischenTest') === 1) echo 'active'; ?>" href="/ihkZwischen">IHK-Zwischenprüfung</a>
		      </li>

		      <li class="nav-item px-2">
		        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/wbsZwischen' ||
							strpos($_SERVER['REQUEST_URI'], 'wbsZwischenTest') === 1) echo 'active'; ?>" href="/wbsZwischen">WBS-Zwischenprüfung</a>
		      </li>

		      <li class="nav-item px-2">
		        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/statistik') echo 'active'; ?>" href="/statistik">Statistik</a>
		      </li>


		    </ul>
		  </div>

		</nav>
	</div>
</div>
