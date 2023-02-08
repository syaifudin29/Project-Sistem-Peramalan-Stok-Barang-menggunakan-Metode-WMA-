<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        $this->session = session();
        $this->id_user = session()->get('id_user');

        $this->contohModel = new \App\Models\ContohModel();
        $this->umumModel = new \App\Models\UmumModel();
        $this->barangModel = new \App\Models\BarangModel();
        $this->bkeluarModel = new \App\Models\BkeluarModel();
        $this->bmasukModel = new \App\Models\BmasukModel();
        $this->gudangModel = new \App\Models\GudangModel();
        $this->jenisModel = new \App\Models\JenisModel();
        $this->satuanModel = new \App\Models\SatuanModel();
        $this->suplierModel = new \App\Models\SuplierModel();
        $this->userModel = new \App\Models\UserModel();
        $this->wmaModel = new \App\Models\WmaModel();
        $this->hasilModel = new \App\Models\HasilModel();
        $this->aktualModel = new \App\Models\AktualModel();
        $this->hanalisisModel = new \App\Models\HasilanalisisModel();
    }
}
