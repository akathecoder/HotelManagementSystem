/* global elementor, elementorCommon */
/* eslint-disable */
"undefined" != typeof jQuery && function ( $ ) {
    $(function () {
        function yatriToolsElementorModalOpen() {

            if (elementorCommon) {

                window.yatriToolsElementorModal || (window.yatriToolsElementorModal = elementorCommon.dialogsManager.createWidget(
                    "lightbox", {
                        id: "yatri-tools-elementor-library-modal",
                        headerMessage: !1,
                        message: "",
                        hide: {
                            auto: !1,
                            onClick: !1,
                            onOutsideClick: !1,
                            onOutsideContextMenu: !1,
                            onBackgroundClick: !0
                        },
                        position: {
                            my: "center",
                            at: "center"
                        },
                        onShow: function () {
                            var content = window.yatriToolsElementorModal.getElements("content");
                            if( content.html() === '' ) {
                                content.html('<div id="yatri-tools-elementor-library"></div>');
                            }
                        },
                        onHide: function () {}
                    }), window.yatriToolsElementorModal.getElements("header").remove(),
                    window.yatriToolsElementorModal.getElements("message").append(window.yatriToolsElementorModal.addElement("content"))),
                    window.yatriToolsElementorModal.show()
            }

        }
        window.yatriToolsElementorModal = null;
        var btn = $("#tmpl-elementor-add-section");

        if (0 < btn.length) {
            var btnText = btn.text();

            btnText = btnText.replace('<div class="elementor-add-section-drag-title', '<div class="elementor-add-section-area-button elementor-add-yatri-tools-elementor-button" title="Yatri Elementor Library"> <i class="fa fa-folder"></i> </div><div class="elementor-add-section-drag-title'),
                btn.text(btnText), elementor.on("preview:loaded", function () {
                $(elementor.$previewContents[0].body).on("click", ".elementor-add-yatri-tools-elementor-button", yatriToolsElementorModalOpen)
            })
        }
    })
}(jQuery);