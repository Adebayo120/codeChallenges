<?php

require_once "Queue.php";

class Weave {

    /**
     * action
     *
     * @param Queue $firstInstance
     * @param Queue $secondInstance
     * @return Queue
     */
    public function action ( Queue $firstInstance, Queue $secondInstance )
    {
        $q = new Queue();

        while ( $firstInstance->peek() || $secondInstance->peek() ) {
            if ( $firstInstance->peek() )
            {
                $q->add( $firstInstance->remove() );
            }

            if ( $secondInstance->peek() )
            {
                $q->add( $secondInstance->remove() );
            }
        }

        return $q;
    }
}

$weave = new Weave();

$firstInstance = new Queue();

$firstInstance->add( 2 );

$secondInstance = new Queue();

$secondInstance->add( 1 );

$weave->action( $firstInstance, $secondInstance );