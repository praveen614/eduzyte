<!-- Footer -->
<footer class="main">
	&copy; 2018 <strong><?php echo $system_name;?></strong>.
   
</footer>
<script type="text/javascript">
$(function() {
$('.number').on('keydown', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
})

$( document ).ready(function() { 
	$( ".txtOnly" ).keypress(function(e) {
	 var key = e.keyCode; if (key >= 48 && key <= 57) {
	  e.preventDefault(); 
	} 
});
 });



</script>

