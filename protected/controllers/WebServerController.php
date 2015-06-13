<?php
/******************************
 * @author sara zhou
* create time 2014-06-25 16:00:00
* YII框架API接口端的server (基于Webservice的接口服务器端)
* 注意php.ini开启soap扩展:extension=php_soap.dll
*******************************
*/
class WebServerController extends CController
{

    public function actions()
    {
        return array(
            'quote'=>array(
                'class'=>'CWebServiceAction',
            ),
        );
    }


    /**
     * @param string the symbol of the stock
     * @return string the stock price
     * @soap
     */
    public function getPrice($symbol)
    {
        $prices=array('IBM'=>100, 'GOOGLE'=>350);
        return CJSON::encode($prices);
        return isset($prices[$symbol]) ? $prices[$symbol] : 0;
        //...return stock price for $symbol
    }

     /**
     * @param string the symbol of the stock
     * @return float the stock price
     * @soap
     */
    public function getA()
    {
        return 111;
    }

     /**
     * @param string the symbol of the stock
     * @return float the stock price
     * @soap
     */
    public function getB()
    {
        return 111;
    }

     /**
     * @param string the symbol of the stock
     * @return float the stock price
     * @soap
     */
    public function getC()
    {
        return 111;
    }
}

