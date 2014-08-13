function animate(){
    // Animation [appear]
    jQuery("[data-animation]").each(function() {
        var _t = jQuery(this);

       /* if(jQuery(window).width() > 767) {*/

            _t.appear(function() {

                var delay = (_t.attr("data-animation-delay") ? _t.attr("data-animation-delay") : 1);

                if(delay > 1) _t.css("animation-delay", delay + "ms");
                _t.addClass(_t.attr("data-animation"));

                setTimeout(function() {
                    _t.addClass("animation-visible");
                }, delay);

            }, {accX: 0, accY: -150});

        /*} else {

            _t.addClass("animation-visible");

        }*/

    });
}