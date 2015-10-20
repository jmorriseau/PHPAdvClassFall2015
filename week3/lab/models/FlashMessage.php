<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FlashMessage
 *
 * @author 001305466
 */
class FlashMessage extends Message {

    private $flashMessage = array();

    public function __contruct() {

        if (!isset($_SESSION['flashmessages'])) {
            $_SESSION['flashmessages'] = array();
        }
        
        $this->messages = $_SESSION['flashmessages'];
    }
    
    public function addMessage($key, $msg) {
        parent::addMessage($key, $msg);
        $this->setFlashMessages();
    }
    
    public function removeMessage($key) {
        parent::removeMessage($key);
        $this->setFlashMessages();
    }
    
    public function getAllMessages() {
        $messages = $_SESSION['flashmessages'];
        $this->removeAllMessages();
        return $messages;
    }
    
    public function removeAllMessages() {
        parent::removeAllMessages();
        $this->setFlashMessages();
    }
    
    private function setFlashMessages(){
        $_SESSION['flashmessages'] = $this->messages;
    }
    
    
    
    

}
