<php ?>

	<!--   Navbar   -->
	<div class="navbar navbar-light bg-light border-bottom-1">
		<div class="nav">
			<h3 class="navbar-brand">NotesMate</h3>
			<br />


		</div>
		<div class="">
			<ul class=" d-flex" style="cursor: pointer;">
				<a href="index.php" class="nav-link text-dark">
					Home
				</a>
				<a href="aboutUS.php" class="nav-link text-dark">
					About Us
				</a>
				<?php
				// Start session if not started yet
				if(session_status() == PHP_SESSION_NONE) {
					session_start();  // Start session if not started yet
				}

				// Check if user is logged in, display appropriate links or messages
				if (!isset($_SESSION['user'])) {
					// User is not logged in, display login and sign up links
					echo "<a href='login.php' class='nav-link text-dark'>
					Login</a>";
					echo '<a href="signup.php" class="nav-link text-dark">
					Sign Up
				</a>';
				} else {					
					// User is logged in, display logout and profile links and create post link
					echo "<a href='logout.php' class='nav-link text-dark'>
                    Logout </a>";
					echo "<a href='profile.php' class='nav-link text-dark'>
                    Profile </a>";
					echo "<a href='createPost.php' class='nav-link text-dark'>
                    Create Post</a>";
				}
				?>
			</ul>
		</div>
	</div>