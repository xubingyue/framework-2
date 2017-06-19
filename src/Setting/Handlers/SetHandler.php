<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <heshudong@ibenchu.com>
 * @copyright (c) 2016, notadd.com
 * @datetime 2016-11-23 15:09
 */
namespace Notadd\Foundation\Setting\Handlers;

use Illuminate\Container\Container;
use Notadd\Foundation\Routing\Abstracts\Handler;
use Notadd\Foundation\Setting\Contracts\SettingsRepository;

/**
 * Class SetHandler.
 */
class SetHandler extends Handler
{
    /**
     * @var \Notadd\Foundation\Setting\Contracts\SettingsRepository
     */
    protected $settings;

    /**
     * SetHandler constructor.
     *
     * @param \Illuminate\Container\Container                         $container
     * @param \Notadd\Foundation\Setting\Contracts\SettingsRepository $settings
     */
    public function __construct(Container $container, SettingsRepository $settings)
    {
        parent::__construct($container);
        $this->settings = $settings;
    }

    /**
     * Execute Handler.
     */
    public function execute()
    {
        $this->settings->set('site.enabled', $this->request->input('enabled'));
        $this->settings->set('site.name', $this->request->input('name'));
        $this->settings->set('site.domain', $this->request->input('domain'));
        $this->settings->set('site.beian', $this->request->input('beian'));
        $this->settings->set('site.company', $this->request->input('company'));
        $this->settings->set('site.copyright', $this->request->input('copyright'));
        $this->settings->set('site.statistics', $this->request->input('statistics'));
        $this->withCode(200)->withMessage('修改设置成功！');
    }
}
