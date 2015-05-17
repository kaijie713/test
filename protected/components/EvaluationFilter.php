<?php
/**
 * 列表筛选
 */
class EvaluationFilter
{
    /**
     * 商品筛选
     *
     * @param $params
     * @return string
     */
    public static function evaluation($params)
    {
        

        $condition[] = "isactive = '1'";
        if ($condition) return implode(' AND ',$condition);
        return '';
    }
} 