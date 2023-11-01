let currItem = {};
let currListOfItems = [];

function pageStartup() {
    console.log("Page Startup called");

    //Mock data that will be replaced by the axios call to the PHP
    const items = [
        { image: 'images/goldFrame.jpg', title: 'Golden Frame', text: 'This Golden Frame', color: 'Gold', material: 'Gold' },
        { image: 'images/woodenFrame.jpg', title: 'Wooden Frame', text: 'This is a Wooden Frame', color: 'Brown', material: 'Wood' },
        { image: 'images/blackFrame.avif', title: 'Black Frame', text: 'This is a wooden Frame with black borders', color: 'Black', material: 'Wood' },
        { image: 'images/redFrame.jpg', title: 'Red Wood Frame', text: 'This is a Red Frame.', color: 'Red', material: 'Wood' },
        { image: 'images/woodenFrame.jpg', title: 'Wooden Frame', text: 'This is a Wooden Frame', color: 'Brown', material: 'Wood' },
        { image: 'images/blackFrame.avif', title: 'Black Frame', text: 'This is a wooden Frame with black borders.', color: 'Black', material: 'Wood' }
    ]

    this.currListOfItems = items;

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
                                                <button type="submit" id="buyButton${i}" name="buyButton${i}" onclick="setCurrItem(${i})">Add to cart</button>
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
                                                <button type="submit" id="buyButton${i}" name="buyButton${i}" onclick="setCurrItem(${i})">Add to cart</button>
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
                                                <button type="submit" id="buyButton${i}" name="buyButton${i}" onclick="setCurrItem(${i})">Add to cart</button>
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

function setCurrItem(index){
    this.currItem = this.currListOfItems[parseInt(index)];

    let html = routeToBuyItemPage(this.currItem);

    localStorage["html"] = html;
    localStorage["currItem"] = this.currItem;

    //Change this line to route
    window.location.href = "BuyItem.html";
}

function addItemToCart(){
    let item = localStorage["currItem"];

    //Add the operation to be able to add the item to the cart
}

function getBuyPageHTML(){
    let html = localStorage["html"];

    informationContainer = document.getElementById('itemInformation');
    informationContainer.innerHTML = html;
}

function getCurrItem(){
    return currItem;
}

function getMaterialTypes(){
    //Needs to be a call to the php
    let materialTypes = ['Gold', 'Wood', 'Aluminum', 'Polystyrene'];

    return materialTypes;
}


function getColors(){
    //Needs to be a call to the php
    let colors = ['Red','Gold Matte', 'Black', 'Blue'];

    return colors;
}

function routeToBuyItemPage(BuyItem){
    console.log(this.currItem);
    
    let item = BuyItem;
    let html = '';
    let defaultLength = 8;
    let defaultWidth = 11.5;
    let materialTypes = getMaterialTypes();
    let colors = getColors();

    html +=     `<div class="imageScale2">
                    <img src="${item.image}" class="card-img-top" alt="Product 2" height="350">
                </div>
                <div class="itemDesc">
                    <h3>Description</h3> <br>
                    <p>${item.text} </p>
                    <p>Default measurement: ${defaultLength}x${defaultWidth}</p>
                    <p>Default color: ${item.color}</p>
                    <p>Default material: ${item.material}</p>
                </div>
                <div class="itemBodyContainer">
                    <div class="itemBodyHeader">
                        <h2>Picture Frame</h2>
                        <br>
                    </div>
                    <label for="material">Material Type:</label>
                    <div class="itemInput">
                        <select name="material" id="color">`;

    for(let i = 0; i < materialTypes.length; i++){
        if(materialTypes[i] === item.material){
            html +=           `<option value="material${i}" selected>${materialTypes[i]}</option>`;
        }else{
            html +=           `<option value="material${i}">${materialTypes[i]}</option>`;
        }
    }

    html +=             `</select>
                    </div>
                    <div class="customItemInput">
                        Leave requested material here if preferred material isn't found:<br>
                        <input type="text" id="materialCustom" name="materialCustom">
                    </div>
                    <br>

                    <label for="size">Frame Size:</label>
                    <div class="itemInput">
                        <input type="number" id="height" name="width" value="${defaultLength}" min="1">
                            x
                        <input type="number" id="width" name="width" value="${defaultWidth}" min="1">
                    </div>
                    <br>
                    
                    <label for="color">Frame Color:</label>
                    <div class="itemInput">
                        <select name="color" id="color">`;

    for(let i = 0; i < colors.length; i++){
        if(colors[i] === item.color){
            html +=             `<option selected value="color${i}">${colors[i]}</option>`;
        }else{
            html +=             `<option value="color${i}">${colors[i]}</option>`;
        }
    }                

    html +=             `</select>
                    </div>
                    <div class="customItemInput">
                        Leave requested color here if preferred color isn't found:<br>
                        <input type="text" id="materialCustom" name="materialCustom">
                    </div>
                    <br>
    
                    <label for="customization">Customization (Leave any specific instructions here):</label>
                    <div class="itemInput">
                        <textarea name="custom" id="custom">Enter customization here...</textarea>
                    </div>
                    <br>   
    
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1">
                    <br><br>
                    <input type="submit" value="Add to Cart" onclick="addItemToCart()">
                    <br><br>
                    <div class="displayTotal">
                        <h3>Total:</h3>
                        <h4>$25.00</h4>
                    </div>
                </div>`;

    return html;
}
