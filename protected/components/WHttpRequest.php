<?php

class WHttpRequest extends CHttpRequest {

    public $noCsrfValidationRoutes = array();

    /**
    * Normalizes the request data.
    * This method strips off slashes in request data if get_magic_quotes_gpc() returns true.
    * It also performs CSRF validation if {@link enableCsrfValidation} is true.
    */
    protected function normalizeRequest()
    {
        parent::normalizeRequest();
        if ($this->getIsPostRequest() && $this->enableCsrfValidation && $this->checkPaths() !== false)
                Yii::app()->detachEventHandler('onbeginRequest', array($this, 'validateCsrfToken'));
    }
    
    /**
    * Checks if current route should be validated by validateCsrfToken()
    * @return boolean true if current route should be validated 
    */
    private function checkPaths() {
        $route = implode('/', array_slice(explode('/', Yii::app()->getUrlManager()->parseUrl($this)), 0, 2));
        return array_search($route, $this->noCsrfValidationRoutes)===false?false:true;
    }
}