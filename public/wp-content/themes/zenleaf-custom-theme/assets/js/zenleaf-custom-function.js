(function ($) {
    $(document).ready(function () {
        get_list_of_stores_for_states();
        bind_events();
    });
})(jQuery);



function bind_events() {
    jQuery(document).ready(function () {
        jQuery('.wpsl-dropdown>div>ul>li').each( function() {
            jQuery(this).on("click", function(event) {
                if (jQuery('#wpsl-search-input').val().length > 0) {
                    jQuery('#wpsl-search-btn').click();
                } else {
                    jQuery('.wpsl-icon-direction').click();
                }
            });
        });
        jQuery('.custom-reset-button').each( function() {
            jQuery(this).on("click",function(event) {
                jQuery('.wpsl-icon-reset').click();
            });
        });
    });
}



function get_list_of_stores_for_states() {
    jQuery.ajax({
        type: "get",
        dataType: "json",
        url: zenleaf.ajaxurl,
        data: {action: "get_list_of_zenleaf_stores", nonce: zenleaf.nonce},
    }).then(result => {
        let menu_element = jQuery('#shop_by_state');
        let order_online_element = jQuery('#mobile-menu-item-15535');
        order_online_element.empty();
        menu_element.hide();
        order_online_element.append(result.menu);
        menu_element.append(result.menu);
        for (store in result.stores) {
            order_online_element.append(result.stores[store].state_menu);
            menu_element.append(result.stores[store].state_menu);
        }
        jQuery('.sub_order_now_menu').hide();
        jQuery('.main_order_now_menu').show();
        menu_element.show();
    });
}

function dont_force_visible() {
    jQuery('.forced-visible').each(function() {
        jQuery(this).removeClass('forced-visible');
    });
}

let menu_timeout = [];

function viewStateMenu(state) {
    while (menu_timeout.length > 0) {
        let last_index = menu_timeout.length - 1;
        clearTimeout(menu_timeout[last_index]);
        menu_timeout.pop();
    }
    jQuery('#menu-item-62>.fusion-megamenu-wrapper').addClass('forced-visible');

    menu_timeout.push(setTimeout(dont_force_visible, 2000));
    jQuery('.main_order_now_menu').hide();
    jQuery('.sub_order_now_menu').hide();
    jQuery('.sub_order_now_menu.state-' + state).show();
}

function viewMainMenu() {
    jQuery('.sub_order_now_menu').hide();
    jQuery('.main_order_now_menu').show();
}

// Fix all empty alt tag for placeholder image by fusion builder
window.addEventListener('load', (event) => {
    let emptyImgFusion = document.querySelectorAll('.fusion-empty-dims-img-placeholder');
    emptyImgFusion.forEach( e => {
        e.setAttribute('alt', 'Placeholder Image');
    });
    let viewPortMeta = document.querySelectorAll('[name="viewport"]');
    viewPortMeta.forEach( e => {
        e.remove();
    });
});