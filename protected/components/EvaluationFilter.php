<?php
class EvaluationFilter
{
    public static function evaluation($params)
    {
        $condition[] = "isactive = '1'";
        if ($condition) return implode(' AND ',$condition);
        return '';
    }
} 