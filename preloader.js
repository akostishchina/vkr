$(window).on('load', function () {
    $preloader = $('.preloader'),
        $loader = $preloader.find('.loader');
    $loader.fadeOut();
    $preloader.delay(400).fadeOut('slow');
});