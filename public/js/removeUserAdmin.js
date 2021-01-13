const body = document.querySelectorAll('tbody');

body.forEach(item => {
    item.innerHTML = item.innerHTML.trim();
});

const removeButtons = document.querySelectorAll('button[name="remove"]');

removeButtons.forEach(button => {
    button.addEventListener('click', () => {
        console.log('listener')
        if(!window.confirm("Do you really want to remove that user?"))
            return;
        console.log('after log');
        const email = button.parentElement.parentElement.getAttribute("id");
        fetch(`/removeUser/${email}`)
            .then(() => {
                alert('User has been removed!');
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