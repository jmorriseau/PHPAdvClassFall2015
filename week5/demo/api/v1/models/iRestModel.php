<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author 001305466
 */
interface iRestModel {
    //put your code here
    function getAll();
    
    function get($id);
    
    function post();
    
    function put($id);
    
    function delete($id);
    
    
    
    
}
