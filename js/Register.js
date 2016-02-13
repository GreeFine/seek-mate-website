
//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	if (CheckEror(this.id)) return false;
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

function CheckEntry(id)
{
	switch (id) {
		case "email":
			var input = document.getElementById(id);
			var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			if (re.test(input.value)) {
				$(input).removeClass("Error");
			} else {
				$(input).addClass("Error");
			}
			break;
		case "username":
			var input = document.getElementById(id);
			if (input.value.length > 3 && input.value.length < 25) {
				$(input).removeClass("Error");
			} else {
				$(input).addClass("Error");
			}
			break;
		case "password":
			var input = document.getElementById(id);
			if (input.value.length > 4 && input.value.length < 25) {
				$(input).removeClass("Error");
			} else {
				$(input).addClass("Error");
			}
			break;
		case "cpassword":
			var input = document.getElementById(id);
			if (input.value == document.getElementById("password").value) {
				$(input).removeClass("Error");
			} else {
				$(input).addClass("Error");
			}
			break;
			
		/*Page 2*/
		case "steam":
			var input = document.getElementById(id);
			var re = /^http:\/\/steamcommunity.com\/(id\/|profiles\/[0-9]{17})/;
			if (re.test(input.value)) {
				$(input).removeClass("Error");
			} else {
				$(input).addClass("Error");
			}
			break;
		default:
			alert(1);
	}
}

function CheckEror(nextId) {
	var result = false;
	if (nextId == "next1")
	{
		var input = document.getElementById("email");
		var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if (re.test(input.value)) {
			$(input).removeClass("Error");
		} else {
			$(input).addClass("Error");
			result = true;
		}
		
		var input = document.getElementById("username");
		if (input.value.length > 3 && input.value.length < 25) {
			$(input).removeClass("Error");
		} else {
			$(input).addClass("Error");
			result = true;
		}
		
		var input = document.getElementById("password");
		if (input.value.length > 4 && input.value.length < 25) {
			$(input).removeClass("Error");
		} else {
			$(input).addClass("Error");
			result = true;
		}
		
		var input = document.getElementById("cpassword");
		if (input.value == document.getElementById("password").value) {
			$(input).removeClass("Error");
		} else {
			$(input).addClass("Error");
			result = true;
		}
		
	} else if (nextId == "next2") {
		var input = document.getElementById("steam");
		var re = /^http:\/\/steamcommunity.com\/(id\/|profiles\/[0-9]{17})/;
		if (re.test(input.value)) {
			$(input).removeClass("Error");
		} else {
			$(input).addClass("Error");
			result = true;
		}
	}
	
	if (result == true)
	{
		var input = document.getElementById(nextId);
		$(input).addClass("NextError");
		input.value = "Error !";
		setTimeout(function() {
			animating = false;
			$(input).removeClass("NextError");
			input.value = "Next";
		}, 3000);
	}
	return result;
}

$(".send").click(function(){
	$.post('/RegisterProcess.php', { 
	username: document.getElementById("username").value,
	email: document.getElementById("email").value,
	password: document.getElementById("password").value,
	steam: document.getElementById("steam").value,
	rank: document.getElementById("rank").value,
	team: document.getElementById("team").value, 
	fname: document.getElementById("fname").value,
	lname: document.getElementById("lname").value,
	commentary: document.getElementById("commentary").value
	},	function(data){
			switch (data)
			{
				case '1':
					SendAnimation("Successfully registered","green");
					break;
				case '2':
					SendAnimation("Error Retry later","red");
					break;
				case '3':
					SendAnimation("Error in inputs retry","red");
					break;
				case '4':
					SendAnimation("Email already used !","orange");
					setTimeout(function() {
						ReloadForm();
					}, 4000);
					break;
				case '5':
					SendAnimation("Username already used !","orange");
					setTimeout(function() {
						ReloadForm();
					}, 4000);
					break;
				default:
					SendAnimation("Unexpected","red");
					break;
			};
		});
});

function SendAnimation(TDisplay,colorC) {
	document.getElementById("msform").style.display="none";
	var DisplayB = document.getElementById("DisplayBox");
	DisplayB.style.display="block";
	DisplayB.innerHTML = TDisplay;
	DisplayB.style.backgroundColor=colorC;
};

function ReloadForm() {
	document.getElementById("DisplayBox").style.display="none";
	document.getElementById("msform").style.display="block";
}