async function getDataFromAPI() {
    try {
        const response = await fetch('http://localhost/webApp/js/api.php?action=getAllItems');
        
        if (response.ok) {
           
            const data = await response.json();
            //console.log(data); 
           // console.log("we made it"); 
            // Display the data in the 'output' div
            //console.log("hello"); 
            //document.getElementById('output').textContent = data.getTransID();
            const elements = document.getElementsByClassName('your-class-name');
        } else {
            console.log("im sorry1"); 
            console.error('Failed to fetch data from the API.');
        }
    } catch (error) {
        console.error('An error occurred:', error);
    }
}

getDataFromAPI(); 