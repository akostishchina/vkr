var button_doctor = document.getElementById('doctor');
var button_volunteer = document.getElementById('volunteer');
var button_hero = document.getElementById('hero');
//var button_reg = document.getElementById('notReg');
var lastFocusedElement;
var closeButton = document.querySelector('.exit2');

button_doctor.addEventListener('click', showModal);
button_volunteer.addEventListener('click', showModal);
button_hero.addEventListener('click', showModal);
//button_reg.addEventListener('click', showModal);

function showModal() {
    // Close all open modal windows
    removeModal();
    // Store the last focused element
    lastFocusedElement = document.activeElement;
    // Select the modal window
    var modal = document.getElementById('reg_block');
    // Show the window
    modal.classList.add('reg-block_active');
    // Find all focusable children
    var focusableElementsString = 'a[href], area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, [tabindex="0"], [contenteditable]';
    var focusableElements = modal.querySelectorAll(focusableElementsString);
    // Convert NodeList to Array
    focusableElements = Array.prototype.slice.call(focusableElements);

    // The first focusable element within the modal window
    var firstTabStop = focusableElements[0];
    // The last focusable element within the modal window
    var lastTabStop = focusableElements[focusableElements.length - 1];
    // Focus the window
    firstTabStop.focus();
    // Add keydown event
    modal.addEventListener('keydown', function(e) {
        // Listen for the Tab key
        if (e.keyCode === 9) {
            // If Shift + Tab
            if (e.shiftKey) {
                // If the current element in focus is the first focusable element within the modal window...
                if (document.activeElement === firstTabStop) {
                    e.preventDefault();
                    // ...jump to the last focusable element
                    lastTabStop.focus();
                }
                // if Tab
            } else {
                // If the current element in focus is the last focusable element within the modal window...
                if (document.activeElement === lastTabStop) {
                    e.preventDefault();
                    // ...jump to the first focusable element
                    firstTabStop.focus();
                }
            }
        }

        // Close the window by pressing the Esc-key
        if(e.keyCode === 27) {
            removeModal();
        }
    });
}

closeButton.addEventListener('click', removeModal);

// Remove the modal window if it's visible
function removeModal() {
    var visibleClass = 'reg-block_active';
    if (document.querySelector('.' + visibleClass)) {
        document.querySelector('.' + visibleClass).classList.remove(visibleClass);
        // Return the focus to the last focused element
        lastFocusedElement.focus();
    }
}

var id_role = document.getElementById('id_role');

function hero_click() {
    id_role.value = 1;
}
function volunteer_click() {
    id_role.value = 2;
}
function doctor_click() {
    id_role.value = 3;
}
/*$(document).ready(function(){
    "use strict";
    //================ Проверка email ==================

    //регулярное выражение для проверки email
    var pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i;
    var mail = $('input[name=email]');

    mail.blur(function(){
        if(mail.val() != ''){

            // Проверяем, если введенный email соответствует регулярному выражению
            if(mail.val().search(pattern) == 0){
                // Убираем сообщение об ошибке
                $('#valid_email_message').text('');

                //Активируем кнопку отправки
                $('input[type=submit]').attr('disabled', false);
            }else{
                //Выводим сообщение об ошибке
                $('#valid_email_message').text('Не правильный Email');

                // Дезактивируем кнопку отправки
                $('input[type=submit]').attr('disabled', true);
            }
        }else{
            $('#valid_email_message').text('Введите Ваш email');
        }
    });

    //================ Проверка длины пароля ==================
    var password = $('input[name=password]');

    password.blur(function(){
        if(password.val() != ''){

            //Если длина введенного пароля меньше шести символов, то выводим сообщение об ошибке
            if(password.val().length < 6){
                //Выводим сообщение об ошибке
                $('#valid_password_message').text('Минимальная длина пароля 6 символов');

                // Дезактивируем кнопку отправки
                $('input[type=submit]').attr('disabled', true);

            }else{
                // Убираем сообщение об ошибке
                $('#valid_password_message').text('');

                //Активируем кнопку отправки
                $('input[type=submit]').attr('disabled', false);
            }
        }else{
            $('#valid_password_message').text('Введите пароль');
        }
    });
});*/


