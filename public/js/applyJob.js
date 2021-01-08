const announcement = document.querySelector('.details');
const applyButton = document.getElementById('apply');

function apply(){
    const id = announcement.getAttribute("id");
    console.log("LOG: " + id);

    fetch(`/addUserAsApplier/${id}`)    
        .then(alert("You applied successfully!"));
            
}

applyButton.addEventListener('click', apply);