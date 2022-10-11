<?php


require_once 'Stack.php';

/**
 * CheckForBalanceParantheses
 *
 * @param string $string
 * @return boolean
 */
function CheckForBalanceParantheses( string $string ): bool
{
    $stackOfOpeningParenthese = new ArrayStack2();

    $stringInArray = str_split( $string );

    foreach ( $stringInArray as $index => $char ) 
    {
        switch ( $char )
        {
            case '(':
            case '{':
            case '[':
                $stackOfOpeningParenthese->push( $char );
                break;
            case ')':
            case '}':
            case ']':
                    if ( $stackOfOpeningParenthese->empty() || $stackOfOpeningParenthese->peek() != getPair($char) )
                    {
                        return false;
                    }
                    else
                    {
                        $stackOfOpeningParenthese->pop();
                    }
                break;
            default:
                break;
        }
    }

    return $stackOfOpeningParenthese->empty();
}

function arrayOfPairs(): array
{
    return [
        ')' => '(',
        '}' => '{',
        ']' => '[',
    ];
}

function getPair(string $char): string
{
    return arrayOfPairs()[$char];
}

echo CheckForBalanceParantheses( '{adam(jamiu)}' );

print_r( str_split( 'a d a m j' ) );