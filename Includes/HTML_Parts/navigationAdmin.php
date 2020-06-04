<a href="../../login-page.php" class="navbar-brand">TimeToFit</a>
		<button class="navbar-toggler" title="Show Menu" type="button" data-toggle="collapse" data-target="#main_menu" id="toggleButton" aria-controls="main_menu" aria-expanded="false" aria-label="navigation switch">
			<span class="navbar-toggler-icon fas fa-bars"></span>
		</button>
		<div class="collapse navbar-collapse pb-3 pl-4 pb-lg-0 pl-lg-0 " id="main_menu">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item mx-lg-3"><a class="nav-link" href="#">Home</a></li>
				<li class="nav-item dropdown mx-lg-3"><a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"    id="Drop1" aria-haspopup="true" href="#">Exercise</a>
					<div class="dropdown-menu" aria-labelledby="Drop1">
						<a class="dropdown-item" href="../../exercise-form.php">Fast Training</a>
						<a class="dropdown-item" href="../Pages/yourRoutines.php">Your Routines</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Programs</a>
						<a class="dropdown-item" href="#">Users Programs</a>
					</div>
				</li>
				<li class="nav-item mx-lg-3"><a class="nav-link" href="../Pages/userPage.php">
					<?php 
						echo $_SESSION['userLogged']." Profile";
					?>
				</a></li>
				<li class="nav-item mx-lg-3"><a class="nav-link" href="../Handlers/logout.php">Logout</a></li>
				<?php
					if($_SESSION['status'] > 1)
					{
						echo '<li class="nav-item active mx-lg-3"><a class="nav-link" href="../Pages/adminPanel.php">Admin Panel</a></li>';
					}
				?>
			</ul>
			<form class="form-inline navbar-form-search">
				<i class="fas fa-search"></i>
				<input type="search" class="form-control mr-1 col-4 col-lg-6" placeholder="Search" aria-label="Search" />
				<button class="btn btn-light " type="submit">Search</button>
			</form>
		</div>