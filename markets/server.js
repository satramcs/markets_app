const WebSocket = require('ws');
const http = require('http');
const request = require('request');
var server = http.createServer(function (req, res) {   
});
var io = require('socket.io')(server);
var apiKey = "b9ad2f28fba341f8a4a4a6301eea2b7e192e9dddbe8bde75d63dabc882db2192";
const ccStreamer = new WebSocket('wss://streamer.cryptocompare.com/v2?api_key=' + apiKey);

request('http://127.0.0.1:8000/api/get_pairs', function(error, res, body){
	var get_res = JSON.parse(body);
	if(get_res.length){
		ccStreamer.on('open', function open() {
			var subRequest = {
				"action": "SubAdd",
		        "subs": get_res
		    };
		    ccStreamer.send(JSON.stringify(subRequest));
		});
	}
});


io.on('connection', function(socket){

	ccStreamer.on('message', function incoming(data) {
		io.sockets.emit('show_markets', data);
	});

});

server.listen(5000);
console.log('Node.js web server at port 5000 is running..')