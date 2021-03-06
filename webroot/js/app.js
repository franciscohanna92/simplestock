/*!
 *
 * Angle - Bootstrap Admin App + jQuery
 *
 * Version: 3.8.5
 * Author: @themicon_co
 * Website: http://themicon.co
 * License: https://wrapbootstrap.com/help/licenses
 *
 */


(function (window, document, $, undefined) {

    if (typeof $ === 'undefined') {
        throw new Error('This application\'s JavaScript requires jQuery');
    }

    $.localStorage = Storages.localStorage;

    $(function () {

        // Restore body classes
        // -----------------------------------
        var $body = $('body');
        new StateToggler().restoreState($body);

        // enable settings toggle after restore
        $('#chk-fixed').prop('checked', $body.hasClass('layout-fixed'));
        $('#chk-collapsed').prop('checked', $body.hasClass('aside-collapsed'));
        $('#chk-collapsed-text').prop('checked', $body.hasClass('aside-collapsed-text'));
        $('#chk-boxed').prop('checked', $body.hasClass('layout-boxed'));
        $('#chk-float').prop('checked', $body.hasClass('aside-float'));
        $('#chk-hover').prop('checked', $body.hasClass('aside-hover'));

        // When ready display the offsidebar
        $('.offsidebar.d-none').removeClass('d-none');

        // Disable warning "Synchronous XMLHttpRequest on the main thread is deprecated.."
        $.ajaxPrefilter(function (options, originalOptions, jqXHR) {
            options.async = true;
        });

    }); // doc ready

})(window, document, window.jQuery);
// Start Bootstrap JS
// -----------------------------------

(function (window, document, $, undefined) {

    $(function () {

        // POPOVER
        // -----------------------------------

        $('[data-toggle="popover"]').popover();

        // TOOLTIP
        // -----------------------------------

        $('[data-toggle="tooltip"]').tooltip({
            container: 'body'
        });

        // DROPDOWN INPUTS
        // -----------------------------------
        $('.dropdown input').on('click focus', function (event) {
            event.stopPropagation();
        });

    });

})(window, document, window.jQuery);
// Module: card-tools
// -----------------------------------

/**
 * Dismiss cards
 * [data-tool="card-dismiss"]
 *
 * Requires animo.js
 */
(function ($, window, document) {
    'use strict';

    var cardSelector = '[data-tool="card-dismiss"]',
        removeEvent = 'card.remove',
        removedEvent = 'card.removed';

    $(document).on('click', cardSelector, function () {

        // find the first parent card
        var parent = $(this).closest('.card');
        var deferred = new $.Deferred();

        // Trigger the event and finally remove the element
        parent.trigger(removeEvent, [parent, deferred]);
        // needs resolve() to be called
        deferred.done(removeElement);

        function removeElement() {
            parent.animo({animation: 'bounceOut'}, destroyCard);
        }

        function destroyCard() {
            var col = parent.parent();

            $.when(parent.trigger(removedEvent, [parent]))
                .done(function () {
                    parent.remove();
                    // remove the parent if it is a row and is empty and not a sortable (portlet)
                    col
                        .trigger(removedEvent) // An event to catch when the card has been removed from DOM
                        .filter(function () {
                            var el = $(this);
                            return (el.is('[class*="col-"]:not(.sortable)') && el.children('*').length === 0);
                        }).remove();
                });
        }
    });

}(jQuery, window, document));


/**
 * Collapse cards
 * [data-tool="card-collapse"]
 *
 * Also uses browser storage to keep track
 * of cards collapsed state
 */
(function ($, window, document) {
    'use strict';
    var cardSelector = '[data-tool="card-collapse"]',
        storageKeyName = 'jq-cardState';

    // Prepare the card to be collapsable and its events
    $(cardSelector).each(function () {
        // find the first parent card
        var $this = $(this),
            parent = $this.closest('.card'),
            wrapper = parent.find('.card-wrapper'),
            collapseOpts = {toggle: false},
            iconElement = $this.children('em'),
            cardId = parent.attr('id');

        // if wrapper not added, add it
        // we need a wrapper to avoid jumping due to the paddings
        if (!wrapper.length) {
            wrapper =
                parent.children('.card-heading').nextAll() //find('.card-body, .card-footer')
                    .wrapAll('<div/>')
                    .parent()
                    .addClass('card-wrapper');
            collapseOpts = {};
        }

        // Init collapse and bind events to switch icons
        wrapper
            .collapse(collapseOpts)
            .on('hide.bs.collapse', function () {
                setIconHide(iconElement);
                saveCardState(cardId, 'hide');
                wrapper.prev('.card-heading').addClass('card-heading-collapsed');
            })
            .on('show.bs.collapse', function () {
                setIconShow(iconElement);
                saveCardState(cardId, 'show');
                wrapper.prev('.card-heading').removeClass('card-heading-collapsed');
            });

        // Load the saved state if exists
        var currentState = loadCardState(cardId);
        if (currentState) {
            setTimeout(function () {
                wrapper.collapse(currentState);
            }, 50);
            saveCardState(cardId, currentState);
        }

    });

    // finally catch clicks to toggle card collapse
    $(document).on('click', cardSelector, function () {

        var parent = $(this).closest('.card');
        var wrapper = parent.find('.card-wrapper');

        wrapper.collapse('toggle');

    });

    /////////////////////////////////////////////
    // Common use functions for card collapse //
    /////////////////////////////////////////////
    function setIconShow(iconEl) {
        iconEl.removeClass('fa-plus').addClass('fa-minus');
    }

    function setIconHide(iconEl) {
        iconEl.removeClass('fa-minus').addClass('fa-plus');
    }

    function saveCardState(id, state) {
        var data = $.localStorage.get(storageKeyName);
        if (!data) {
            data = {};
        }
        data[id] = state;
        $.localStorage.set(storageKeyName, data);
    }

    function loadCardState(id) {
        var data = $.localStorage.get(storageKeyName);
        if (data) {
            return data[id] || false;
        }
    }


}(jQuery, window, document));


/**
 * Refresh cards
 * [data-tool="card-refresh"]
 * [data-spinner="standard"]
 */
(function ($, window, document) {
    'use strict';
    var cardSelector = '[data-tool="card-refresh"]',
        refreshEvent = 'card.refresh',
        whirlClass = 'whirl',
        defaultSpinner = 'standard';

    // method to clear the spinner when done
    function removeSpinner() {
        this.removeClass(whirlClass);
    }

    // catch clicks to toggle card refresh
    $(document).on('click', cardSelector, function () {
        var $this = $(this),
            card = $this.parents('.card').eq(0),
            spinner = $this.data('spinner') || defaultSpinner;

        // start showing the spinner
        card.addClass(whirlClass + ' ' + spinner);

        // attach as public method
        card.removeSpinner = removeSpinner;

        // Trigger the event and send the card object
        $this.trigger(refreshEvent, [card]);

    });

}(jQuery, window, document));
/**=========================================================
 * Module: clear-storage.js
 * Removes a key from the browser storage via element click
 =========================================================*/

(function ($, window, document) {
    'use strict';

    var Selector = '[data-reset-key]';

    $(document).on('click', Selector, function (e) {
        e.preventDefault();
        var key = $(this).data('resetKey');

        if (key) {
            $.localStorage.remove(key);
            // reload the page
            window.location.reload();
        } else {
            $.error('No storage key specified for reset.');
        }
    });

}(jQuery, window, document));

// GLOBAL CONSTANTS
// -----------------------------------
(function (window, document, $, undefined) {
    window.APP_COLORS = {
        'primary': '#5d9cec',
        'success': '#27c24c',
        'info': '#23b7e5',
        'warning': '#ff902b',
        'danger': '#f05050',
        'inverse': '#131e26',
        'green': '#37bc9b',
        'pink': '#f532e5',
        'purple': '#7266ba',
        'dark': '#3a3f51',
        'yellow': '#fad732',
        'gray-darker': '#232735',
        'gray-dark': '#3a3f51',
        'gray': '#dde6e9',
        'gray-light': '#e4eaec',
        'gray-lighter': '#edf1f2'
    };

    window.APP_MEDIAQUERY = {
        'desktopLG': 1200,
        'desktop': 992,
        'tablet': 768,
        'mobile': 480
    };
})(window, document, window.jQuery);

// FULLSCREEN
// -----------------------------------
(function (window, document, $, undefined) {

    if (typeof screenfull === 'undefined') return;

    $(function () {

        var $doc = $(document);
        var $fsToggler = $('[data-toggle-fullscreen]');

        // Not supported under IE
        var ua = window.navigator.userAgent;
        if (ua.indexOf("MSIE ") > 0 || !!ua.match(/Trident.*rv\:11\./)) {
            $fsToggler.addClass('hide');
        }

        if (!$fsToggler.is(':visible')) // hidden on mobiles or IE
            return;

        $fsToggler.on('click', function (e) {
            e.preventDefault();

            if (screenfull.enabled) {

                screenfull.toggle();

                // Switch icon indicator
                toggleFSIcon($fsToggler);

            } else {
                console.log('Fullscreen not enabled');
            }
        });

        if (screenfull.raw && screenfull.raw.fullscreenchange)
            $doc.on(screenfull.raw.fullscreenchange, function () {
                toggleFSIcon($fsToggler);
            });

        function toggleFSIcon($element) {
            if (screenfull.isFullscreen)
                $element.children('em').removeClass('fa-expand').addClass('fa-compress');
            else
                $element.children('em').removeClass('fa-compress').addClass('fa-expand');
        }
    });
})(window, document, window.jQuery);

// NAVBAR SEARCH
// -----------------------------------
(function (window, document, $, undefined) {

    $(function () {

        var navSearch = new navbarSearchInput();

        // Open search input
        var $searchOpen = $('[data-search-open]');

        $searchOpen
            .on('click', function (e) {
                e.stopPropagation();
            })
            .on('click', navSearch.toggle);

        // Close search input
        var $searchDismiss = $('[data-search-dismiss]');
        var inputSelector = '.navbar-form input[type="text"]';

        $(inputSelector)
            .on('click', function (e) {
                e.stopPropagation();
            })
            .on('keyup', function (e) {
                if (e.keyCode == 27) // ESC
                    navSearch.dismiss();
            });

        // click anywhere closes the search
        $(document).on('click', navSearch.dismiss);
        // dismissable options
        $searchDismiss
            .on('click', function (e) {
                e.stopPropagation();
            })
            .on('click', navSearch.dismiss);

    });

    var navbarSearchInput = function () {
        var navbarFormSelector = 'form.navbar-form';
        return {
            toggle: function () {

                var navbarForm = $(navbarFormSelector);

                navbarForm.toggleClass('open');

                var isOpen = navbarForm.hasClass('open');

                navbarForm.find('input')[isOpen ? 'focus' : 'blur']();

            },

            dismiss: function () {
                $(navbarFormSelector)
                    .removeClass('open') // Close control
                    .find('input[type="text"]').blur() // remove focus
                // .val('')                    // Empty input
                ;
            }
        };

    }

})(window, document, window.jQuery);

// NOW TIMER
// -----------------------------------
(function (window, document, $, undefined) {

    $(function () {

        $('[data-now]').each(function () {
            var element = $(this),
                format = element.data('format');

            function updateTime() {
                var dt = moment(new Date()).format(format);
                element.text(dt);
            }

            updateTime();
            setInterval(updateTime, 1000);

        });
    });
})(window, document, window.jQuery);

// SIDEBAR
// -----------------------------------
(function (window, document, $, undefined) {

    var $win;
    var $html;
    var $body;
    var $sidebar;
    var mq;

    $(function () {

        $win = $(window);
        $html = $('html');
        $body = $('body');
        $sidebar = $('.sidebar');
        mq = APP_MEDIAQUERY;

        // AUTOCOLLAPSE ITEMS
        // -----------------------------------

        var sidebarCollapse = $sidebar.find('.collapse');
        sidebarCollapse.on('show.bs.collapse', function (event) {

            event.stopPropagation();
            if ($(this).parents('.collapse').length === 0)
                sidebarCollapse.filter('.show').collapse('hide');

        });

        // SIDEBAR ACTIVE STATE
        // -----------------------------------

        // Find current active item
        var currentItem = $('.sidebar .active').parents('li');

        // hover mode don't try to expand active collapse
        if (!useAsideHover())
            currentItem
                .addClass('active') // activate the parent
                .children('.collapse') // find the collapse
                .collapse('show'); // and show it

        // remove this if you use only collapsible sidebar items
        $sidebar.find('li > a + ul').on('show.bs.collapse', function (e) {
            if (useAsideHover()) e.preventDefault();
        });

        // SIDEBAR COLLAPSED ITEM HANDLER
        // -----------------------------------


        var eventName = isTouch() ? 'click' : 'mouseenter';
        var subNav = $();
        $sidebar.on(eventName, '.sidebar-nav > li', function () {

            if (isSidebarCollapsed() || useAsideHover()) {

                subNav.trigger('mouseleave');
                subNav = toggleMenuItem($(this));

                // Used to detect click and touch events outside the sidebar
                sidebarAddBackdrop();
            }

        });

        var sidebarAnyclickClose = $sidebar.data('sidebarAnyclickClose');

        // Allows to close
        if (typeof sidebarAnyclickClose !== 'undefined') {

            $('.wrapper').on('click.sidebar', function (e) {
                // don't check if sidebar not visible
                if (!$body.hasClass('aside-toggled')) return;

                var $target = $(e.target);
                if (!$target.parents('.aside').length && // if not child of sidebar
                    !$target.is('#user-block-toggle') && // user block toggle anchor
                    !$target.parent().is('#user-block-toggle') // user block toggle icon
                ) {
                    $body.removeClass('aside-toggled');
                }

            });
        }

    });

    function sidebarAddBackdrop() {
        var $backdrop = $('<div/>', {'class': 'dropdown-backdrop'});
        $backdrop.insertAfter('.aside').on("click mouseenter", function () {
            removeFloatingNav();
        });
    }

    // Open the collapse sidebar submenu items when on touch devices
    // - desktop only opens on hover
    function toggleTouchItem($element) {
        $element
            .siblings('li')
            .removeClass('open')
            .end()
            .toggleClass('open');
    }

    // Handles hover to open items under collapsed menu
    // -----------------------------------
    function toggleMenuItem($listItem) {

        removeFloatingNav();

        var ul = $listItem.children('ul');

        if (!ul.length) return $();
        if ($listItem.hasClass('open')) {
            toggleTouchItem($listItem);
            return $();
        }

        var $aside = $('.aside');
        var $asideInner = $('.aside-inner'); // for top offset calculation
        // float aside uses extra padding on aside
        var mar = parseInt($asideInner.css('padding-top'), 0) + parseInt($aside.css('padding-top'), 0);

        var subNav = ul.clone().appendTo($aside);

        toggleTouchItem($listItem);

        var itemTop = ($listItem.position().top + mar) - $sidebar.scrollTop();
        var vwHeight = $win.height();

        subNav
            .addClass('nav-floating')
            .css({
                position: isFixed() ? 'fixed' : 'absolute',
                top: itemTop,
                bottom: (subNav.outerHeight(true) + itemTop > vwHeight) ? 0 : 'auto'
            });

        subNav.on('mouseleave', function () {
            toggleTouchItem($listItem);
            subNav.remove();
        });

        return subNav;
    }

    function removeFloatingNav() {
        $('.sidebar-subnav.nav-floating').remove();
        $('.dropdown-backdrop').remove();
        $('.sidebar li.open').removeClass('open');
    }

    function isTouch() {
        return $html.hasClass('touch');
    }

    function isSidebarCollapsed() {
        return $body.hasClass('aside-collapsed') || $body.hasClass('aside-collapsed-text');
    }

    function isSidebarToggled() {
        return $body.hasClass('aside-toggled');
    }

    function isMobile() {
        return $win.width() < mq.tablet;
    }

    function isFixed() {
        return $body.hasClass('layout-fixed');
    }

    function useAsideHover() {
        return $body.hasClass('aside-hover');
    }

})(window, document, window.jQuery);

// SLIMSCROLL
// -----------------------------------
(function (window, document, $, undefined) {

    $(function () {

        $('[data-scrollable]').each(function () {

            var element = $(this),
                defaultHeight = 250;

            element.slimScroll({
                height: (element.data('height') || defaultHeight)
            });

        });
    });

})(window, document, window.jQuery);

// Custom jQuery
// -----------------------------------
(function (window, document, $, undefined) {

    $(function () {

        $('[data-check-all]').on('change', function () {
            var $this = $(this),
                index = $this.index() + 1,
                checkbox = $this.find('input[type="checkbox"]'),
                table = $this.parents('table');
            // Make sure to affect only the correct checkbox column
            table.find('tbody > tr > td:nth-child(' + index + ') input[type="checkbox"]')
                .prop('checked', checkbox[0].checked);

        });

    });

})(window, document, window.jQuery);

// TOGGLE STATE
// -----------------------------------
(function (window, document, $, undefined) {

    $(function () {

        var $body = $('body');
        toggle = new StateToggler();

        $('[data-toggle-state]')
            .on('click', function (e) {
                // e.preventDefault();
                e.stopPropagation();
                var element = $(this),
                    classname = element.data('toggleState'),
                    target = element.data('target'),
                    noPersist = (element.attr('data-no-persist') !== undefined);

                // Specify a target selector to toggle classname
                // use body by default
                var $target = target ? $(target) : $body;

                if (classname) {
                    if ($target.hasClass(classname)) {
                        $target.removeClass(classname);
                        if (!noPersist)
                            toggle.removeState(classname);
                    } else {
                        $target.addClass(classname);
                        if (!noPersist)
                            toggle.addState(classname);
                    }

                }

                // some elements may need this when toggled class change the content size
                $(window).resize();

            });

    });

    // Handle states to/from localstorage
    window.StateToggler = function () {

        var storageKeyName = 'jq-toggleState';

        // Helper object to check for words in a phrase //
        var WordChecker = {
            hasWord: function (phrase, word) {
                return new RegExp('(^|\\s)' + word + '(\\s|$)').test(phrase);
            },
            addWord: function (phrase, word) {
                if (!this.hasWord(phrase, word)) {
                    return (phrase + (phrase ? ' ' : '') + word);
                }
            },
            removeWord: function (phrase, word) {
                if (this.hasWord(phrase, word)) {
                    return phrase.replace(new RegExp('(^|\\s)*' + word + '(\\s|$)*', 'g'), '');
                }
            }
        };

        // Return service public methods
        return {
            // Add a state to the browser storage to be restored later
            addState: function (classname) {
                var data = $.localStorage.get(storageKeyName);

                if (!data) {
                    data = classname;
                } else {
                    data = WordChecker.addWord(data, classname);
                }

                $.localStorage.set(storageKeyName, data);
            },

            // Remove a state from the browser storage
            removeState: function (classname) {
                var data = $.localStorage.get(storageKeyName);
                // nothing to remove
                if (!data) return;

                data = WordChecker.removeWord(data, classname);

                $.localStorage.set(storageKeyName, data);
            },

            // Load the state string and restore the classlist
            restoreState: function ($elem) {
                var data = $.localStorage.get(storageKeyName);

                // nothing to restore
                if (!data) return;
                $elem.addClass(data);
            }

        };
    };

})(window, document, window.jQuery);
/**=========================================================
 * Module: trigger-resize.js
 * Triggers a window resize event from any element
 =========================================================*/

(function (window, document, $, undefined) {

    $(function () {
        var element = $('[data-trigger-resize]');
        var value = element.data('triggerResize')
        element.on('click', function () {
            setTimeout(function () {
                // all IE friendly dispatchEvent
                var evt = document.createEvent('UIEvents');
                evt.initUIEvent('resize', true, false, window, 0);
                window.dispatchEvent(evt);
                // modern dispatchEvent way
                // window.dispatchEvent(new Event('resize'));
            }, value || 300);
        });
    });

})(window, document, window.jQuery);

// Custom jQuery
// -----------------------------------
(function (window, document, $, undefined) {

    $(function () {

        // document ready

    });

})(window, document, window.jQuery);

