<?php

namespace Anonymous\Recipioneer;


class Ingredient implements IngredientInterface
{

    public function process(ResolverInterface $resolver)
    {
        return true;
    }

}