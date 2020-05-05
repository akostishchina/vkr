/*var swap_btn = document.querySelector('.proverka');
swap_btn.addEventListener('click', swap);

function swap() {
    var modal = document.getElementById('calendar');
    modal.classList.add('calendar_active');
}*/
$(document).ready(function () {
    var swap_btn = $('.animation_plan');
    var calendar_open = $('.calendar');
    var photo = $('.photo_calendar');
    var today = $('.today_plan');

    swap_btn.click(function () {
        today.toggleClass('today_plan_active');
        photo.toggleClass('photo_calendar_active');
        calendar_open.toggleClass('calendar_active');
        /*if (swap_btn.value == 'Сегодня &gt;') {
            swap_btn.value = 'Календарь &or;';
        }
        else {
            swap_btn.value = 'Сегодня &gt;';
        }*/
    });
})