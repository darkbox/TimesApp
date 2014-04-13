$(function() {
    var listClients = $('#listClients');

    $('#show').on('click', function() {
                    
                    if($(this).prop('checked')==true) {
                       getContactList('true');
                    } else {
                        getContactList('false');
                    }
                    
                });

    function getContactList(value) {
        $.ajax({
                url: getBaseURL() + 'clients/listClients?var=' + value,
                cache: false,
                beforeSend: function(){
                    $('#loading-image').show();
                },
                success: function(html){
                   
                   setTimeout(function() {
                        listClients.empty();
                        $('#listClients').append(html);
                        $('#loading-image').hide();
                    }, 1000);
                }
            });
    }

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