<?php
/**
 * 理解度チェック（クラス）
 * 
 * ファイル書き込みを行うためのクラスを定義してみましょう。
 * 
 * ヒント）PHP_EOL: 改行するための特殊な定数です。
 */
// $content = 'Hello, Bob.'; // append
// $content .= PHP_EOL; // newline
// $content .= 'Bye, '; // append
// $content .= 'Bob.'; // append
// $content .= PHP_EOL; // newline

// // commit
// file_put_contents('sample.txt', $content);
// $content = '';

// $content = 'Good night, Bob.'; // append

// // commit
// file_put_contents('sample.txt', $content, FILE_APPEND);
// $content = '';

/* クラスの呼び出し方は以下のようにするものとします。

$file = new MyFileWriter('sample.txt');
$file->append('Hello, Bob.')
    ->newline()
    ->append('Bye, ')
    ->append('Bob.')
    ->newline()
    ->commit()
    ->append('Good night, Bob.')
    ->commit(MyFileWriter::APPEND);

*/

class MyFileWriter{
    public $txt_file;
    public $content;
    public const APPEND = FILE_APPEND;

    function __construct($txt_file)
    {
        $this->txt_file = $txt_file;
    }

    function append($content){
        $this->content .= $content;
        return $this;
    }

    function newline(){
        $this->content .= PHP_EOL;
        return $this;
        // return $this->append(PHP_EOL);
    }

    // function commit(){
    //     file_put_contents($this->txt_file, $this->content, self::APPEND);
    //     $this->content = '';
    //     return $this;
    // }

    function commit($flag = null){
        file_put_contents($this->txt_file, $this->content, $flag);
        $this->content = '';
        return $this;
    }
}

$file = new MyFileWriter('sample.txt');
$file->append('Hello, Bob.')
    ->newline()
    ->append('Bye, ')
    ->append('Bob.')
    ->newline()
    ->commit()
    ->append('Good night, Bob.')
    ->commit(MyFileWriter::APPEND);
