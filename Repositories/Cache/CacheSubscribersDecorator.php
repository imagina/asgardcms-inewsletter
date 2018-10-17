<?php

namespace Modules\Inewsletter\Repositories\Cache;

use Modules\Inewsletter\Repositories\SubscribersRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheSubscribersDecorator extends BaseCacheDecorator implements SubscribersRepository
{
    public function __construct(SubscribersRepository $subscribers)
    {
        parent::__construct();
        $this->entityName = 'inewsletter.subscribers';
        $this->repository = $subscribers;
    }
}
