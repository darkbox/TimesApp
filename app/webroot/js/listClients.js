$(function() {
    var listClients = $('#listClients');

    $('#show').on('click', function() {

                    listClients.empty();

                    if($(this).prop('checked')==true) {
                        listClients.empty().load('listClients?var=true');
                    } else {
                        listClients.empty().load('listClients?var=false');
                    }
                    
                });
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