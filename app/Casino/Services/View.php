<?php
namespace Casino\Services;

class View {

    public function __construct()
    {
        session_start();
    }

    /**
     * @param $tpl
     * @param $args
     * @return void
     */
    public static function load($tpl, $args = []): void
    {

        $template = self::app($tpl, $args);

        ob_start();

        include $_SERVER['DOCUMENT_ROOT'] . '/resources/views/layouts/app.php';

        $output = ob_get_contents();
        ob_end_clean();

        echo $output;

    }

    /**
     * @param $tpl
     * @return false|string
     */
    private static function app($tpl, $args = []): bool|string
    {

        extract($args);
        ob_start();

        include $_SERVER['DOCUMENT_ROOT'] . '/resources/views/' . $tpl . '.php';

        $template = ob_get_contents();
        ob_end_clean();

        return $template;

    }


}
