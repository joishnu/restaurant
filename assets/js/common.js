var read_image = function(event, target) {
    $(target).attr('src', URL.createObjectURL(event.target.files[0]));
};

 ! function(e) {
    e("body").prepend('<div class="loading-overlay"><div class="bounce-loader"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>');
    var t = e(".loadmore .btn");
   e(window).on("load", function() {
        e("body").addClass("loaded")
    }), e(window).on("scroll", function() {
        //o.scrollBtnAppear()
    })
}(jQuery);