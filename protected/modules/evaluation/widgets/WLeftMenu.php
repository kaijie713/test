<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class WLeftMenu extends CWidget {

 	public $sidebarCaption ;
 	public $menu ; 

    public function run() {
    	// var_dump($this->sidebarCaption);
    	// var_dump($this->menu);
    	// exit();
        $this->render('left_menu',array('sidebarCaption'=> $this->sidebarCaption, 'menu'=>$this->menu));
    }

}