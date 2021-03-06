<?php

namespace Commands\TransUpDown\Component\Model;

class DownloadStatus
{
    const IDLE = 'idle';
    const DOWNLOADING = 'downloading';
    const STOPPED = 'stopped';
    const SEEDING = 'seeding';
    const FINISHED = 'finished';

    private $name = '';

    public function __construct($name)
    {
        if (in_array($name, $this->getList())) {
            $this->name = $name;
        }
    }

    /** @return bool */
    public function isFinished()
    {
        return in_array($this->name, array(self::FINISHED, self::SEEDING));
    }

    /** @return array */
    public static function getConstants()
    {
        $oClass = new \ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }

    /** @return array */
    public static function getList()
    {
        return array_values(self::getConstants());
    }

    public function __toString()
    {
        return (string) $this->name;
    }
}
