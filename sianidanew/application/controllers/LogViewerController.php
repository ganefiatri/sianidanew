<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * CI Logviewer example
 *
 * Just a test controller to see how the library works
 */
class LogViewerController extends CI_Controller
{

	

public function __construct() {
    $this->logViewer = new \CILogViewer\CILogViewer();
}

public function index() {
    echo $this->logViewer->showLogs();
    return;
}

}

/* End of file Logviewer_example.php */
/* Location: ./application/controllers/Logviewer_example.php */
