<?php
use Bitrix\Main\Grid\Declension;
/**
 * Функция, возвращающая номер телефона с ведущим символом "+" для HTML-атрибута tel="".
 * Очищает все лишние символы и если номер телефона начинается с цифры 8, то заменяет её на 7.
 * @param string $phone Российский номер телефона, например, 8 (999) 980-07-53
 * @return string Преобразованный номер телефона, например, +79999800753
 */
function get_tel_from_phone (string $phone):string
{
    $phone = preg_replace('![^0-9]+!', '', $phone);
    if ($phone[0] === '8')
        $phone[0] = 7;
    return '+' . $phone;
}

/**
 * Функция для внешних ссылок на мессенджер WhatsApp.
 * Конвертирует все пробелы в исходной строке на соответствующий URL-код "%20" и возвращает значение, начинающееся с ?text=.
 * @param string $input_string Входная строка с текстом для конвертации
 * @return string Преобразованная строка, в которой все пробелы заменены на URL-код "%20" и в начале добавлено ?text=
 */
function transform_text_to_whatsapp_link (string $input_string):string
{
    return $input_string ? '?text=' . preg_replace('/\s+/', '%20', $input_string) : '';
}

/**
 * Функция, которая возвращает полный URL страницы в вызываемом месте. URL возвращается начиная с протокола сайта и заканчивая до параметров.
 * @return string Полный URL страницы без параметров
 */
function get_full_cur_dir ():string
{
    global $APPLICATION;
    $current_page = 'http://';
    if (isset($_SERVER['HTTPS']) &&
        ($_SERVER['HTTPS'] === 'on' || $_SERVER['HTTPS'] === 1) ||
        isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
        $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
        $current_page = 'https://';
    }
    $current_page .= $_SERVER["HTTP_HOST"];
    $current_page .= $APPLICATION->GetCurDir();
    return $current_page;
}

/**
 * Функция, переводящая первый символ строки в нижний регистр. Стандартная функция lcfirst() не работает для кириллицы.
 * @param string $str Входящая строка
 * @param string $e Кодировка (по-умолчанию utf-8)
 * @return string Преобразованная строка с первым строчным символом.
 */
function custom_lcfirst (string $str, string $e = 'utf-8'):string
{
    $fc = mb_strtolower(mb_substr($str, 0, 1, $e), $e);
    return $fc . mb_substr($str, 1, mb_strlen($str, $e), $e);
}

/**
 * Функция, переводящая первый символ строки в верхний регистр. Стандартная функция ucfirst() не работает для кириллицы.
 * @param string $str Входящая строка
 * @param string $e Кодировка (по-умолчанию utf-8)
 * @return string Преобразованная строка с первым заглавным символом.
 */
function custom_ucfirst (string $str, string $e = 'utf-8'):string
{
    $fc = mb_strtoupper(mb_substr($str, 0, 1, $e), $e);
    return $fc . mb_substr($str, 1, mb_strlen($str, $e), $e);
}