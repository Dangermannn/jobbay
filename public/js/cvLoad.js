const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const email = urlParams.get('email')

const showCvButton = document.querySelector('button[name="show-cv"]');



console.log("COS ROBIE");
showCvButton.addEventListener('click', (event) => {
    const data = {emailToSearch: email};
    console.log(email);
    fetch("/getCv", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function(response){
        return new Blob([response.blob], { type: 'application/pdf'});
    }).then(function(data){
            try{
                loadCv(data);
                console.log('after reading data');
                const url = window.URL.createObjectURL(data);
                const a = document.createElement('a');
                a.style.display = 'none';
                a.href = url;
                a.download = "cv123.pdf";
                document.body.appendChild(a);
                a.click();
                window.URL.revokeObjectURL(url);
                alert('file is downloading');
            }catch(e){
                alert('That user probably have not uploaded his cv');
            }

        }).catch(() => {
            alert('Unknown error occured!');
        });
});

function loadCv(data){
    console.log("DATA:")
    console.log("T: " + data); 
}