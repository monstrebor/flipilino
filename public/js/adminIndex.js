
    document.querySelectorAll('.editBtn').forEach(button => {
        button.addEventListener('click', function () {
            const name = this.getAttribute('data-name');
            const email = this.getAttribute('data-email');
            const userId = this.getAttribute('data-id');

            document.getElementById('editName').value = name;
            document.getElementById('editEmail').value = email;
            document.getElementById('editUserId').value = userId;
        });
    });
