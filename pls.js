(function() {
    'use strict';
    var btn1 = document.getElementById('more1');
    var btn2 = document.getElementById('more2');
    var btn4 = document.getElementById('more4');
    var btn5 = document.getElementById('more5');
    var btn6 = document.getElementById('more6');
    function fun1() {
        if (btn1.value == 'Подробнее') {
            document.getElementById('step2').style.display='block';
            btn1.value = 'Назад';
        } else {
            document.getElementById('step2').style.display='none';
            btn1.value = 'Подробнее';
        }
    }
    function fun2() {
        if (btn2.value == 'Подробнее') {
            document.getElementById('step2_3').style.display='block';
            btn2.value = 'Назад';
        } else {
            document.getElementById('step2_3').style.display='none';
            btn2.value = 'Подробнее';
        }
    }
    function fun4() {
        if (btn4.value == 'Подробнее') {
            document.getElementById('step2_5').style.display='block';
            btn4.value = 'Назад';
        } else {
            document.getElementById('step2_5').style.display='none';
            btn4.value = 'Подробнее';
        }
    }
    function fun5() {
        if (btn5.value == 'Подробнее') {
            document.getElementById('step2_6').style.display='block';
            btn5.value = 'Назад';
        } else {
            document.getElementById('step2_6').style.display='none';
            btn5.value = 'Подробнее';
        }
    }
    function fun6() {
        if (btn6.value == 'Подробнее') {
            document.getElementById('step2_7').style.display='block';
            btn6.value = 'Назад';
        } else {
            document.getElementById('step2_7').style.display='none';
            btn6.value = 'Подробнее';
        }
    }
    btn1.addEventListener('click',fun1);
    btn2.addEventListener('click',fun2);
    btn4.addEventListener('click',fun4);
    btn5.addEventListener('click',fun5);
    btn6.addEventListener('click',fun6);
    })();