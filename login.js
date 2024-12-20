document.getElementById('role').addEventListener('change', function(){
    const Value = this.value;
    const User = document.getElementById('customer');
    const Rider =document.getElementById('riders');

    if (Value === 'customer') {
        document.getElementById('login-form').addEventListener('submit', async(e) => {
            e.preventDefault();
            const email =document.getElementById('emailPhone').value;
            const password =document.getElementById('password').value;
    
            const response =await fetch('login_Authenticate.php', {
                method : 'POST',
                headers :{
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({email, password})
            });
    
            const data = await response.json();
            if (data.success) {
                localStorage.setItem('loggedIn', 'true');
                sessionStorage.setItem('id', data.id);
    
                sessionStorage.setItem('surname', data.surname);
                sessionStorage.setItem('firstname', data.firstname);
                sessionStorage.setItem('email', data.email);
                sessionStorage.setItem('gender', data.gender);
                sessionStorage.setItem('phone_number', data.phone_number);
                window.location.href = "index.php";
                
            }else{
                alert(data.error);
            }
    
            
        })
    } else if ( Value === 'rider'){
        document.getElementById('login-form').addEventListener('submit', async(e) => {
            e.preventDefault();
            const email =document.getElementById('emailPhone').value;
            const password =document.getElementById('password').value;
    
            const response =await fetch('login_Authenticate.php', {
                method : 'POST',
                headers :{
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({email, password})
            });
    
            const data = await response.json();
            if (data.success) {
                localStorage.setItem('loggedIn', 'true');
                sessionStorage.setItem('id', data.id);
    
                sessionStorage.setItem('surname', data.surname);
                sessionStorage.setItem('firstname', data.firstname);
                sessionStorage.setItem('email', data.email);
                sessionStorage.setItem('gender', data.gender);
                sessionStorage.setItem('phone_number', data.phone_number);
                window.location.href = "index.php";
                
            }else{
                alert(data.error);
            }
    
            
        })
    }
});





    document.getElementById('role').addEventListener('change', function(){
        const Value = this.value;
        const User = document.getElementById('customer');
        const Rider =document.getElementById('riders');

        if (Value === 'customer') {
            User.hidden = false;
            Rider.hidden = true;
        } else if ( Value === 'rider'){
            User.hidden = true;
            Rider.hidden = false;
        }
    });



