<?php

namespace App\Models\Entities;

class Ingredient {
	private ?string $id;
	private ?string $name;
	private ?string $quantity;

	/**
	 * Get the value of id
	 *
	 * @return mixed
	 */
	public function getId(): mixed {
		return $this->id;
	}

	/**
	 * Set the value of id
	 *
	 * @param mixed $id
	 *
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;

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
}
