<?php

namespace Core;

class Validation
{
    public static function validate($data, $rules)
    {
        $errors = [];
        foreach ($rules as $field => $rule) {
            try {
                $rule->check($data[$field]);
            } catch (\Respect\Validation\Exceptions\ValidationException $e) {
                $errors[$field] = $e->getMessage();
            }
        }
        return $errors;
    }
}
