<?php


namespace App\Repositories;

use Carbon\Carbon;
use Illuminate\Cache\CacheManager;

class AppRepository
{


    protected  $cache;

    /**
     * @return CacheManager
     */
    protected function setCache(): CacheManager
    {
        if (!$this->cache) {

            $this->cache = new CacheManager(app());
        }
        return $this->cache;
    }

    /**
     * @param string $key
     * @return mixed
     */
    private function callConfig(string $key)
    {
        return config('app-config')['cache'][$key];
    }

    /**
     * @return bool
     */
    public function useCache(): bool
    {
        return $this->callConfig('use-cache');
    }


    /**
     * @return Carbon
     */
    protected function timeToLive(): Carbon
    {
        return Carbon::now()->addDays($this->callConfig('cache-live-time'));
    }
}
