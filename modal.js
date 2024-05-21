const modalToggleButtons = document.querySelectorAll('[data-modal-toggle]');
const modalCloseButtons = document.querySelectorAll('[data-modal-hide]');

modalToggleButtons.forEach(button => {
    button.addEventListener('click', () => {
        const targetModal = document.getElementById(button.dataset.modalTarget);
        targetModal.classList.toggle('hidden');
    });
});

modalCloseButtons.forEach(button => {
    button.addEventListener('click', () => {
        const targetModal = document.getElementById(button.dataset.modalHide);
        targetModal.classList.add('hidden');
    });
});