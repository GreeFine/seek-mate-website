$(document).ready(function() {

  var animating = false,
	  loginReturn = -1,
      submitPhase1 = 1100,
      submitPhase2 = 400,
      logoutPhase1 = 800,
      $login = $(".login"),
      $app = $(".app");
  
  function ripple(elem, e) {
    $(".ripple").remove();
    var elTop = elem.offset().top,
        elLeft = elem.offset().left,
        x = e.pageX - elLeft,
        y = e.pageY - elTop;
    var $ripple = $("<div class='ripple'></div>");
    $ripple.css({top: y, left: x});
    elem.append($ripple);
  };
  
  $(document).on("click", ".login__submit", function(e) {
	 
    if (animating) return;
    animating = true;
    var that = this;
    ripple($(that), e);
    $(that).addClass("processing");
    setTimeout(function() {
		LoginProcess();
		
		if (loginReturn === 0) { loginReturn = "Username or Password not set !";} 
		else if (loginReturn === 2) { loginReturn = "Bad Username or Password !"; } 
		else if (loginReturn === 3) { loginReturn = "Broken pliz retry later"; };
		if (loginReturn !== 1) {
			var btn = document.getElementById("submitBtn");
			$(that).removeClass("processing"); $(that).addClass("Failed"); btn.firstChild.data = loginReturn;
			setTimeout(function(){ $(that).removeClass("Failed"); btn.firstChild.data = "Sign in"; animating = false; }, 3000);
			return;
		};
      $(that).addClass("success");
      setTimeout(function() {
        $app.show();
        $app.css("top");
        $app.addClass("active");
      }, submitPhase2 - 70);
      setTimeout(function() {
        $login.hide();
        $login.addClass("inactive");
        animating = false;
        $(that).removeClass("success processing");
		document.location.href="about.php";
      }, submitPhase2);
    }, submitPhase1);
	
  });
  
   /* document.location.href="about.php"; */
   
  function LoginProcess() {
  	if (document.getElementById("username").value !== "" && document.getElementById("password").value !== "") {
		$.ajax({
			type: 'POST',
			url: '/LoginProcess.php',
			data: { username: document.getElementById("username").value,
        password: document.getElementById("password").value },
			success: function(data){
				if (data == 1)
				{
					loginReturn = 1;//Ok
				}
				else if (data == 0)
				{
					loginReturn = 2;//Bad pass or username
				} else {
					loginReturn = 3; //Unexpected
				};
			},
			async:false
		});
	} else {
		loginReturn = 0;
	}
  };
  
});


 
