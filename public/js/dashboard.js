function getUserCount(){
    $.getJSON('/api/online-count', function(response) {
        $('#online-count').text(response.count);
        setTimeout(getUserCount, 30000);    // update again in 30 seconds
    });
}

$(document).ready(function() {
    getUserCount();
});