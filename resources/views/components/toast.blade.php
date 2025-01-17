<div id="toast" class="fixed top-5 right-5 z-50 px-6 py-4 rounded-lg shadow-xl text-md font-semibold text-white 
    {{ $type === 'success' ? 'bg-green-500' : 'bg-red-500' }}" role="alert">
  {{ $message }}
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
        const toast = document.getElementById('toast');
        setTimeout(() => {
            toast.classList.add('opacity-0');
            setTimeout(() => toast.remove(), 500); 
        }, 4000);
    });
</script>