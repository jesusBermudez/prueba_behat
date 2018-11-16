<?php

namespace src;

trait ResourcesTrait
{
    protected $resourcesTrait = [
        'gb' => [
            'FeatureContext' => [
            ],
            'HomeContext' => [
                'wordSearch' => 'tie%20for%20men',
            ],
            'ProductSheetContext' => [
            ],
            'CartContext' => [
            ],
        ]
    ];

    /**
     * @param $context
     * @param $parameters
     *
     * @return array
     */
    public function getResourceParameters($context, $parameters)
    {
        if (!empty($this->resourcesTrait['gb'][$context])) {
            $result = array_merge($parameters, $this->resourcesTrait['gb'][$context]);
        } else {
            $result = $parameters;
        }

        return $result;
    }
}
