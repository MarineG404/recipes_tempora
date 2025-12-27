document.querySelectorAll('.modal_container').forEach(modalContainer => {
	const modalContent = modalContainer.querySelector('[class*="modal_"][class$="_container"]');

	if (modalContent) {
		const closeBtn = document.createElement('button');
		closeBtn.className = 'modal-close';
		closeBtn.innerHTML = '<i class="ri-close-line"></i>';
		modalContent.style.position = 'relative';
		modalContent.insertBefore(closeBtn, modalContent.firstChild);

		const closeModal = () => {
			modalContainer.classList.remove('active');
		};

		closeBtn.addEventListener('click', closeModal);

		modalContainer.addEventListener('click', (e) => {
			if (e.target === modalContainer) {
				closeModal();
			}
		});

		document.addEventListener('keydown', (e) => {
			if (e.key === 'Escape' && modalContainer.classList.contains('active')) {
				closeModal();
			}
		});
	}
});
