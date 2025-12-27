const createRecipeBtn = document.querySelector('.create_recipe_btn');
const modalContainer = document.querySelector('.modal_container');

if (createRecipeBtn && modalContainer) {
	createRecipeBtn.addEventListener('click', () => {
		modalContainer.classList.add('active');
	});
}

const addIngredientBtn = document.querySelector('.add-ingredient-btn');
const ingredientsContainer = document.querySelector('.ingredients-container');

if (addIngredientBtn && ingredientsContainer) {
	const ingredientsOptions = ingredientsContainer.getAttribute('data-ingredients-options');

	const updateRemoveButtons = () => {
		const rows = ingredientsContainer.querySelectorAll('.ingredient-row');
		rows.forEach((row) => {
			const removeBtn = row.querySelector('.remove-ingredient-btn');
			removeBtn.disabled = rows.length === 1;
		});
	};

	addIngredientBtn.addEventListener('click', () => {
		const newRow = document.createElement('div');
		newRow.className = 'ingredient-row';
		newRow.innerHTML = `
			<input type="text" name="recipe_ingredient_quantity[]" placeholder="${ingredientsContainer.querySelector('input').placeholder}" required />
			<select name="recipe_ingredient_id[]" required>
				<option value="">${ingredientsContainer.querySelector('select option').textContent}</option>
				${ingredientsOptions}
			</select>
			<button type="button" class="remove-ingredient-btn"><i class="ri-close-line"></i></button>
		`;
		ingredientsContainer.appendChild(newRow);
		updateRemoveButtons();

		newRow.querySelector('.remove-ingredient-btn').addEventListener('click', () => {
			newRow.remove();
			updateRemoveButtons();
		});
	});

	document.addEventListener('click', (e) => {
		if (e.target.closest('.remove-ingredient-btn') && !e.target.closest('.remove-ingredient-btn').disabled) {
			e.target.closest('.ingredient-row').remove();
			updateRemoveButtons();
		}
	});

	updateRemoveButtons();
}
