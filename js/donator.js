var username;
$( document ).ready(function() {
   $.getJSON('http://recycle-that.jastcode.com/api/get_user', function (data) {
       username = data;
   });
});

$("#drop").click(function(){
    $.getJSON("http://recycle-that.jastcode.com/api/user_address",
    {
        "username": 'test@user.com'
    },
    function(data, status){
        alert("Data: " + data + "\nStatus: " + status);
    }).fail(function(error){
      alert("There was an error please refresh the page and try agian");
    });
});



