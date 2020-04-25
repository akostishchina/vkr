$(document).ready(function () {
    var sign = $('.signIn');
    var signBlock = $('.sign-block');
    var signBlock_active = $('.sign-block_active');
    var reg = $('.registr');
    var regBlock = $('.reg-block');
    var regBlock_active = $('.reg-block_active');
    var exit1 = $('.exit1');
    var exit2 = $('.exit2');

    sign.click(function(){
        signBlock.toggleClass('sign-block_active');
    });
    reg.click(function(){
        signBlock.removeClass('sign-block_active');
        regBlock.toggleClass('reg-block_active');
    });
    exit1.click(function(){
        signBlock.removeClass('sign-block_active');
    });
    exit2.click(function(){
        regBlock.removeClass('reg-block_active');
    });
})