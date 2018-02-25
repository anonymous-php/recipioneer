<?php

namespace Anonymous\Recipioneer;


interface RecipeInterface extends IngredientInterface
{

    public function setIngredients(array $ingredients);

}