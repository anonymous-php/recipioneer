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
        foreach ($this->ingredients as $ingredientData) {
            $ingredientName = key($ingredientData);
            $arguments = current($ingredientData);

            /** @var IngredientInterface $ingredient */
            $ingredient = $resolver->resolveIngredient($ingredientName, $arguments);

            if (!$ingredient->process($resolver)) {
                return false;
            }
        }

        return true;
    }

}