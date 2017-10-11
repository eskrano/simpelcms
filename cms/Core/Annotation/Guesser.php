<?php

namespace Cms\Core\Annotation;

use Cms\Core\Annotation\Collection\Inject;

class Guesser
{
    /**
     * Guess annotation type
     * @param string $annotation
     * @return bool|mixed
     */
    public function guess(string $annotation)
    {
        foreach ($this->variants() as $detect => $type) {
            if (strpos($annotation, $detect) !==  false) {
                return $type;
            }
        }

        return false;
    }


    /**
     * List of variants for guesser
     * @return array
     */
    private function variants()
    {
        return [
            'Inject' => Inject::class,
        ];
    }
}