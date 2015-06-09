<?php
/**
 * ID 生成策略
 * 毫秒级时间41位+机器ID 10位+毫秒内序列12位。
 * 0           41     51     64
 * +-----------+------+------+
 * |time       |pc    |inc   |
 * +-----------+------+------+
 *  前41bits是以微秒为单位的timestamp。
 *  接着10bits是事先配置好的机器ID。
 *  最后12bits是累加计数器。
 *  macheine id(10bits)标明最多只能有1024台机器同时产生ID，
 *  sequence number(12bits)也标明1台机器1ms中最多产生4096个ID，
 *
 * auth: zhouyuan24@gmail.com
 */
class idwork
{
    const debug = 1;
    static $workerId;
    static $twepoch = 1399943202863;  //twepoch配置项是一个64位的整数, 用于设置时间戳基数, 此值越大, 生成的ID越小;
    static $sequence = 0;
    const workerIdBits = 4; //机器标识位数
    static $maxWorkerId = 15; //数据中心标识位数
    const sequenceBits = 10; //毫秒内自增位
    static $workerIdShift = 10; //机器ID偏左移10位
    static $timestampLeftShift = 14; //时间毫秒左移22位
    static $sequenceMask = 1023;
    private  static $lastTimestamp = -1;


    /**
     * @var idwork
     */
    private static $self = NULL;

    /**
     * @static
     * @return idwork
     */

    public static function getInstance()
    {
        if (self::$self == NULL) {
            self::$self = new self();
        }
        return self::$self;
    }

    function __construct($workId=1){
        if($workId > self::$maxWorkerId || $workId< 0 )
        {
            throw new Exception("worker Id can't be greater than 15 or less than 0");
        }
        self::$workerId=$workId;
    }

    function timeGen(){
        //获得当前时间戳
        $time = explode(' ', microtime());
        $time2= substr($time[0], 2, 3);
        return  $time[1].$time2;
    }

    function  nextId()
    {
        $timestamp=$this->timeGen();
        if(self::$lastTimestamp == $timestamp) {
            self::$sequence = (self::$sequence + 1) & self::$sequenceMask;
            if (self::$sequence == 0) {
                $timestamp = $this->tilNextMillis(self::$lastTimestamp);
            }
        } else {
            self::$sequence  = 0;
        }
        if ($timestamp < self::$lastTimestamp) {
            throw new Excwption("Clock moved backwards.  Refusing to generate id for ".(self::$lastTimestamp-$timestamp)." milliseconds");
        }
        self::$lastTimestamp  = $timestamp;
        $nextId = ((sprintf('%.0f', $timestamp) - sprintf('%.0f', self::$twepoch)  )<< self::$timestampLeftShift ) | ( self::$workerId << self::$workerIdShift ) | self::$sequence;
        return $nextId;
    }

    private  function  tilNextMillis($lastTimestamp) {
        $timestamp = $this->timeGen();
        while ($timestamp <= $lastTimestamp) {
            $timestamp = $this->timeGen();
        }

        return $timestamp;
    }
}
    // $Idwork = new idwork();
    // $a= $Idwork->nextId();

// 528584156529696
// 528584156529697
// 528584156529698
// 528584156529699
// 528584156529700
// 528584156529701
// 528985817826304
// 528985817826305
// 528985817826306
// 528985817826307
// 528985817826308
// 528985817826309
// 528985817826310
// 528985817826311
// 528985817826312
// 528985817826313
// 528985817826314
// 528985817826315
// 528985817826316
// 528985817826317
// 528985817826318
// 528985817842688
// 528985817842689
// 528985817842690
// 528985817842691
// 528985817842692
// 528985817842693
// 528985817842694
// 528985817842695
// 528985817842696
// 528985817842697
// 528985817842698
// 528985817842699
// 528985817842700
// 528985817842701
// 528985817842702
// 528985817842703
// 528985817842704
// 528985817842705
// 528985817842706
// 528985817842707
// 528985817842708
// 528985817842709
// 528985817842710
// 528985817842711
// 528985817842712
// 528985817842713
// 528985817842714
// 528985817842715
// 528985817842716
// 528985817842717
// 528985817842718
// 528985817842719
// 528985817842720
// 528985817842721
// 528985817842722
// 528985817842723
// 528985817842724
// 528985817842725
// 528985817842726
// 528985817842727
// 528985817842728
// 528985817842729
// 528985817842730
// 528985817859072
// 528985817859073
// 528985817859074
// 528985817859075
// 528985817859076
// 528985817859077
// 528985817859078
// 528985817859079
// 528985817859080
// 528985817859081
// 528985817859082
// 528985817859083
// 528985817859084
// 528985817859085
// 528985817859086
// 528985817859087
// 528985817859088
// 528985817859089
// 528985817859090
// 528985817859091
// 528985817859092
// 528985817859093
// 528985817859094
// 528985817859095
// 528985817859096
// 528985817859097
// 528985817859098
// 528985817859099
// 528985817859100
// 528985817859101
// 528985817859102
// 528985817859103
// 528985817859104
// 528985817859105
// 528985817859106
// 528985817859107
// 528985817859108
// 528985817859109
// 528985817859110
// 528985817859111
// 528985817859112
// 528985817875456
// 528989983310848
// 528989983310849
// 528989983310850
// 528989983310851
// 528989983310852
// 528989983310853
// 528989983310854
// 528989983310855
// 528989983310856
// 528989983310857
// 528989983310858
// 528989983310859
// 528989983310860
// 528989983310861
// 528989983310862
// 528989983310863
// 528989983310864
// 528989983310865
// 528989983310866
// 528989983310867
// 528989983310868
// 528989983310869
// 528989983310870
// 528989983310871
// 528989983310872
// 528989983310873
// 528989983310874
// 528989983310875
// 528989983310876
// 528989983310877
// 528989983310878
// 528989983310879
// 528989983310880
// 528989983310881
// 528989983310882
// 528989983310883
// 528989983310884
// 528989983310885
// 528989983310886
// 528989983310887
// 528989983310888
// 528989983310889
// 528989983310890
// 528989983310891
// 528989983310892
// 528989983310893
// 528989983310894
// 528989983310895
// 528989983310896
// 528989983310897
// 528989983310898
// 528989983310899
// 528989983310900
// 528989983310901
// 528989983310902
// 528989983310903
// 528989983310904
// 528989983310905
// 528989983310906
// 528989983310907
// 528989983310908
// 528989983310909
// 528989983310910
// 528989983310911
// 528989983310912
// 528989983310913
// 528989983310914
// 528989983310915
// 528989983310916
// 528989983310917
// 528989983310918
// 528989983327232
// 528989983327233
// 528989983327234
// 528989983327235
// 528989983327236
// 528989983327237
// 528989983327238
// 528989983327239
// 528989983327240
// 528989983327241
// 528989983327242
// 528989983327243
// 528989983327244
// 528989983327245
// 528989983327246
// 528989983327247
// 528989983327248
// 528989983327249
// 528989983327250
// 528989983327251
// 528989983327252
// 528989983327253
// 528989983327254
// 528989983327255
// 528989983327256
// 528989983327257
// 528989983327258
// 528989983327259
// 528989983327260
