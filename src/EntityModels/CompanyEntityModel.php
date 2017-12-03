<?php
/**
 * Created by PhpStorm.
 * User: haris
 * Date: 3.12.17
 * Time: 17:23
 */

namespace Parkiraga\EntityModels;


class CompanyEntityModel
{
    public $name;
    public $address;
    public $capacity;
    public $places_taken;
    public $cost_per_hour;
    public $user_id;

    public function __construct($name, $address, $capacity, $places_taken, $cost_per_hour, $user_id)
    {
        $this->name = $name;
        $this->address = $address;
        $this->capacity = $capacity;
        $this->places_taken = $places_taken;
        $this->cost_per_hour = $cost_per_hour;
        $this->user_id = $user_id;
    }
}
