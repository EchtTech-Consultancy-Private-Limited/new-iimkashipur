// mark current aside menu item as active based on current url
function markActiveAsideMenu(url) {
    $( "li.menu-item" ).each(function( index ) {
        $(this).removeClass('menu-item-active');
    });

    $('#kt_aside a[href = "' + url + '"]').parent('li.menu-item').addClass('menu-item-active');
    $('#kt_aside a[href = "' + url + '"]').parent('li.menu-item').parent('ul').parent('div').parent('li.menu-item-submenu').addClass('menu-item-open');
}

// mark notifications as read
function markNotificationsAsRead() {
    var url = $('#notification_url').val();

    axios.post(url, {
    })
    .then(function (response) {
    })
    .catch(function (error) {
        
    });
}

/** BEGIN: For Bootstrap Select */
// Class definition
var KTBootstrapSelect = function () {

    // Private functions
    var demos = function () {
        // minimum setup
        $('.kt-selectpicker').selectpicker();
    }

    return {
        // public functions
        init: function () {
            demos();
        }
    };
}();

jQuery(document).ready(function () {
    KTBootstrapSelect.init();
});

/** END: For Bootstrap Select */

