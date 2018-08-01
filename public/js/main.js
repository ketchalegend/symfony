const hubotfaq  = document.getElementById('hubotfaq');

if (hubotfaq) {
    hubotfaq.addEventListener('click', e => {
        if (e.target.className  === 'btn btn-danger delete-article'){
           if (confirm('Bist du dir sicher ?')) {
              const id = e.target.getAttribute('data-id');

              fetch(`/delete/${id}`, {
                  method: 'DELETE'
              }).then(res => window.location.reload());
           }
        }
    });
}