<?php

require_once 'Stack.php';

/**
 * postfixExpressionEvaluation
 *
 * @param string $expression
 * @return string
 */
function postfixExpressionEvaluation ( string $expression ): string
{
    $expressionInArray = str_split( str_replace( ' ', '', $expression ) );

    return getExpressionResult( $expressionInArray );
}

/**
 * prefixExpressionEvaluation
 *
 * @param string $expression
 * @return string
 */
function prefixExpressionEvaluation ( string $expression ): string
{
    $expressionInArray = array_reverse( str_split( str_replace( ' ', '', $expression ) ) );

    return getExpressionResult( $expressionInArray );
}

/**
 * getExpressionResult
 *
 * @param array $expressionInArray
 * @return string
 */
function getExpressionResult ( array $expressionInArray ): string
{
    $stack = new Stack();

    foreach ( $expressionInArray as $index => $charInExpression ) 
    {
        if ( is_numeric( $charInExpression ) )
        {
            $stack->push( $charInExpression );
        }
        else
        {
            $operand2 = $stack->pop();

            $operand1 = $stack->pop();


        }
    }

    return $stack->peek();
}

echo postfixExpressionEvaluation( '2 3 *' );