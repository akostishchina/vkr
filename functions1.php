<?php
/*
 * Function requested by Ajax
 */
if(isset($_POST['func']) && !empty($_POST['func'])){
    switch($_POST['func']){
        case 'getCalender1':
            getCalender1($_POST['year'],$_POST['month']);
            break;
        case 'getEvents1':
            getEvents1($_POST['date'],$_POST['id']);
            break;
        default:
            break;
    }
}

/*
 * Get calendar full HTML
 */
function getCalender1($year = '',$month = '')
{
    $dateYear = ($year != '')?$year:date("Y");
    $dateMonth = ($month != '')?$month:date("m");
    $month=["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"];
    $date = $dateYear.'-'.$dateMonth.'-01';
    $currentMonthFirstDay = date("N",strtotime($date));
    $totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN,$dateMonth,$dateYear);
    $totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7)?($totalDaysOfMonth):($totalDaysOfMonth + $currentMonthFirstDay);
    $boxDisplay = ($totalDaysOfMonthDisplay <= 35)?35:42;
    ?>
    <div id="calender_section">
        <div class="month_and_arrow">
            <a class="arrow" href="javascript:void(0);" onclick="getCalendar1('calendar_div','<?php echo date("Y",strtotime($date.' - 1 Month')); ?>','<?php echo date("m",strtotime($date.' - 1 Month')); ?>');">&lt;</a>

            <p id="calendar2"><?php echo $dateMonth; ?></p><select name="month_dropdown" class="month_dropdown dropdown"><?php echo getAllMonths1($dateMonth); ?></select>

            <a class="arrow arrowl" href="javascript:void(0);" onclick="getCalendar1('calendar_div','<?php echo date("Y",strtotime($date.' + 1 Month')); ?>','<?php echo date("m",strtotime($date.' + 1 Month')); ?>');">&gt;</a>
        </div>

        <div id="calender_section_top">
            <ul>

                <li>Пн</li>
                <li>Вт</li>
                <li>Ср</li>
                <li>Чт</li>
                <li>Пт</li>
                <li>Сб</li>
                <li>Вс</li>
            </ul>
        </div>


        <div id="calender_section_bot">
            <ul>
                <?php
                $dayCount = 1;
                for($cb=1; $cb<=$boxDisplay; $cb++){
                    if(($cb >= $currentMonthFirstDay || $currentMonthFirstDay == 7) && $cb < ($totalDaysOfMonthDisplay)){
                        //Current date
                        $currentDate = $dateYear.'-'.$dateMonth.'-'.$dayCount;
                        $eventNum = 0;
                        //Include db configuration file
                        include 'dbConfig.php';
                        //Get number of events based on the current date
                        $result = $db->query("SELECT * FROM calendar WHERE date = '".$currentDate."' AND needing_id = '".$_SESSION['id']."'");
                        $eventNum = $result->num_rows;

                        //Define date cell color
                        if(strtotime($currentDate) == strtotime(date("Y-m-d"))) {
                            echo '<li tabindex="0" date="' . $currentDate . '" class="grey date_cell today">';
                        }elseif($eventNum > 0){
                            echo '<li tabindex="0" date="'.$currentDate.'" class="light_sky date_cell plans">';
                        }else{
                            echo '<li tabindex="0" date="'.$currentDate.'" class="date_cell usual">';
                        }
                        //Date cell
                        echo '<span>';
                        echo $dayCount;
                        echo '</span>';

                        //Hover event popup
                        $id = $_SESSION['id'];
                        echo '';
                        echo ($eventNum > 0)?'<a href="javascript:;" onclick="getEvents1(\''.$currentDate.'\', '.$id.');">('.$eventNum.')</a>':'';

                        echo '</li>';
                        $dayCount++;

                        ?>
                    <?php }else{ ?>
                        <li><span>&nbsp;</span></li>
                    <?php } } ?>
            </ul>
        </div>


    </div>

    <script type="text/javascript">
        //показывает событие (инфу о нем)
        function getCalendar1(target_div,year,month){
            $.ajax({
                type:'POST',
                url:'functions1.php',
                data:'func=getCalender1&year='+year+'&month='+month,
                success:function(html){
                    $('#'+target_div).html(html);
                }
            });
        }
        //показывает событие (инфу о нем)
        function getEvents1(date,id){
            document.querySelector('.photo_calendar').style.display='none';
            $.ajax({
                type:'POST',
                url:'functions1.php',
                data:'func=getEvents1&date='+date+'&id='+id,
                success:function(html){
                    $('#event_list').html(html);
                    $('#event_list').slideDown('slow');
                }
            });
        }

        //хз
        function addEvent(date){
            $.ajax({
                type:'POST',
                url:'functions1.php',
                data:'func=addEvent&date='+date,
                success:function(html){
                    $('#event_list').html(html);
                    $('#event_list').slideDown('slow');
                }
            });
        }
        //ховер эфффект
        $(document).ready(function(){
            $('.date_cell').mouseenter(function(){
                date = $(this).attr('date');
                $(".date_popup_wrap").fadeOut();
                $("#date_popup_"+date).fadeIn();
            });
            $('.date_cell').mouseleave(function(){
                $(".date_popup_wrap").fadeOut();
            });
            $('.month_dropdown').on('change',function(){
                getCalendar1('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val());
            });
            $('.year_dropdown').on('change',function(){
                getCalendar1('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val());
            });
            $(document).click(function(){
                $('#event_list').slideUp('slow');
            });
        });
    </script>
    <?php
}

/*
 * Get months options list.
 */
function getAllMonths1($selected = ''){
    $options = '';
    for($i=1;$i<=12;$i++)
    {
        $value = ($i < 10)?'0'.$i:$i;
        $selectedOpt = ($value == $selected)?'selected':'';
        $options .= '<option value="'.$value.'" '.$selectedOpt.' >'.date("F", mktime(0, 0, 0, $i+1, 0, 0)).'</option>';
    }
    return $options;
}

/*
 * Get events by date
 */

function getEvents1($date = '', $id = ''){
    //Include db configuration file
    include 'dbConfig.php';

    $arr=["Января","Февраля","Марта","Апреля","Мая","Июня","Июля","Августа","Сентября","Октября","Ноября","Декабря"];
    $month = date('n')-1;

    $eventListHTML = '';
    $date = $date?$date:date("Y-m-d");
    $id = $id?$id:10;
    //Get events based on the current date

    $result = $db->query("SELECT `title_cal`,`id_help` FROM `calendar` WHERE date = '".$date."' AND `needing_id` = '".$id."'");
    if($result->num_rows > 0){
        $eventListHTML = '<h2>События на '.date("d ",strtotime($date)).$arr[$month].date(" Y",strtotime($date)).'</h2>';
        $eventListHTML .= '<ul>';
        while($row = $result->fetch_assoc()){
            $eventListHTML .= '<li><a href="me.php?plan_id=' . $row['id_help'] . '">'.$row['title_cal'].'</a></li>';
        }
        $eventListHTML .= '</ul>';
    }
    echo $eventListHTML;
}
?>
<script type="text/javascript">
    /*function getPlans(){
        document.querySelector('.photo_calendar').style.display='block';
        window.history.pushState(null,null,'me.php?plan_id=2');
    }*/

</script>

