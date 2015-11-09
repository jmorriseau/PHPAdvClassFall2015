<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FileUpload
 *
 * @author 001305466
 */
class DeleteFile {

public function deleteFile($file) {
      unlink('./uploads/' . $file);
}
      
    

}
