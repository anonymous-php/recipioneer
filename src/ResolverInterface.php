<?php

namespace Anonymous\Recipioneer;


interface ResolverInterface
{

    public function resolveIngredient($ingredient, $params = []);

}