<?php
namespace PhpCsUi\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use PhpCsUi\Checkstyle\File as CheckstyleFile;
use PhpCsUi\Checkstyle\Error as CheckstyleError;


class DashboardController
{
    
    public function indexAction(Application $app, Request $request, $id = null)
    {
        $html =  $app['twig']->render('@Dashboard/index.html.twig', array());
        return $html;
    }
    
    public function testAction(Application $app, Request $request, $id = null)
    {
        $basepath = realpath(__DIR__ . '/../../src/');
        $cmd = __DIR__ . "/../../vendor/bin/phpcs --report=checkstyle --standard=PSR2 " . $basepath;
        exec($cmd, $output);
        $res = implode("\n", $output);
        //print_r($res);
        $start = strpos($res, '<?xml');
        $data = substr($res, $start);

        $files = array();
        $xml = simplexml_load_string($data);
        foreach ($xml->file as $filenode) {
            $file = new CheckstyleFile();
            $relfilename = substr($filenode['name'], strlen($basepath));
            $file->setFilename($filenode['name']);
            $file->setRelativeFilename($relfilename);
            
            foreach ($filenode->error as $errornode) {
                $error = new CheckstyleError();
                $error->setLine($errornode['line']);
                $error->setMessage($errornode['message']);
                $file->addError($error);
            }
            $files[] = $file;
        }
        //print_r($files);
        //exit();
        $html =  $app['twig']->render('@Dashboard/test.html.twig', array('files' => $files));
        return $html;
    }
}
