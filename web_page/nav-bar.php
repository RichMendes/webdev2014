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
       <a class="navbar-brand" href="http://localhost:8080/web_page/">Basic Website</a>
     </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">';
			if (basename($_SERVER['PHP_SELF']) == 'index.html')
				echo  '<li class="active"><a href="http://localhost:8080/web_page/">Home</a></li>';
			else
				echo  '<li><a href="http://localhost:8080/web_page/">Home</a></li>';
			if (basename($_SERVER['PHP_SELF']) == 'about.html')
				echo  '<li class="active"><a href="http://localhost:8080/web_page/about.html">
						About</a></li>';
			else
				echo  '<li><a href="http://localhost:8080/web_page/about.html">About</a></li>';
			if (basename($_SERVER['PHP_SELF']) == 'contact.html')
				echo  '<li class="active"><a href="http://localhost:8080/web_page/contact.html">
						Contact</a></li>';
			else
				echo  '<li><a href="http://localhost:8080/web_page/contact.html">Contact</a></li>';
			if (basename($_SERVER['PHP_SELF']) == 'project1.html')
				echo  '<li class="active"><a href="http://localhost:8080/web_page/project1.html">
						Project One</a></li>';
			else
				echo  '<li><a href="http://localhost:8080/web_page/project1.html">
						Project One</a></li>';
			if (basename($_SERVER['PHP_SELF']) == 'project2.html')
				echo  '<li class="active"><a href="http://localhost:8080/web_page/project2.html">
						Project Two</a></li>';
			else
				echo  '<li><a href="http://localhost:8080/web_page/project2.html">
						Project Two</a></li>';
     echo '</ul>
        </div><!--/.nav-collapse -->
   </div>
</div>';
?>
