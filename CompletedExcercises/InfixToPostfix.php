<?php

require_once 'Stack.php';

function InfixToPostfix(string $infixExpression): string
{
    $dehydratedInfixExpression = str_replace(' ', '', $infixExpression);

    $arrayOfInfixExpressionChars = str_split($dehydratedInfixExpression);

    $postfixExpression = '';

    $stack = new LinkedListStack();

    foreach ($arrayOfInfixExpressionChars as $index => $char) {
        if (isOperator($char)) {
            $stack->push($char);
        } elseif (isOpeningParentheses($char)) {
            $stack->push($char);
        } elseif (isClosingParenthese($char)) {
            while (!$stack->empty() && !isOpeningParentheses($stack->peek()->data)) {
                $postfixExpression .= $stack->pop();
            }
            $stack->pop();
        } else {
            $postfixExpression .= $char;
        }
    }

    while (!$stack->empty()) {
        $postfixExpression .= $stack->pop();
    }

    return $postfixExpression;
}

function isOpeningParentheses(string $char): bool
{
    switch ($char) {
        case '(':
        case '{':
        case '[':
            return true;
        default:
            return false;
            break;
    }
}

function isClosingParenthese(string $char): bool
{
    switch ($char) {
        case ')':
        case '}':
        case ']':
            return true;
        default:
            return false;
            break;
    }
}

function hasHigherPrecedence(string $stackOperator, string $operator): bool
{
    $arithmeticOperatorsArrangedInOrderOfPrecedence = arithmeticOperatorsArrangedInOrderOfPrecedence();

    return $arithmeticOperatorsArrangedInOrderOfPrecedence[$stackOperator] <= $arithmeticOperatorsArrangedInOrderOfPrecedence[$operator];
}

function arithmeticOperatorsArrangedInOrderOfPrecedence(): array
{
    return [
        '*' => 0,
        '/' => 0,
        '%' => 0,
        '+' => 1,
        '-' => 1,
    ];
}

function operators(): array
{
    return array_keys(arithmeticOperatorsArrangedInOrderOfPrecedence());
}

function isOperator(string $char): bool
{
    return in_array($char, operators());
}

echo InfixToPostfix('A + B * C - D * E');

echo "<br>";

echo InfixToPostfix('( ( A + B ) * C - D ) * E');
