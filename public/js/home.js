$(document).ready(() => {
    setInterval(function () {
        $.get('/get/request-friend', function(data, status){
            $('.friend_requests').text(data.friend_requests);
            $('.friends').text(data.friends);
        });
     }, 2000);
});
