/*$(window).on('load', function () {
    $preloader = $('.preloader'),
        $loader = $preloader.find('.loader');
    $loader.fadeOut();
    $preloader.delay(400).fadeOut('slow');
});*/
window.onload = function () {
    document.body.classList.add('loaded_hiding');
    window.setTimeout(function () {
        document.body.classList.add('loaded');
        document.body.classList.remove('loaded_hiding');
    },800);
};