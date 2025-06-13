document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('bukuTamuForm');
    const listTamu = document.getElementById('listTamu');

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const nama = document.getElementById('nama').value;
        const email = document.getElementById('email').value;
        const pesan = document.getElementById('pesan').value;

        const li = document.createElement('li');
        li.className = 'list-group-item';
        li.innerHTML = `<strong>${nama}</strong> (${email})<br><span>${pesan}</span>`;
        listTamu.prepend(li);

        form.reset();
    });
});
