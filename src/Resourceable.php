<?php
namespace JSefton\Resourceable;

use ReflectionClass;

trait Resourceable
{
    /**
     * @return string
     */
    public function resourceReference()
    {
        return self::resourceClass() . '::' . $this->id;
    }

    /**
     * @return string
     */
    public static function resourceClass()
    {
        return get_called_class();
    }

    /**
     * @return string
     */
    public function modelName()
    {
        $reflect = new ReflectionClass($this);
        return $reflect->getShortName();
    }

    /**
     * @return string
     */
    public function getUuidAttribute()
    {
        return md5($this->resourceReference());
    }

    /**
     * @param $key
     * @return string
     */
    public function uuid($key)
    {
        return md5($this->resourceReference() . $key);
    }
}
