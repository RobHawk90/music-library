$(document).ajaxError(function (event, data) {
    var status = data.status;

    if (status === 422) {
        var errors = data.responseJSON.errors;
        var html = '';
        for(var key in errors) {
            errors[key].forEach(function(error) {
                html += '<p>'+error+'</p>';
            });
        }
        Toast.showWarning(html);
    }
    else if (status === 500)
        Toast.showDanger('An error has occurred on the server');
    else
        console.log(data);
});
