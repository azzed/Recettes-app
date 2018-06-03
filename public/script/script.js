$(function(){

    avant = function(firstClass, firstImage,Class) {
        var active = $(firstClass);

        var suivante = (active.next().length > 0) ? active.next() : $(firstImage);
        active.fadeOut(2, function () {
            active.removeClass(Class);
            suivante.fadeIn().addClass(Class);
        });

    }
})