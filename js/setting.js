// Sending data using GET method
fetch('process.php?username=exampleUser&email=user@example.com', {
    method: 'GET',
})
.then(response => response.json()) // Assuming the PHP response is JSON
.then(result => {
    console.log('Success:', result); // Process the response
})
.catch(error => {
    console.error('Error:', error);
});



function PostData() {
    document.getElementById('').addEventListener('submit', function(event){
        event.preventDefault();
    
    const data = {
        postTitle : document.getElementById("title").value,
        postTags : document.getElementById("tags").value,
        postBody : document.getElementById("Body"),
        banner_image : document.getElementById("image").src
    };

    fetch('setting.php', {
        method : 'POST',
        headers :{
            'Content-Type': 'application/json',
        },
        body:JSON.stringify(data)
    })
    .then(response => response.json())
    .then(result =>{
        Console.log('success', result);
        if (result.status === "success") {
            document.getElementById('').reset();
        }
    })
    .catch(error => {
        console.error('Error', error)
    });
}
)};

function Fetching() {
    document.getElementById('').addEventListener('load', function(event){
        event.preventDefault();
   fetch('setting.php',{
    method:"POST",
    body : JSON.stringify({id: "id"})
   })
   .then(response => response.json())
   .then(userdata =>{
    document.getElementsByName('id').value = userdata.id;
    document.getElementsByName('email').value = userdata.email;
    document.getElementsByName('surname').value = userdata.surname;
    document.getElementsByName('firstname').value = userdata.firstname;
    document.getElementsByName('gender').value = userdata.gender;
    document.getElementsByName('phone_number').value = userdata.phone_number;
   });
})
}


