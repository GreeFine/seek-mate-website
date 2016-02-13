var errorAlive = true;
function IsAlive() { 
	$.get( "/Alive.php", function(data) { 
		if (data != 1)  { errorAlive = false; };
	}); 
};
IsAlive();
var IntervalId = setInterval(function(){ 
	if (errorAlive != false) { IsAlive(); }
	else { clearInterval(IntervalId); };
}, 300000);

var errorMsg = true;
function GetMsg() { 
	$.get( "/GetChatMsg.php", function(data) { 
		if (data == 2)  { errorMsg = false; } else {
			document.getElementById('ChatBox').innerHTML = data;
			scrollDown();
		};
	});
};
GetMsg();
var IntervalId2 = setInterval(function(){ 
	if (errorMsg != false) { GetMsg(); }
	else { clearInterval(IntervalId2); };
}, 30000);


function GetOnlineUsers() {
	$.get( "/OnlineUsers.php", function(data) {
  			document.getElementById('UserList').innerHTML = data;
	});
};
GetOnlineUsers();
setInterval(function(){ GetOnlineUsers(); }, 120000);

function GetLobbyList() {
	$.get( "/GetLobbies.php", function(data) {
  			document.getElementById('LobbyList').innerHTML = data;
	});
};
GetLobbyList();
setInterval(function(){ GetLobbyList(); }, 120000);


function scrollDown (argument) {
	var textarea = document.getElementById('ChatBox');
	textarea.scrollTop += textarea.scrollHeight;
};

var d = new Date();
var SendMshCD = d.getTime();
function SendMsg () {
	d = new Date();
	var msg = document.getElementById("messageBox").value;
	if (msg != "") {
		if (SendMshCD > d.getTime())
		{
			return alert("Wait 5s until post another message");
		} else {
			SendMshCD = d.getTime() + 3000;
		};

		if (msg.length > 181) { return alert("Message is 180 caractére maximum"); };
		msg = msg.replace(/'/g, "''");
		msg = encodeURI(msg);
		$.post('/SendMsgProcess.php', {
		message: msg,
			},	function(data){
				switch (data)
				{
					case '1':
						GetMsg();
						break;
					case '0':
						alert("You need to be loged");
						break;
					case '5':
						alert("Stop Spaming thanks");
						break;
					case '6':
						alert("Message to long !");
						break;
					default:
						alert("Broken retry later");
						break;
			};
		});
		document.getElementById("messageBox").value = "";
	}
}

var LobbyDate = new Date();
var SendLobbyDate = LobbyDate.getTime();
function SendLobby (lobbyAdr) {
	LobbyDate = new Date();
	if (lobbyAdr != "") {
		if (SendLobbyDate > LobbyDate.getTime())
		{
			return alert("Wait 15s until post another lobby");
		} else {
			SendLobbyDate = LobbyDate.getTime() + 15000;
		};

		if (lobbyAdr.length > 181) { return alert("Lobby addres is wrong"); };
		var RegexSteam = /^steam:\/\/joinlobby\/730\//;
		var RegexTs = /^ts3server:\/\//;
		if (RegexSteam.test(lobbyAdr) || RegexTs.test(lobbyAdr)) {
			$.post('/SendLobbyProcess.php', {
				lobbyAdr: lobbyAdr,
				restriction: '0',
					},	function(data){
						LobbyPosting = false;
						switch (data)
						{
							case '1':
								alert("Lobby Created !");
								GetLobbyList();
								break;
							case '0':
								alert("You need to be loged");
								break;
							case '5':
								alert("Stop Spaming thanks");
								break;
							case '6':
								alert("lobby addres is wrong !");
								break;
							default:
								alert("Broken retry later");
								break;
					};
			});
		}
		
	}
}

var LobbyPosting = false;
function PostLobby (steamProfile) {
	if (LobbyPosting) return;
	LobbyPosting = true;
	if (steamProfile === undefined) return alert("You need to be Logged");
	$.ajax({
	    url: steamProfile,
	    type: 'GET',
	    success: function(res) {
	        var text = res.responseText;
	        var index = text.indexOf("profile_in_game_joingame");
	        if (index == -1) return LobbyFailed();
	        var href = text.indexOf("href=", index);
	        var hrefFinal = text.indexOf('"', href+6);
	        var lobby = text.slice(href+6,hrefFinal);
	        if (lobby == "steam://") return LobbyFailed();
	        SendLobby(lobby);
	    }
	});
};

function LobbyFailed () {
	LobbyPosting = false;
	alert("Your lobby is not active \n 1 - Verify that you launched the game and selected play with friends to create the room \n 2 - If 1 not working verify your steam profile url \n 3 - Verify you are on the account steam profile is linked to \n 4 - Your steam profile is set to private");
}

function PostLobbyTs (argument) {
	var adr = prompt("Enter your TeamSpeak adress","Exemple : 127.0.0.1 or seek-mate.ovh?password=traudshop");
	if (adr == null || adr == "") return;
		adr = "ts3server:\/\/" + adr;
		SendLobby(adr);
}

jQuery.ajax = (function(_ajax){
    var protocol = location.protocol,
        hostname = location.hostname,
        exRegex = RegExp(protocol + '//' + hostname),
        YQL = 'http' + (/^https/.test(protocol)?'s':'') + '://query.yahooapis.com/v1/public/yql?callback=?',
        query = 'select * from html where url="{URL}" and xpath="*"';
    
    function isExternal(url) {
        return !exRegex.test(url) && /:\/\//.test(url);
    }
    
    return function(o) {
        
        var url = o.url;
        
        if ( /get/i.test(o.type) && !/json/i.test(o.dataType) && isExternal(url) ) {
            
            // Manipulate options so that JSONP-x request is made to YQL
            
            o.url = YQL;
            o.dataType = 'json';
            
            o.data = {
                q: query.replace(
                    '{URL}',
                    url + (o.data ?
                        (/\?/.test(url) ? '&' : '?') + jQuery.param(o.data)
                    : '')
                ),
                format: 'xml'
            };
            
            // Since it's a JSONP request
            // complete === success
            if (!o.success && o.complete) {
                o.success = o.complete;
                delete o.complete;
            }
            
            o.success = (function(_success){
                return function(data) {
                    
                    if (_success) {
                        // Fake XHR callback.
                        _success.call(this, {
                            responseText: (data.results[0] || '')
                                // YQL screws with <script>s
                                // Get rid of them
                                .replace(/<script[^>]+?\/>|<script(.|\s)*?\/script>/gi, '')
                        }, 'success');
                    }
                    
                };
            })(o.success);
            
        }
        
        return _ajax.apply(this, arguments);
        
    };
    
})(jQuery.ajax);