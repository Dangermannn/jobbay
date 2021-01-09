const body = document.querySelectorAll('tbody');

body.forEach(item => {
    item.innerHTML = item.innerHTML.trim();
});

const removeButtons = document.querySelectorAll('button[name="remove"]');
const disapplyButton = document.querySelectorAll('button[name="disapply"]');

removeButtons.forEach(button => {
 
      button.addEventListener('click', () => {
        const id = button.parentElement.parentElement.getAttribute("id");
        fetch(`/removeAnnouncement/`)
            .then(() => {
                alert("Announcement has been removed successfully!");
                const html = '<tr><td colspan="6">You have not applied to any job</td></tr>';
                handleDom(button, html);
            });
    });
});

disapplyButton.forEach(button => {
    button.addEventListener('click', () => {
        const id = button.parentElement.parentElement.getAttribute("id");
        fetch(`/removeApplier/`)
            .then(() => {
                alert("Announcement has been removed successfully!");
                const html = '<tr><td colspan="6">You have not applied to any job</td></tr>';
                handleDom(button, html);
            });
    });
});

function handleDom(tableItem, html){
    const item = tableItem.parentElement.parentElement.parentElement;
    tableItem.parentElement.parentElement.remove();
    if(!item.hasChildNodes()){
        item.insertAdjacentHTML('afterbegin', html);
    }
}