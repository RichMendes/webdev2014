if ("index-menu")
	document.getElementById("index-menu").addClass = "active";
else if ("about-menu")
	document.getElementById("about-menu").addClass = "active";
else if ("contact-menu")
	document.getElementById("contact-menu").addClass = "active";
	
/* Old way of setting active
var filename = location.pathname.substr(location.pathname.lastIndexOf("/")+1);
if (filename == "about.php") {
	document.getElementById("about_tab").className = "active";
}
else if (filename == "index.php" || filename == '') {
	document.getElementById("index_tab").className = "active";
} 
else if (filename == "contact.php") {
	document.getElementById("contact_tab").className = "active";
}
*/
