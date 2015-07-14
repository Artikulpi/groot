<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class G_mptt 
{
    function __construct() 
    {
        include "./vendor/stefangabos/Zebra_mptt/Zebra_Mptt.php";
    }
}