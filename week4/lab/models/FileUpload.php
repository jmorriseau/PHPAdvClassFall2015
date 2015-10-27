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
class FileUpload {

//    function upload($keyName) {
//        try {
//
//            echo 'File is uploaded successfully.';
//        } catch (RuntimeException $e) {
//
//            echo $e->getMessage();
//        }
//    }

    private function isValidParams($keyName) {
        if (!isset($_FILES[$keyName]['error']) || is_array($_FILES[$keyName]['error'])) {
            throw new RuntimeException('Invalid parameters.');
        }

        // Check $_FILES[$keyName]['error'] value.
        switch ($_FILES[$keyName]['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
        }
    }

    private function isValidSize($keyName) {
        // You should also check filesize here. 
        if ($_FILES[$keyName]['size'] > 10000000000) {
            throw new RuntimeException('Exceeded filesize limit.');
        }
    }
    private function isValidFileType($keyName){
        // DO NOT TRUST $_FILES[$keyName]['mime'] VALUE !!
            // Check MIME Type by yourself.
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $validExts = array(
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
                'gif' => 'image/gif',
                'pjpeg' => 'image/pjpeg',
                'txt' => 'text/plain',
                'htm' => 'text/html',
                'pdf' => 'application/pdf',
                'doc' => 'application/msword',
                'xls' => 'application/vnd.ms-excel'
                
            );
            $ext = array_search($finfo->file($_FILES[$keyName]['tmp_name']), $validExts, true);
            
            if (false === $ext) {
                throw new RuntimeException('Invalid file format.');
            }
            else {
                $this->setFileName($ext, $keyName);
            }
    }
    
    private function setFileName($ext, $keyName){
        // You should name it uniquely.
            // DO NOT USE $_FILES[$keyName]['name'] WITHOUT ANY VALIDATION !!
            // On this example, obtain safe unique name from its binary data.

            $fileName = sha1_file($_FILES[$keyName]['tmp_name']);
            $location = sprintf('./uploads/%s.%s', $fileName, $ext);
            $this->moveFile($location, $keyName);
    }
    
    private function moveFile($location, $keyName){
        if (!is_dir('./uploads')) {
                mkdir('./uploads');
            }

            if (!move_uploaded_file($_FILES[$keyName]['tmp_name'], $location)) {
                throw new RuntimeException('Failed to move uploaded file.');
            }
    }

    public function addFile($keyName) {
        $this->isValidParams($keyName);
        $this->isValidSize($keyName);
        
        $this->isValidFileType($keyName);
        
//        $this->upload($keyName);
    }

}
