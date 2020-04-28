(function ($) {

    var YatriThemeLib = {

        init: function () {
            this.bindEvents();
            this.initLib();
            this.initAccessibility();
            this.initOffCanvasMenu();
            this.initSearchForm();
            this.navigationMenu();
            this.untoggleOnEscapeKeyPress();

        },
        trapFocus: function (element, open_class) {
            var focusableEls = element.querySelectorAll('a[href]:not([disabled]), button:not([disabled]), textarea:not([disabled]), input[type="text"]:not([disabled]), input[type="radio"]:not([disabled]), input[type="checkbox"]:not([disabled]), select:not([disabled])'),
                firstFocusableEl = focusableEls[0];
            lastFocusableEl = focusableEls[focusableEls.length - 1];
            KEYCODE_TAB = 9;

            element.addEventListener('keydown', function (e) {
                var isTabPressed = (e.key === 'Tab' || e.keyCode === KEYCODE_TAB);

                if (!isTabPressed) {
                    return;
                }
                if (!element.classList.contains(open_class)) {
                        element.removeEventListener('keydown', this);
                    return;

                }

                if (e.shiftKey) /* shift + tab */ {
                    if (document.activeElement === firstFocusableEl) {
                        lastFocusableEl.focus();
                        e.preventDefault();
                    }
                } else /* tab */ {
                    if (document.activeElement === lastFocusableEl) {
                        firstFocusableEl.focus();
                        e.preventDefault();
                    }
                }

            });
        },
        untoggleOnEscapeKeyPress: function () {
            document.addEventListener('keyup', function (event) {
                if (event.key === 'Escape') {
                    document.querySelectorAll('*[data-untoggle-on-escape].close').forEach(function (element) {
                        if (element.classList.contains('close')) {
                            element.click();
                        }
                    });
                }
            });
        },
        navigationMenu: function () {
            var $el = $('.yatri-mobile-menu');
            $el.each(function () {
                var subMenu = $(this).find("ul.sub-menu");
                //subMenu.append();

                var icon = $('<button class="yatri-submenu-toggle fa fa-angle-down"/>');
                subMenu.prev('a').append(icon);
                /* var header = $(this).closest('.yatri-header-item');
                 if (header.length > 0) {
                     var height = header.height();
                 }*/

            });
            $('body').on('click', '.yatri-submenu-toggle', function (e) {
                e.preventDefault();
                if (!$(this).closest('li.menu-item').hasClass('yatri-menu-open')) {
                    $(this).closest('li.menu-item').addClass('yatri-menu-open');
                    $(this).closest('li.menu-item').removeClass('yatri-menu-close');

                } else {
                    $(this).closest('li.menu-item').addClass('yatri-menu-close');
                    $(this).closest('li.menu-item').removeClass('yatri-menu-open');
                }
            });

            $('body').on('click', '.yatri-responsive-toggle-menu', function () {
                var _that = $(this);
                var id = $(this).closest('.yatri-responsive-toggle-menu-wrap').attr('data-id');

                if (typeof id !== "undefined" && typeof id !== undefined && id !== "") {

                    if ($('#' + id).hasClass('yatri-navigation-menu-open')) {
                        $(this).removeClass('close');
                        $(this).addClass('open');
                        $('#' + id).removeClass('yatri-navigation-menu-open');
                        $(this).focus();
                    } else {
                        $(this).removeClass('open');
                        $(this).addClass('close');
                        $('#' + id).addClass('yatri-navigation-menu-open');
                        $(document).trigger('yatri_focus_inside_element', [id, '.yatri-mobile-navigation-close', 'yatri-navigation-menu-open']);
                    }
                    return;
                }
                if (!$(this).closest('.yatri-section-container').hasClass('yatri-toggle-section-open')) {
                    _that.closest('.yatri-section-container').addClass('yatri-toggle-section-open');
                    $(this).closest('.yatri-section-container').find('.yatri-section-inner').slideDown('slow', function () {

                        _that.removeClass('open');
                        _that.addClass('close');
                    });

                } else {

                    $(this).closest('.yatri-section-container').find('.yatri-section-inner').slideUp('slow', function () {
                        _that.closest('.yatri-section-container').removeClass('yatri-toggle-section-open');
                        _that.removeClass('close');
                        _that.addClass('open');

                    });

                }
            });
        },
        getPosition: function (el) {
            var xPos = 0;
            var yPos = 0;

            while (el) {
                if (el.tagName == "BODY") {
                    // deal with browser quirks with body/window/document and page scroll
                    var xScroll = el.scrollLeft || document.documentElement.scrollLeft;
                    var yScroll = el.scrollTop || document.documentElement.scrollTop;

                    xPos += (el.offsetLeft - xScroll + el.clientLeft);
                    yPos += (el.offsetTop - yScroll + el.clientTop);
                } else {
                    // for all other non-BODY elements
                    xPos += (el.offsetLeft - el.scrollLeft + el.clientLeft);
                    yPos += (el.offsetTop - el.scrollTop + el.clientTop);
                }

                el = el.offsetParent;
            }
            return {
                x: xPos,
                y: yPos
            };
        },
        getOffsetLeft: function (elem) {
            var offsetLeft = 0;
            do {
                if (!isNaN(elem.offsetLeft)) {
                    offsetLeft += elem.offsetLeft;
                }
            } while (elem = elem.offsetParent);
            return offsetLeft;
        },
        getOffset: function (element) {

            var calculated_offset = {};

            var offset = element.offset();

            calculated_offset.left = element.offset().left;

            calculated_offset.top = offset.top;

            var right = ($(window).width() - (element.offset().left + element.outerWidth()));

            calculated_offset.right = right;

            return calculated_offset;

        },

        initSearchForm: function () {
            var _that = this;
            var search_form = $('.yatri-section-search-form.form-type-default');
            $.each(search_form, function () {
                $(this).find('.search-form-main').removeClass('before-left').removeClass('before-right');
                var offset = _that.getOffset($(this).find('.yatri-search-icon'));
                var search_form = $(this).find('.search-form-main');
                var search_form_width = offset.left + search_form.width();
                var container = $(this).closest('.yat-container');
                var container_offset = _that.getOffset(container);

                if ((container_offset.left + container.width()) > (offset.left + search_form_width)) {
                    search_form.css({
                        'left': '0',
                        'right': 'unset'
                    });
                    $(this).find('.search-form-main').addClass('before-left');
                } else {
                    search_form.css({
                        'right': '0',
                        'left': 'unset'
                    });
                    $(this).find('.search-form-main').addClass('before-right');
                }

            });
            search_form.find('.search-main').click(function () {

                var wrap = $(this).closest('.yatri-section-search-form');
                wrap.find('.search-form-main').toggleClass('active-search');
                wrap.find('.search-form-main .search-field').focus();
            });
        },
        bindEvents: function () {
            var $this = this;
            $(window).on('resize', function () {

            });
            $(document).ready(function () {

            });
            $('.yatri-canvas-close').on('click', function () {
                var id = $(this).closest('.yatri-offcanvas-menu-content').attr('id');
                $('body').find('.yatri-section-offcanvas-menu[data-id="' + id + '"]').find('.yatri-toggle-wrap').trigger('click');
            });
            $('.yatri-mobile-navigation-close').on('click', function () {
                var id = $(this).closest('.yatri-section-inner').attr('id');
                $('body').find('.yatri-responsive-toggle-menu-wrap[data-id="' + id + '"]').find('.yatri-responsive-toggle-menu').trigger('click');
            });
            $(document).on('yatri_focus_inside_element', function (event, parent_id, focusable_el, trap_class) {
                $('#' + parent_id).find(focusable_el).focus();
                var el = document.getElementById(parent_id);
                $this.trapFocus(el, trap_class);

            });


        },
        initOffCanvasMenu: function () {
            var _that = this;
            var offcanvas_section = $('.yatri-section-offcanvas-menu');
            offcanvas_section.find('.yatri-toggle-wrap').click(function () {
                var offcanvas_id = $(this).closest('.yatri-section-offcanvas-menu').attr('data-id');
                if ($(this).closest('.yatri-section-offcanvas-menu').hasClass('show-nav')) {
                    $(this).closest('.yatri-section-offcanvas-menu').removeClass('show-nav');
                    $(this).removeClass('close');
                    $(this).closest('.yatri-section-offcanvas-menu').find('.toggle-icon').addClass('fa-bars').removeClass('fa-times');
                    $('#' + offcanvas_id).removeClass('yatri-offcanvas-open');
                    $(this).focus();


                } else {
                    $(this).closest('.yatri-section-offcanvas-menu').addClass('show-nav');
                    $(this).addClass('close');
                    $(this).closest('.yatri-section-offcanvas-menu').find('.toggle-icon').addClass('fa-times').removeClass('fa-bars');
                    $('#' + offcanvas_id).addClass('yatri-offcanvas-open');
                    $(document).trigger('yatri_focus_inside_element', [offcanvas_id, '.yatri-offcanvas-close-button', 'yatri-offcanvas-open']);


                }

            });
        },
        initLib: function () {


        },
        initAccessibility: function () {
            var main_menu_container = $('.main-navigation ul.menu');
            main_menu_container.find('li.menu-item').focusin(function () {
                if (!$(this).hasClass('focus')) {
                    $(this).addClass('focus');
                }
            });
            main_menu_container.find('li.menu-item').focusout(function () {
                $(this).removeClass('focus');

            });
        }
    };
    YatriThemeLib.init();


})(jQuery);