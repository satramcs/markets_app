$(document).ready(function(){
    var socket = io.connect('http://localhost:5000', {transports:['websocket'], upgrade: false}, {'force new connection': true});
    socket.on('show_markets', function(res){
        $('.table td').removeClass('newRow');
        var data = JSON.parse(res);
        var sym = data.FROMSYMBOL;
        var to_sym = data.TOSYMBOL;
        if(typeof data.PRICE !== 'undefined'){
            $(`#${sym}_price`).html(`${data.PRICE} ${to_sym}`).addClass('newRow');
        }
        if(typeof data.VOLUME24HOUR !== 'undefined'){
            $(`#${sym}_volume`).html(`${data.VOLUME24HOUR} ${sym}`).addClass('newRow');
        }
    });
});