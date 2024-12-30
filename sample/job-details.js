document.getElementById('apply-form').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent form submission

    const formData = new FormData(this);
    const status = document.getElementById('apply-status');

    fetch('apply-job.php', {
        method: 'POST',
        body: formData,
    })
        .then((response) => response.text())
        .then((data) => {
            status.textContent = 'Application submitted successfully!';
            status.style.color = 'green';
        })
        .catch((error) => {
            status.textContent = 'An error occurred. Please try again.';
            status.style.color = 'red';
        });
});
