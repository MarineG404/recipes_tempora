<?php

namespace App\Models\Entities;

class Recipe {
	private ?string $uid;

	private User $author;
	private ?string $name;
	private ?string $description;
	// Ingredient's array entity
	private array $ingredients;
	private ?string $steps;
	private ?string $duration;
	private ?int $difficulty;
	private ?string $kitchenware;
	private int $people;
	private ?int $type;

	/**
	 * Get the value of uid
	 *
	 * @return mixed
	 */
	public function getUid(): mixed {
		return $this->uid;
	}

	/**
	 * Set the value of uid
	 *
	 * @param mixed $uid
	 *
	 * @return self
	 */
	public function setUid($uid): self {
		$this->uid = $uid;

		return $this;
	}

	/**
	 * Get the value of author
	 *
	 * @return mixed
	 */
	public function getAuthor(): mixed {
		return $this->author;
	}

	/**
	 * Set the value of author
	 *
	 * @param mixed $author
	 *
	 * @return self
	 */
	public function setAuthor($author): self {
		$this->author = $author;

		return $this;
	}

	/**
	 * Get the value of name
	 *
	 * @return mixed
	 */
	public function getName(): mixed {
		return $this->name;
	}

	/**
	 * Set the value of name
	 *
	 * @param mixed $name
	 *
	 * @return self
	 */
	public function setName($name): self {
		$this->name = $name;

		return $this;
	}

	/**
	 * Get the value of description
	 *
	 * @return mixed
	 */
	public function getDescription(): mixed {
		return $this->description;
	}

	/**
	 * Set the value of description
	 *
	 * @param mixed $description
	 *
	 * @return self
	 */
	public function setDescription($description): self {
		$this->description = $description;

		return $this;
	}

	/**
	 * Get the value of steps
	 *
	 * @return mixed
	 */
	public function getSteps(): mixed {
		return $this->steps;
	}

	/**
	 * Set the value of steps
	 *
	 * @param mixed $steps
	 *
	 * @return self
	 */
	public function setSteps($steps): self {
		$this->steps = $steps;

		return $this;
	}

	/**
	 * Get the value of duration
	 *
	 * @return mixed
	 */
	public function getDuration(): mixed {
		return $this->duration;
	}

	/**
	 * Set the value of duration
	 *
	 * @param mixed $duration
	 *
	 * @return self
	 */
	public function setDuration($duration): self {
		$this->duration = $duration;

		return $this;
	}

	/**
	 * Get the value of kitchenware
	 *
	 * @return mixed
	 */
	public function getKitchenware(): mixed {
		return $this->kitchenware;
	}

	/**
	 * Set the value of kitchenware
	 *
	 * @param mixed $kitchenware
	 *
	 * @return self
	 */
	public function setKitchenware($kitchenware): self {
		$this->kitchenware = $kitchenware;

		return $this;
	}

	/**
	 * Get the value of people
	 *
	 * @return mixed
	 */
	public function getPeople(): mixed {
		return $this->people;
	}

	/**
	 * Set the value of people
	 *
	 * @param mixed $people
	 *
	 * @return self
	 */
	public function setPeople($people): self {
		$this->people = $people;

		return $this;
	}

	/**
	 * Get the value of difficulty
	 *
	 * @return mixed
	 */
	public function getDifficulty(): mixed {
		return $this->difficulty;
	}

	/**
	 * Set the value of difficulty
	 *
	 * @param mixed $difficulty
	 *
	 * @return self
	 */
	public function setDifficulty($difficulty): self {
		$this->difficulty = $difficulty;

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

	/**
	 * Get the value of type
	 *
	 * @return mixed
	 */
	public function getType(): mixed {
		return $this->type;
	}

	/**
	 * Set the value of type
	 *
	 * @param mixed $type
	 *
	 * @return self
	 */
	public function setType($type): self {
		$this->type = $type;

		return $this;
	}
}
