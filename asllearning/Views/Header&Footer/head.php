<head>
<meta charset="utf-8">
<title><?php
if (isset ( $title )) {
	echo $title;
} else {
	echo "asllearning.info";
}
?></title>

<link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favasl.png">
<link rel="stylesheet" href="../assets/css/table.css">
<link rel="stylesheet" href="../assets/css/bootstrap.css">
<link rel="stylesheet" href="../assets/css/styles.css">
<link rel="stylesheet" type="text/css"
	href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />

	
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script src="../assets/js/bootstrap.js"></script>
<script type="text/javascript"
	src="http://malsup.github.com/jquery.cycle.all.js"></script>


<!-- .js to Scroll To Top -->
<script type="text/javascript">
 
$(function(){
 
	$(document).on( 'scroll', function(){
 
		if ($(window).scrollTop() > 20) {
			$('.scroll-top-wrapper').addClass('show');
		} else {
			$('.scroll-top-wrapper').removeClass('show');
		}
	});
 
	$('.scroll-top-wrapper').on('click', scrollToTop);
});
 
function scrollToTop() {
	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
	element = $('body');
	offset = element.offset();
	offsetTop = offset.top;
	$('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}
</script>

<!-- .js for registration phone no.-->
<script type="text/javascript">
  function isNumber(evt) {
	    evt = (evt) ? evt : window.event;
	    var charCode = (evt.which) ? evt.which : evt.keyCode;
	    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
	        return false;
	    }
	    return true;
	}
  </script>
  
 <!-- .js for delete confirmation--> 
 <script type="text/javascript">
  function delete_id(id)
  {
   if(confirm('Please Confirm To Delete This Record ?'))
   {
    window.location.href='all_profiles.php?delete_id='+id;
   }
  }
  </script>
  
  <!-- .js for send mail by admin--> 
   <script type="text/javascript">
  function m_id(id)
   {
    window.location.href='admin_mail.php?m_id='+id;
   }
  
  </script>
  
    <!-- .js for user bookings admin--> 
   <script type="text/javascript">
  function ps_id(id)
   {
    window.location.href='user_bookings.php?ps_id='+id;
   }
  
  </script>

	<script type="text/javascript">
  function reg()
   {
    window.location.href='registration.php';
   }
  
  </script>

</head>