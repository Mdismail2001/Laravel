document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById('taskModal');
  const cancelBtn = document.getElementById('cancelTaskModal');
  const form = document.getElementById('taskForm');
  const nameInput = document.getElementById('taskName');
  const descInput = document.getElementById('taskDescription');
  const modalTitle = document.getElementById('taskModalTitle');
  const submitBtn = document.getElementById('taskSubmitBtn');

  // Show modal for CREATE
  window.showCreateModal = function (createUrl) {
    modalTitle.textContent = 'Add New Task';
    submitBtn.textContent = 'Create Task';
    form.action = createUrl;
    form.method = 'POST';

    // reset values
    nameInput.value = '';
    descInput.value = '';

    modal.classList.remove('hidden');
    modal.classList.add('flex');
  };

  // Show modal for EDIT
  window.showEditModal = function (editUrl, name, description) {
    modalTitle.textContent = 'Edit Task';
    submitBtn.textContent = 'Update Task';
    form.action = editUrl;

    // remove old PUT if any
    const oldMethod = form.querySelector('input[name="_method"]');
    if (oldMethod) oldMethod.remove();

    // add PUT method
    const methodInput = document.createElement('input');
    methodInput.type = 'hidden';
    methodInput.name = '_method';
    methodInput.value = 'POST';
    form.appendChild(methodInput);

    nameInput.value = name;
    descInput.value = description;

    modal.classList.remove('hidden');
    modal.classList.add('flex');
  };

  // Close modal
  cancelBtn.addEventListener('click', () => {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
  });
});
