var ConfirmDialog = (function () {
    $dialog = $(`
        <div class="modal fade" id="modal-song" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success btn-confirm">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
    `);

    var $body = $dialog.find('.modal-body');
    $dialog.on('click', '.btn-confirm', function() {
        _onConfirm();
    });

    $('body').append($dialog);

    var _onConfirm = function() {};

    return {
        onConfirm: function(callback) {
            _onConfirm = callback;
            return this;
        },
        setBody: function(msg) {
            $body.html(msg);
            return this;
        },
        show: function() {
            $dialog.modal('show');
            return this;
        },
        hide: function() {
            $dialog.modal('hide');
            return this;
        }
    };
})();
