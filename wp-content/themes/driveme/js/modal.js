(function($) {
    $(function () {

        var appendthis = ("<div class='dm-modal-overlay dm-modal-close'></div>");
        $doc = $(document);

        $doc.on('click', 'a[data-modal-id]', function (e) {
            e.preventDefault();
            $("body").append(appendthis);
            $(".dm-modal-overlay").fadeTo(300, 1);
            var modalBox = $(this).attr('data-modal-id');
            $('#' + modalBox).addClass('dm-modal-active').fadeIn($(this).data());
            $(window).resize();
        });

        $doc.on('click', '.dm-modal-close, .dm-modal-overlay', function (e) {
            e.preventDefault();
            $(".dm-modal-box").removeClass('dm-modal-active').fadeOut(300);
            $(".dm-modal-overlay").fadeOut(300, function () {
                $(".dm-modal-overlay").remove();
            });
        });

        $(window).resize(function () {
            $(".dm-modal-active").css({
                top: ($(window).height() - $(".dm-modal-box").outerHeight()) / 2,
                left: ($(window).width() - $(".dm-modal-box").outerWidth()) / 2
            });
        });

    });
})(jQuery);