function pageStartup() {
    console.log("Page Startup called");

    //Mock data that will be replaced by the axios call to the PHP
    const items = [
        { image: 'images/goldFrame.jpg', title: 'Golden Frame', text: 'This Golden Frame' },
        { image: 'images/woodenFrame.jpg', title: 'Wooden Frame', text: 'This is a Wooden Frame' },
        { image: 'images/blackFrame.avif', title: 'Black Frame', text: 'This is a wooden Frame with black borders' },
        { image: 'images/redFrame.jpg', title: 'Red Wood Frame', text: 'This is a Red Frame.' },
        { image: 'images/woodenFrame.jpg', title: 'Wooden Frame', text: 'This is a Wooden Frame' },
        { image: 'images/blackFrame.avif', title: 'Black Frame', text: 'This is a wooden Frame with black borders.' }
    ]

    //Taking in the data from the php and then creating the table with html

    if (items.length !== 0) {
        let tableHTML = '';

        for (let i = 0; i < items.length; i++) {
            if (i === 0) {
                tableHTML +=    `<div class="row">
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="imageScale">`;
                                            if(items[i].image === 'images/redFrame.jpg'){
                                                tableHTML += `<img src="${items[i].image}" width="250" height="300" alt="Product ${i}">`;
                                            }else{
                                                tableHTML += `<img  src="${items[i].image}" class="card-img-top" alt="Product ${i}">`;
                                            }

                tableHTML +=                                
                                            `</div> 
                                            <div class="card-body">
                                                <h5 class="card-title">${items[i].title}</h5>
                                                <p class="card-text">${items[i].text} </p>
                                                <button type="submit" id="addToCartButton" name="addToCartButton" formaction="buyItem.html">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>`;
            } else if (i % 3 === 0) {
                tableHTML +=    `</div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="imageScale">`;
                                            if(items[i].image === 'images/redFrame.jpg'){
                                                tableHTML += `<img src="${items[i].image}" width="250" height="300" alt="Product ${i}">`;
                                            }else{
                                                tableHTML += `<img  src="${items[i].image}" class="card-img-top" alt="Product ${i}">`;
                                            }

                tableHTML +=                                
                                            `</div> 
                                            <div class="card-body">
                                                <h5 class="card-title">${items[i].title}</h5>
                                                <p class="card-text">${items[i].text} </p>
                                                <button type="submit" id="buyButton" name="buyButton" formaction="buyItem.html">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>`;
            } else {
                tableHTML +=        `<div class="col-md-3">
                                        <div class="card">
                                            <div class="imageScale">`;
                                            if(items[i].image === 'images/redFrame.jpg'){
                                                tableHTML += `<img src="${items[i].image}" width="250" height="300" alt="Product ${i}">`;
                                            }else{
                                                tableHTML += `<img  src="${items[i].image}" class="card-img-top" alt="Product ${i}">`;
                                            }

                tableHTML +=                                
                                            `</div> 
                                            <div class="card-body">
                                                <h5 class="card-title">${items[i].title}</h5>
                                                <p class="card-text">${items[i].text} </p>
                                                <button type="submit" id="buyButton" name="buyButton" formaction="buyItem.html">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>`;
            }
        }

        if(items.length % 3 != 0){
            tableHTML +=        `</div>`;
        }
        
        //Adding the HTML to the element with the id of itemsTable
        tableContainer = document.getElementById('itemsTable');
        tableContainer.innerHTML = tableHTML;
    }
}