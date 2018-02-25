<?php

namespace Anonymous\Recipioneer;


class Recipe implements RecipeInterface
{

    protected $ingredients = [];


    public function __construct(array $arguments = [])
    {
        $this->setIngredients($arguments);
    }

    public function setIngredients(array $ingredients)
    {
        $this->ingredients = $ingredients;
    }

    public function process(ResolverInterface $resolver)
    {
        foreach ($this->ingredients as $ingredientName => $arguments) {
            /** @var IngredientInterface $ingredient */
            $ingredient = $resolver->resolveIngredient($ingredientName, $arguments);

            if (!$ingredient->process($resolver)) {
                return false;
            }
        }

        return true;
    }

}