<?php
class EvaluationFilter
{
    public static function evaluation($params)
    {
        $condition[] = "isactive = '0'";
        if ($condition) return implode(' AND ',$condition);
        return '';
    }
} 