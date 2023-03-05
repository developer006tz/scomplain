function isMobile() {
    return typeof window.orientation !== 'undefined' && window.outerWidth <= 576
        ? true
        : false;
}
var displayed = false;
var ready = false;
var scrollTop = 0;
var dom = {
    background: $('<div class="DTED_Lightbox_Background"><div></div></div>'),
    close: $('<div class="DTED_Lightbox_Close"></div>'),
    content: null,
    wrapper: $('<div class="DTED DTED_Lightbox_Wrapper">' +
        '<div class="DTED_Lightbox_Container">' +
        '<div class="DTED_Lightbox_Content_Wrapper">' +
        '<div class="DTED_Lightbox_Content">' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>')
};
function heightCalc() {
    var headerFooter = $('div.DTE_Header', dom.wrapper).outerHeight() +
        $('div.DTE_Footer', dom.wrapper).outerHeight();
    if (isMobile()) {
        $('div.DTE_Body_Content', dom.wrapper).css('maxHeight', 'calc(100vh - ' + headerFooter + 'px)');
    }
    else {
        // Set the max-height for the form content
        var maxHeight = $(window).height() - (self.conf.windowPadding * 2) - headerFooter;
        $('div.DTE_Body_Content', dom.wrapper).css('maxHeight', maxHeight);
    }
}
function hide(dte, callback) {
    if (!callback) {
        callback = function () { };
    }
    // Restore scroll state
    $('body').scrollTop(scrollTop);
    dte._animate(dom.wrapper, {
        opacity: 0,
        top: self.conf.offsetAni
    }, function () {
        $(this).detach();
        callback();
    });
    dte._animate(dom.background, {
        opacity: 0
    }, function () {
        $(this).detach();
    });
    displayed = false;
    $(window).off('resize.DTED_Lightbox');
}
function init() {
    if (ready) {
        return;
    }
    dom.content = $('div.DTED_Lightbox_Content', dom.wrapper);
    dom.wrapper.css('opacity', 0);
    dom.background.css('opacity', 0);
    ready = true;
}
function show(dte, callback) {
    // Mobiles have very poor position fixed abilities, so we need to know
    // when using mobile A media query isn't good enough
    if (isMobile()) {
        $('body').addClass('DTED_Lightbox_Mobile');
    }
    $('body')
        .append(dom.background)
        .append(dom.wrapper);
    heightCalc();
    if (!displayed) {
        displayed = true;
        dom.content.css('height', 'auto');
        dom.wrapper.css({
            top: -self.conf.offsetAni
        });
        dte._animate(dom.wrapper, {
            opacity: 1,
            top: 0
        }, callback);
        dte._animate(dom.background, {
            opacity: 1
        });
        $(window).on('resize.DTED_Lightbox', function () {
            heightCalc();
        });
        scrollTop = $('body').scrollTop();
    }
    // Event handlers - assign on show, premoving previous bindings
    dom.close
        .attr('title', dte.i18n.close)
        .off('click.DTED_Lightbox')
        .on('click.DTED_Lightbox', function (e) {
        dte.close();
    });
    dom.background
        .off('click.DTED_Lightbox')
        .on('click.DTED_Lightbox', function (e) {
        e.stopImmediatePropagation();
        dte.background();
    });
    $('div.DTED_Lightbox_Content_Wrapper', dom.wrapper)
        .off('click.DTED_Lightbox')
        .on('click.DTED_Lightbox', function (e) {
        if ($(e.target).hasClass('DTED_Lightbox_Content_Wrapper')) {
            e.stopImmediatePropagation();
            dte.background();
        }
    });
}
var self = {
    close: function (dte, callback) {
        hide(dte, callback);
    },
    conf: {
        offsetAni: 25,
        windowPadding: 25
    },
    destroy: function (dte) {
        if (displayed) {
            hide(dte);
        }
    },
    init: function (dte) {
        init();
        return self;
    },
    node: function (dte) {
        return dom.wrapper[0];
    },
    open: function (dte, append, callback) {
        console.log(dte, append);
        var content = dom.content;
        content.children().detach();
        content
            .append(append)
            .append(dom.close);
        show(dte, callback);
    }
};
export default self;
