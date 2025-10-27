document.addEventListener('DOMContentLoaded', () => {
  const successMessage = document.getElementById('success-message');
  if (successMessage) {
    setTimeout(() => {
      successMessage.classList.add('opacity-0', 'transition-opacity', 'duration-500');
      setTimeout(() => successMessage.remove(), 500); // remove after fade-out
    }, 2000); // 5 seconds
  }
});
