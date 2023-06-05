<?php

/* Parent Controller for our moduler based controllers */

class MY_Controller extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper("dd_helper");

        // $this->load->module(array("school", "string/mystring"));
        $this->load->module("template");
    }
}
