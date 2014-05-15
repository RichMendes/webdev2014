<style type="text/css">
#scrollable-dropdown-menu .tt-dropdown-menu {
  max-height: 150px;
  overflow-y: auto;
}
</style>





<div id="scrollable-dropdown-menu">
  <input class="typeahead" type="text" placeholder="Countries">
</div>



</br>
</br></br>
</br></br>
</br></br>
</br></br>
</br></br>
</br></br>
</br></br>
</br></br>
</br></br>
</br></br>
</br>

<div id="remote">
  <input class="typeahead" type="text" placeholder="Oscar winners for Best Picture">
</div>


<? function JavaScripts(){ ?>
	<script src="//cdnjs.cloudflare.com/ajax/libs/knockout/3.0.0/knockout-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/knockout.mapping/2.4.1/knockout.mapping.js"></script>
	<script type="text/javascript" src="../inc/typeahead.js"></script>
		<script type="text/javascript">
			$(function(){
				$(".navbar-collapse").append($("#cart-tmpl").html())
				
				
				
				
				var bestPictures = new Bloodhound({
				  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('zip'),
				  queryTokenizer: Bloodhound.tokenizers.whitespace,
				  /*prefetch: '../data/films/post_1960.json',*/
				  remote: '../Controllers/Products.php?action=query&format=query&query=%QUERY'
				});
				 
				bestPictures.initialize();
				 
				$('#remote .typeahead').typeahead(null, {
				  name: 'best-pictures',
				  displayKey: 'zip',
				  source: bestPictures.ttAdapter()
				});
				
				$('#scrollable-dropdown-menu .typeahead').typeahead(null, {
				  name: 'countries',
				  displayKey: 'zip',
				  source: bestPictures.ttAdapter()
				});
				
				
				
				
				
				var vm = {
					categoryList: ko.observableArray(),
					currentCategory: ko.observable(),
					itemList: ko.observableArray(),
					cart: ko.observableArray(),
								
					selectCategory: function(){
						vm.currentCategory(this);
						$.get("?action=index&format=json",{category_id:this.id},null,'json')
							.always(function (results) {
								vm.itemList(results.data);
							});		    	
					},
					addToCart: function(){
						vm.cart.push(this);
					},
					removeFromCart: function(){
						vm.cart.remove(this);
					},
					toggleCartList: function(){
						$("#shopping-cart-list").toggleClass("closed");
					}
				}
				vm.cartTotal = ko.computed(function(){
						var tot = 0;
						$.each(vm.cart(), function(i,x){
							tot += +x.Price;
						})
						return tot;
				});
				ko.applyBindings(vm);
				
				$.get("?action=categories&format=json",null,null,'json')
					.always(function (results) {
						vm.categoryList(results.data);
					})
			});
		</script>
	<? } ?>