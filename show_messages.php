<?php

    require_once('connection.php');
    require_once ('show_dialogs.php');
    $link = mysqli_connect('localhost', 'root', '', 'myvkr', '3308')
    or die("Ошибка подключения к бд" . mysqli_error($link));
    mysqli_set_charset($link, "utf8");
    $user_one = $_SESSION['id'];
    $user_two = $_GET['mes_id'];
    if ($user_two == 0) {
        echo 'Выберите диалог';
    }
    elseif ($user_one != $user_two) {
        // Поиск диалога
        $row_conversation = mysqli_query($link, "SELECT `id_d`, `num_unread` FROM `dialogs` WHERE ((`first_user_id` = '" . $user_one . "' AND `second_user_id` = '" . $user_two . "') OR (`first_user_id` = '" . $user_two . "' AND `second_user_id` = '" . $user_one . "'))");
        $row_dialog = mysqli_fetch_assoc($row_conversation);

        // Если диалог не создан ранее
        if (!isset($row_dialog['id_d'])) {
            echo 'Сообщений с данным пользователем нет!';

        } else {
            $sql_result = mysqli_query($link, "SELECT `id_message`, `date`, `content`, `sender_id` FROM `message`
        WHERE `dialog_id` = '{$row_dialog['id_d']}' AND
            CASE
                WHEN `sender_id` = '" . $user_one . "'
                    THEN `sender_delete` = '0'
                WHEN `addressee_id` = '" . $user_one . "'
                    THEN `addressee_delete` = '0'
            END
        ORDER BY `id_message` ASC");

            if (!mysqli_num_rows($sql_result)) {
                echo 'Сообщений с данным пользователем нет!';
            } else {

                while ($row = mysqli_fetch_assoc($sql_result)) {
                    echo '
                        <div class="two_sms">';
                            if ($row['sender_id'] == $user_one) {
                                echo '
                                    <div class="to_smn_m">
                                        <div class="to_smn">
                                            <p>' . $row['content'] . '</p>
                                         </div>
                                    </div>
                                ';
                            } elseif ($row['sender_id'] != $user_one) {
                                echo '
                                    <div class="to_me_m">
                                        <div class="to_me">
                                            <p>' . $row['content'] . '</p>
                                        </div>
                                    </div>
                                ';
                            }
                        echo '
                        </div>';

                }
                // Перебираем результат
                /*echo '
            <table border="1">
                <tr>
                    <td>Дата</td>
                    <td>Сообщение</td>
                </tr>';
                while ($row = mysqli_fetch_assoc($sql_result)) {
                    echo '
                <tr>
                    <td>' . $row['date'] . '</td>
                    <td class="to_me">' . $row['content'] . '</td>
                </tr>';
                }
                echo '
            </table>';*/
            }
            if ($row_dialog['num_unread'] != '0') {
                // Обновляем флаг просмотров сообщений
                $link->query("
        UPDATE LOW_PRIORITY
            `message`
        SET
            `readed` = '1'
        WHERE
            `dialog_id` = '{$row_dialog['id_d']}'");
                // Обновляем таблицу с диалогом
                $link->query("
        UPDATE LOW_PRIORITY
            `dialogs`
        SET
            `num_unread` = '0'
        WHERE
            `id_d` = '{$row_dialog['id_d']}'");
            }
        }

    }

?>