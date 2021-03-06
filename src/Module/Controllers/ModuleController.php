<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <heshudong@ibenchu.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-02-18 19:03
 */
namespace Notadd\Foundation\Module\Controllers;

use Notadd\Foundation\Module\Handlers\DomainHandler;
use Notadd\Foundation\Module\Handlers\EnableHandler;
use Notadd\Foundation\Module\Handlers\ExportsHandler;
use Notadd\Foundation\Module\Handlers\ImportsHandler;
use Notadd\Foundation\Module\Handlers\InstallHandler;
use Notadd\Foundation\Module\Handlers\ModuleHandler;
use Notadd\Foundation\Module\Handlers\UninstallHandler;
use Notadd\Foundation\Module\Handlers\UpdateHandler;
use Notadd\Foundation\Routing\Abstracts\Controller;

/**
 * Class ModuleController.
 */
class ModuleController extends Controller
{
    /**
     * @var array
     */
    protected $permissions = [
        'global::global::module::module.manage' => [
            'enable',
            'handle',
            'install',
            'uninstall',
            'update',
        ],
    ];

    /**
     * Enable handler.
     *
     * @param \Notadd\Foundation\Module\Handlers\EnableHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     * @throws \Exception
     */
    public function enable(EnableHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    /**
     * @param \Notadd\Foundation\Module\Handlers\DomainHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */
    public function domain(DomainHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    /**
     * @param \Notadd\Foundation\Module\Handlers\ExportsHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */
    public function exports(ExportsHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    /**
     * Handler.
     *
     * @param \Notadd\Foundation\Module\Handlers\ModuleHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     * @throws \Exception
     */
    public function handle(ModuleHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    /**
     * @param \Notadd\Foundation\Module\Handlers\ImportsHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     */
    public function imports(ImportsHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    /**
     * Install handler.
     *
     * @param \Notadd\Foundation\Module\Handlers\InstallHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     * @throws \Exception
     */
    public function install(InstallHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    /**
     * Uninstall handler.
     *
     * @param \Notadd\Foundation\Module\Handlers\UninstallHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     * @throws \Exception
     */
    public function uninstall(UninstallHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }

    /**
     * Update Handler.
     *
     * @param \Notadd\Foundation\Module\Handlers\UpdateHandler $handler
     *
     * @return \Notadd\Foundation\Passport\Responses\ApiResponse|\Psr\Http\Message\ResponseInterface|\Zend\Diactoros\Response
     * @throws \Exception
     */
    public function update(UpdateHandler $handler)
    {
        return $handler->toResponse()->generateHttpResponse();
    }
}
