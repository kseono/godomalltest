var gd_payco_event_popup;
gd_payco_event_popup = (function () {
    "use strict";

    return {
        open_popup: function () {
            $.ajax({
                method: 'GET',
                url: '../share/payco_event_popup.php',
                context: document.body,
                success: function () {
                    if (typeof arguments[0]['resultMessage'] === 'string') {
                        console.log(arguments[0]['resultMessage']);
                    } else {
                        var $body = $('body');
                        $body.on('click', '.payco_benefit-btn_close', function () {
                            $('#layerPaycoEventPopup').remove();
                        });
                        var $layer = $('<div id="layerPaycoEventPopup">' + arguments[0] + '</div>');
                        var $popup = $layer.find('.payco_benefit-popup');
                        var top = $popup.data('top');
                        var left = $popup.data('left');
                        if (top > 0 && left > 0) {
                            $layer.find('.payco_benefit-pop').css({
                                top: top + 'px',
                                left: left + 'px'
                            });
                        }
                        $body.append($layer);
                    }
                }
            });
        }
    }
})();

$(document).ready(function () {
    "use strict";
    gd_payco_event_popup.open_popup();
});
