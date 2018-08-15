var Toast = (function() {
    var $toast = $('<div>').addClass('alert toast');

    $('body').append($toast);

    function show(status, msg) {
        $toast.addClass('show alert-' + status);
        $toast.html(msg);
        setTimeout(function() {
            $toast.removeClass('show alert-'+status);
        }, 5000);
    }

    return {
        showDanger: function(msg) {
            show('danger', msg);
        },

        showWarning: function(msg) {
            show('warning', msg);
        },

        showSuccess: function(msg) {
            show('success', msg);
        },
    }
})();
