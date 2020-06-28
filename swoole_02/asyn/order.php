<?php
require './vendor/autoload.php';
// use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Helper\QuestionHelper;
$input = new ArgvInput;
$output = new ConsoleOutput;
$helper = new QuestionHelper;


while (true) {

    $question = new Question('请输入你要创建的任务 : ');
    $info = $helper->ask($input, $output, $question);
    // var_dump();
    echo "完成".$info."任务\n";

    // 队列 -》 任务投递
    file_put_contents('task.txt', $info."\n", 8);

    $question = new Question('是否停止 : Y / N : ');
    $info = $helper->ask($input, $output, $question);

    if ($info == "Y") {
        break;
    }
}
