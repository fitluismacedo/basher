<?php


namespace fitluismacedo\basher\Commands;


class LogIt
{
    public static function greetings($object)
    {
        $object->info('#############');
        $object->info('Init Command');
        $object->info('-------------');
    }

    public static function farewell($object)
    {
        $object->info('-------------');
        $object->info('End Command');
        $object->info('#############');
    }
}