
Livewire.on('closeModal', function (workerId) {
    let modal = document.querySelector('#updateWorker-' + workerId);
    modal.classList.remove('show');
    modal.style.display = 'none';
    var modalBackdrop = document.querySelector('.modal-backdrop');
    modalBackdrop.parentNode.removeChild(modalBackdrop);
});