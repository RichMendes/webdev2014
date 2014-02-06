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
		  
		    //Examples of php arrayList - OLD
		  	/*$exLinks = array('./contact.php', './index.php' , './about.php');
			$links = array(
					array('class' => 'index-menu', 'link' => 'index.php', 'title' => 'Home'),
					array('class' => 'about-menu', 'link' => 'about.php', 'title' => 'About Us'),
					array('class' => 'contact-menu', 'link' => 'contact.php', 'title' => 'Contact Us')
					);
					*/
					
			// NEW
			$links = array();
			$links['Home'] = array('class' => 'index-menu', 'link' => 'index.php', 'name' => 'home');
			$links['About Us'] = array('class' => 'about-menu', 'link' => 'about.php', 'name' => 'about');
			$links['Contact Us'] = array('class' => 'contact-menu', 'link' => 'contact.php', 'name' => 'contact');
			
			//
					
			/*	Different output of navbar using array	*/
			foreach ($links as $key => $value) { ?>
				<?
					$class = "$value[name]-menu";
					$links = "$value[name].php";
				?>
				<li class="<?=$value['class']?>" ><a href="<?=$value['link']?>"><?=$key?></a></li>
			<?}
			
			/*
		  	$filename = basename($_SERVER['PHP_SELF']);
			if ($filename == 'index.php')
				echo  '<li class="active"><a href="./index.php">Home</a></li>';
			else
				echo  '<li><a href="./index.php">Home</a></li>';
			if ($filename == 'about.php')
				echo  '<li class="active"><a href="./about.php">
						About</a></li>';
			else
				echo  '<li><a href="./about.php">About</a></li>';
			if ($filename == 'contact.php')
				echo  '<li class="active"><a href="./contact.php">
						Contact</a></li>';
			else
				echo  '<li><a href="./contact.php">Contact</a></li>';
			*/
			echo '<li class="dropdown clothes-menu">
          			<a href="./clothes.php" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
	          		<ul class="dropdown-menu">
	          			<li><a href="./clothes.php">Clothes</a></li>
	          			<li class="divider"></li>
	            		<li><a href="./shoes.php">Shoes</a></li>
	            		<li><a href="./acc.php">Accesories</a></li>
	          		</ul>
            	  </li>';
			echo '<li class="checkout-menu"><a href="./checkout.php">Checkout</a></li>';					
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
