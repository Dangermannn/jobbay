const announcement = document.querySelector('.details');
const applyButton = document.getElementById('apply');

const removeApplierButtons = document.querySelectorAll('button[name="remove"]');

function apply(){
    const id = announcement.getAttribute("id");
    console.log("LOG: " + id);

    fetch(`/addUserAsApplier/${id}`)    
        .then(alert("You applied successfully!"));
}

if(applyButton !== null)
    applyButton.addEventListener('click', apply);

if(removeApplierButtons !== null)
{
    removeApplierButtons.forEach(button => {
        button.addEventListener('click', () => {
            const user_id = button.parentElement.getAttribute("id");
            const announcement_id = announcement.getAttribute("id");
            console.log("User: " + user_id);
            console.log("Announcement: " + announcement_id);
            fetch(`/removeUserAppliance/${announcement_id}?user=${user_id}`)
                .then(() => {
                    button.parentElement.remove();
                    alert("Applier has been removed!");
                });
        });
    });
}

