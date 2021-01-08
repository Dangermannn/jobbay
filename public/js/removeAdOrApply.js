const removeButtons = document.querySelectorAll('button[name="remove"]');
const disapplyButton = document.querySelectorAll('button[name="disapply"]');


removeButtons.forEach(button => {
    button.addEventListener('click', () => {
        const id = button.parentElement.parentElement.getAttribute("id");
        fetch(`/removeAnnouncement/${id}`)
            .then(alert("Announcement has been removed successfully!"));
    });
});


disapplyButton.forEach(button => {
    button.addEventListener('click', () => {
        const id = button.parentElement.parentElement.getAttribute("id");
        fetch(`/removeApplier/${id}`)
            .then(alert("Announcement has been removed successfully!"));
    });
});