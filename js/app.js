$( document ).ready(function() {
    $("#sashimi-btn").click(function() {
  		$(".sashimi").show();
  		$(".white-fish").hide();
  		$(this).addClass("active");
  		$("#white-fish-btn").removeClass("active");
	});
	$("#white-fish-btn").click(function() {
  		$(".sashimi").hide();
  		$(".white-fish").show();
  		$(this).addClass("active");
  		$("#sashimi-btn").removeClass("active");
	});
	  if(window.location.hash) {
	      var hash = window.location.hash.substring(1);
	      if(hash=="sashimi"){
	      	$(".sashimi").show();
  			$(".white-fish").hide();
  			$("#sashimi-btn").addClass("active");
  			$("#white-fish-btn").removeClass("active");
	      }
	      else{
	      	 if(hash=="white-fish"){
		      	$(".sashimi").hide();
		  		$(".white-fish").show();
		  		$("#white-fish-btn").addClass("active");
		  		$("#sashimi-btn").removeClass("active");
			 }
	      }
	      // hash found
	  } else {
	      // No hash found
	  }
});