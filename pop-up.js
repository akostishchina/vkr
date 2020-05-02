var layer = $('#pop-up-layer');
$('#positive_btn').click(function() {
    removeModal();
    layer.fadeIn();
    layer.delay(1200).fadeOut();
});