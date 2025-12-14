<?php

namespace App\Models\Entities;


class RecipeIngredients {
	private Recipe $recipe;
	private ?array $ingredients;
	private ?string $quantity;

	/**
	 * Get the value of recipe
	 *
	 * @return mixed
	 */
	public function getRecipe(): mixed {
		return $this->recipe;
	}

	/**
	 * Set the value of recipe
	 *
	 * @param mixed $recipe
	 *
	 * @return self
	 */
	public function setRecipe($recipe): self {
		$this->recipe = $recipe;

		return $this;
	}


	/**
	 * Get the value of quantity
	 *
	 * @return mixed
	 */
	public function getQuantity(): mixed {
		return $this->quantity;
	}

	/**
	 * Set the value of quantity
	 *
	 * @param mixed $quantity
	 *
	 * @return self
	 */
	public function setQuantity($quantity): self {
		$this->quantity = $quantity;

		return $this;
	}

	/**
	 * Get the value of ingredients
	 *
	 * @return array
	 */
	public function getIngredients(): array {
		return $this->ingredients;
	}

	/**
	 * Set the value of ingredients
	 *
	 * @param array $ingredients
	 *
	 * @return self
	 */
	public function setIngredients(array $ingredients): self {
		$this->ingredients = $ingredients;

		return $this;
	}
}
