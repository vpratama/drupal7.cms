$.ajax({
    url : "http://drupal7.cms/service/user/login",
    type : 'post',
    data : 'username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(password),
    dataType : 'json',
    error : function(data) {
            //error code
    },
    success : function(data) {
        //success code
    }
});