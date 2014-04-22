$(function() {
    var listClients = $('#listClients');

    $('#showInactiveUsers').on('click', function() {
                    
                    if($(this).prop('checked')==true) {
                        window.location.href=getBaseURL() + 'clients/index?var=true';
                    } else {
                        window.location.href=getBaseURL() + 'clients/index?var=false';
                    }
                    
                });

/*    function getContactList(value) {
        $.ajax({
                url: getBaseURL() + 'clients/index?var=' + value,
                cache: false,
                beforeSend: function(){
                    $('#loading-image').show();
                },
                success: function(html){
                   
                   setTimeout(function() {
                        $('body').empty();
                        $('body').append(html);
                        $('#loading-image').hide();
                    }, 1000);
                }
            });
    }
*/
});

function getBaseURL() {
    var url = location.href;
    var baseURL = url.substring(0, url.indexOf('/', 14));

    if (baseURL.indexOf('http://localhost') != -1) {
        var url = location.href;
        var pathname = location.pathname;
        var index1 = url.indexOf(pathname);
        var index2 = url.indexOf("/", index1 + 1);
        var baseLocalUrl = url.substr(0, index2);

        return baseLocalUrl + "/";
    }
    else {
        // Root Url for domain name
        return baseURL + "/";
    }
}