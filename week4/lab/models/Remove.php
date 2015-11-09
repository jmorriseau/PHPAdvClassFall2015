<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Remove
 *
 * @author jmorriseau
 */
class Remove {
    
    public function removeFile($file){
        unlink('./uploads/' . $file);
    }
    
}
