<?php 
echo '<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
   <div class="container">
     <div class="navbar-header">
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
       </button>
       <a class="navbar-brand" href="./index.php">Basic Website</a>
     </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">';
				echo  '<li id="index_tab"><a href="./index.php">Home</a></li>';
				echo  '<li id="about_tab"><a href="./about.php">About</a></li>';
				echo  '<li id="contact_tab"><a href="./contact.php">Contact</a></li>';

			echo '<li class="dropdown">
          		<a href="./project_home.php" class="dropdown-toggle" data-toggle="dropdown">Projects <b class="caret"></b></a>
	          		<ul class="dropdown-menu">
	          			<li><a href="./project_home.php">Project Home Page</a></li>
	          			<li class="divider"></li>
	            		<li><a href="./project1.php">Project 1</a></li>
	            		<li><a href="./project2.php">Project 2</a></li>
	          		</ul>
            </li>';		
						
			/* Old Project Tabs	
			else
				echo  '<li><a href="./project1.php">
						Project One</a></li>';
			if (basename($_SERVER['PHP_SELF']) == 'project2.php')
				echo  '<li class="active"><a href="./project2.php">
						Project Two</a></li>';
			else
				echo  '<li><a href="./project2.php">
						Project Two</a></li>';
			 */
     echo '</ul>
        </div><!--/.nav-collapse -->
   </div>
</div>';
?>
