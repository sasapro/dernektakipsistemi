<?php
$ajaxUrl = "kisi/liste/1";
?>
<script type="text/javascript">
$(function(){
		ajaxList('<?php echo $ajaxUrl; ?>');
		
		var count = 2;
          $(window).scroll(function() {
			if($(window).scrollTop() >= ($(document).height() - $(window).height())-10){
			ajaxListAppend(count,'kisi/liste');
                     count++;
                  }
          }); 	
   });
</script>

<table class="table" id="table">
<thead>
<tr>
	<th>Ad</th>
	<th>Soyad</th>
	<th></th>
	<th></th>
</tr>
</thead>
	<tbody id="ajaxList">
	
	</tbody>

</table>