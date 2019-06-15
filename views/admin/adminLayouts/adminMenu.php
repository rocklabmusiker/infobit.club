<div class="container-fluid">
	<div class="row seller-menu-top">
		<div class="col-md-6">
			<ul class="nav nav-admin">
			  <li class="nav-item">
			    <a class="nav-link" href="/home">Benutzer</a>
			  </li>
		</div>
		<div class="col-md-6">
			<ul class="nav justify-content-end nav-logout">
			  <li class="nav-item">
			    <a class="nav-link" href="/logout">Logout</a>
			  </li>
			</ul>
		</div>
	</div>
</div>
<div class="container-nav-menu bg-info admin_menu">
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
		        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/admin/adminHome') echo 'active'; ?>" href="/admin/adminHome">Home</a>
		      </li>
					<div class="dropdown">
					  <button class="btn btn-info dropdown-toggle p-1 rounded-0
										<?php if(	$_SERVER['REQUEST_URI'] == '/admin/adminIhkFragenEinlegen' ||
															$_SERVER['REQUEST_URI'] == '/admin/adminIhkZwischenFragenEinlegen' ||
															$_SERVER['REQUEST_URI'] == '/admin/adminWbsZwischenFragenEinlegen' ||
															$_SERVER['REQUEST_URI'] == '/admin/adminIhkFachTest') echo 'active'; ?>"
										type="button" id="dropdownMenuButton"
										data-toggle="dropdown"
										aria-haspopup="true"
										aria-expanded="false">
					    Fragen einlegen
					  </button>
					  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					    <a class="dropdown-item" href="/admin/adminIhkFragenEinlegen">IHK-Wirtschaft</a>
					    <a class="dropdown-item" href="/admin/adminIhkZwischenFragenEinlegen">IHK-Zwischenprüfung</a>
					    <a class="dropdown-item" href="/admin/adminWbsZwischenFragenEinlegen">WBS-Zwischenprüfung</a>
							<a class="dropdown-item" href="/admin/adminIhkFachTest">IHK-Fachqualifikation</a>
					  </div>
					</div>

					<li class="nav-item px-2">
		        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/admin/adminLinks') echo 'active'; ?>"
		        href="/admin/adminLinks">Links einlegen</a>
		      </li>

					<li class="nav-item px-2">
		        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/admin/adminBenutzer') echo 'active'; ?>"
		        href="/admin/adminBenutzer">Benutzer</a>
		      </li>

		    </ul>
		  </div>

		</nav>
	</div>
</div>
