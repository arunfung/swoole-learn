<?php
while (true) {
    $data = file_get_contents('task.txt');
    if ($data != '') {
        echo "完成: ".$data.'任务';
        file_put_contents('task.txt', '');
        echo "清空任务\n";

    } else {
        echo "没有任务\n";
    }
    sleep(2);
}
