let currItem = {};
let currListOfItems = [];
let currOrder = {material: "Gold", requestedMaterial: "", length: 11, width: 8.5, color: "", requestedColor: "", customization: "", quantity: 1}

/***********************/
/***Mapping Functions***/
/***********************/

//Function that is run whenever the page is first opened
function HomeFrontPageStartUp() {

    let items = getAllItems();

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
                                                <button type="submit" id="buyButton${i}" name="buyButton${i}" onclick="routeToBuyItemPage(${i})">Add to cart</button>
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
                                                <button type="submit" id="buyButton${i}" name="buyButton${i}" onclick="routeToBuyItemPage(${i})">Add to cart</button>
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
                                                <button type="submit" id="buyButton${i}" name="buyButton${i}" onclick="routeToBuyItemPage(${i})">Add to cart</button>
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

//Function is called whenever you push to add to cart
//At the end of the operations it will route you to the buyItem Page
function routeToBuyItemPage(index){

    this.currItem = this.currListOfItems[parseInt(index)];
    
    let item = this.currItem;
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
                        <select name="material" id="material" onchange="changeMaterial(this.value)">`;

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
                        <input type="text" id="materialCustom" name="materialCustom" onKeyDown="changeRequestedMaterial(this.value)">
                    </div>
                    <br>

                    <label for="size">Frame Size:</label>
                    <div class="itemInput">
                        <input type="number" id="height" name="length" onKeyDown="changeLength(this.value)" onchange="changeLength(this.value);" value="${defaultLength}" min="1">
                            x
                        <input type="number" id="width" name="width" onKeyDown="changeWidth(this.value)" onchange="changeWidth(this.value);" value="${defaultWidth}" min="1">
                    </div>
                    <br>
                    
                    <label for="color">Frame Color:</label>
                    <div class="itemInput">
                        <select name="color" id="color" onchange="changeColor(this.value)">`;

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
                        <input type="text" id="colorCustom" name="colorCustom" onKeyDown="changeRequestedColor(this.value)">
                    </div>
                    <br>
    
                    <label for="customization">Customization (Leave any specific instructions here):</label>
                    <div class="itemInput">
                        <textarea name="custom" id="custom" onKeyDown="changeCustomization(this.value)">Enter customization here...</textarea>
                    </div>
                    <br>   
    
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" value="1"  onKeyDown="changeQuantity(this.value)" onchange="changeQuantity(this.value);">
                    <br><br>
                    <input type="submit" value="Add to Cart" onclick="addItemToCart()">
                    <br><br>
                    <div class="displayTotal">
                        <h3>Total:</h3>
                        <h4 id="totalPrice"></h4>
                    </div>
                </div>`;

    localStorage["html"] = html;
    localStorage["currItem"] = this.currItem;

    window.location.href = "BuyItem.html";

}

//Function is called to insert the html into the div with the class of itemIndormation on the buy item page
function getBuyPageHTML(){
    let html = localStorage["html"]

    itemContainer = document.getElementById('itemInformation');
    itemContainer.innerHTML = html;
}

function routeToCheckOut(){
    window.location.href = "checkout.php";
}

/****************************/
/***Data Mutator Functions***/
/****************************/

//This function is called whenevr you push the add to cart button on the buy item page
function addItemToCart(){
    calculateTotal();

    let item = currItem;

    //Add the operation to be able to add the item to the cart
}

/*****************************/
/***Data Accessor Functions***/
/*****************************/

//This function will be called to retrieve all of the material types
function getMaterialTypes(){
    //Needs to be a call to the php
    let materialTypes = ['Gold', 'Wood', 'Aluminum', 'Polystyrene'];

    return materialTypes;
}

//This function will be called to retrieve all of the colors
function getColors(){
    //Needs to be a call to the php
    let colors = ['Red','Gold Matte', 'Black', 'Blue'];

    return colors;
}

async function getAllItems(){
    try {
        const response = await fetch('api.php?action=getAllItems');
        if (response.ok) {
            const data = await response.json();
            // Display the data in the 'output' div
            let items = JSON.stringify(data, null, 2);
        } else {
            console.error('Failed to fetch data from the API.');
        }

        return items;
    } catch (error) {
        console.error('An error occurred:', error);
    }
}

/*********************/
/***Event Functions***/
/*********************/

function changeWidth(width){
    currOrder.width = parseInt(width);

    calculateTotal();
}

function changeLength(length){
    currOrder.length = parseInt(length);

    calculateTotal();
}

function changeMaterial(material){
    currOrder.material = material;

    calculateTotal();
}

function changeRequestedMaterial(material){
    currOrder.requestedMaterial = material;

    calculateTotal();
}

function changeColor(color){
    currOrder.color = color;

    calculateTotal();
}

function changeRequestedColor(color){
    currOrder.customColor = color;

    calculateTotal();
}

function changeCustomization(customization){
    currOrder.customization = customization;

    calculateTotal();
}

function changeQuantity(quantity){
    currOrder.quantity = quantity;

    calculateTotal();
}

/***************************/
/***Calculation Functions***/
/***************************/

function calculateTotal(){
    let perimeter = currOrder.length * 2 + currOrder.width * 2;

    let costPerInch = 0.60;

    let total = (perimeter * costPerInch * currOrder.quantity).toFixed(2);

    priceContainer = document.getElementById('totalPrice');
    priceContainer.innerHTML = "$" + total;
}
