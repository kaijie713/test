<?php
class PostController extends CController
{


    public function actionTest()
    {
        $client=new SoapClient('http://www.yii-sohu.com/index.php?r=webServer/quote&aa='.time());
 
        echo $client->getA();
        echo $client->getB();
        echo $client->getC();
        echo $client->getPrice('GOOGLE');
    }




}
