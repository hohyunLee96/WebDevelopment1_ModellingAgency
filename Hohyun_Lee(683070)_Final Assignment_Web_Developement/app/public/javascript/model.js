function deleteModel(id) {
    var data = {
        id: id,
        type: document.getElementById("ModelType").innerText
    }
    fetch('http://localhost/api/deletemodel', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(data)
    }).then(response => response.json())
        .then(models => {
            document.getElementById("modelCard").innerHTML = "";
            models.forEach(model => {
                console.log(model);
                loadModelCard(model);
            })
        })
}

function confirmBooking(id) {
    var data = {
        id: id,
    }
    fetch('http://localhost/api/confirmbooking', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(data)
    }).then(response => response.json())
        .then(booking => {
            document.getElementById("modelTable").innerHTML = "";
            booking.forEach(bookings => {
                console.log(bookings);
                loadBookingTable(bookings);
            })
        })
}

function deleteBooking(id) {
    var data = {
        id: id,
    }
    fetch('http://localhost/api/deletebooking', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(data)
    }).then(response => response.json())
        .then(booking => {
            document.getElementById("modelTable").innerHTML = "";
            booking.forEach(bookings => {
                loadBookingTable(bookings);
            })
        }).catch(error => console.log(error));
}

function deleteUser(id) {
    var data = {
        id: id
    }
    fetch('http://localhost/api/deleteuser', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(data)
    }).then(response => response.json())
        .then(users => {
            document.getElementById("userCard").innerHTML = "";
            users.forEach(user => {
                console.log(user);
                loadUserCard(user);
            })
        })
}

function loadUserCard(users) {
    // create the main container
    const cardContainer = document.createElement("div");
    cardContainer.classList.add("col-xs-12", "col-sm-6", "col-md-4", "col-lg-3");

// create the card
    const card = document.createElement("div");
    card.classList.add("card");

// create the card body
    const cardBody = document.createElement("div");
    cardBody.classList.add("card-body");
    cardBody.style.height = "16rem";

// create the image
    const image = document.createElement("img");
    image.src = users.image;
    image.height = 160;
    image.width = 170;
    image.alt = "pictures of users";

// append the image to the card body
    cardBody.appendChild(image);

// create the name element
    const name = document.createElement("p");
    name.textContent = "Name: " + users.name;

    const types = document.createElement("p");
    types.innerText = "User Types: ";
    const smallTypes = document.createElement("small");
    smallTypes.innerText = users.types;
    types.appendChild(smallTypes);


// append the name to the card body
    cardBody.appendChild(name);
    cardBody.appendChild(types);

// append the card body to the card
    card.appendChild(cardBody);

// create the card footer
    const cardFooter = document.createElement("div");
    cardFooter.classList.add("card-footer", "bg-light");

// create the button container
    const buttonContainer = document.createElement("div");
    buttonContainer.classList.add("d-flex", "justify-content-between");

// create the form
    const form = document.createElement("form");
    form.action = '/home/model/editing';
    form.method = "POST";
    form.id = "editUserBtn";

    // append the form to the button container
    buttonContainer.appendChild(form);

// create the input field
    const input = document.createElement("input");
    input.type = "hidden";
    input.name = "id";
    input.value = users.id;

// append the input field to the form
    form.appendChild(input);

// create the edit button
    const editButton = document.createElement("button");
    editButton.type = "submit";
    editButton.name = "editUser";
    editButton.textContent = "Edit";
    editButton.classList.add("btn", "btn-secondary");

// append the edit button to the form
    form.appendChild(editButton);


// create the delete button
    const deleteButton = document.createElement("button");
    deleteButton.name = "deleteUserBtn";
    deleteButton.textContent = "Delete";
    deleteButton.classList.add("btn", "btn-secondary", "ml-auto");
    deleteButton.onclick = function () {
        deleteUser(users.id);
    };
    // append the delete button to the button container
    buttonContainer.appendChild(deleteButton);

// create the hidden delete input
    const deleteInput = document.createElement("input");
    deleteInput.type = "hidden";
    deleteInput.name = "id";
    deleteInput.value = users.id;

// append the hidden delete input to the delete button
    deleteButton.appendChild(deleteInput);

// append the delete button to the card footer
    cardFooter.appendChild(buttonContainer);

// append the card footer to the card
    card.appendChild(cardFooter);

// append the card to the container
    cardContainer.appendChild(card);

// append the container to the document
    document.getElementById("userCard").appendChild(cardContainer);
}


function loadModelCard(model) {
    const col = document.createElement("div");
    col.classList.add("col-xs-12", "col-sm-6", "col-md-4", "col-lg-3");
    const card = document.createElement("div");
    card.classList.add("card");

    const cardBody = document.createElement("div");
    cardBody.classList.add("card-body");
    cardBody.style.height = "16rem";

    const img = document.createElement("img");
    img.src = model.image;
    img.classList.add("img-fluid", "rounded-start");
    img.height = 60;
    img.width = 140;
    img.alt = "pictures of model";

    const nameP = document.createElement("p");
    nameP.innerText = "Name: " + model.name;

    const ageP = document.createElement("p");
    ageP.innerText = "Age: ";
    const smallAge = document.createElement("small");
    smallAge.innerText = model.age;
    ageP.appendChild(smallAge);

    const birthdateP = document.createElement("p");
    birthdateP.innerText = "BirthDate: ";
    const smallBirthdate = document.createElement("small");
    smallBirthdate.innerText = model.birthDate;

    birthdateP.appendChild(smallBirthdate);

    cardBody.appendChild(img);
    cardBody.appendChild(nameP);
    cardBody.appendChild(ageP);
    cardBody.appendChild(birthdateP);

    const cardFooter = document.createElement("div");
    cardFooter.classList.add("card-footer", "bg-light");

    const floatStartSpan = document.createElement("span");
    floatStartSpan.classList.add("float-start");

    const bookingForm = document.createElement("form");
    bookingForm.action = '/home/model/booking';
    bookingForm.method = "POST";

    const hiddenIdInput = document.createElement("input");
    hiddenIdInput.type = "hidden";
    hiddenIdInput.name = "id";
    hiddenIdInput.value = model.id;

    const bookBtn = document.createElement("button");
    bookBtn.type = "submit";
    bookBtn.name = "bookBtn";
    bookBtn.classList.add("btn", "btn-primary");
    bookingForm.appendChild(hiddenIdInput);
    // bookingForm.appendChild(bookBtn);
    floatStartSpan.appendChild(bookingForm);

    const floatStartSpan2 = document.createElement("span");
    floatStartSpan2.classList.add("float-start");

    const editingForm = document.createElement("form");
    editingForm.action = '/home/model/editing';
    editingForm.method = "POST";
    editingForm.id = "editBtn";

    const hiddenIdInput2 = document.createElement("input");
    hiddenIdInput2.type = "hidden";
    hiddenIdInput2.name = "id";
    hiddenIdInput2.value = model.id;

    const editModelById = document.createElement("input");
    editModelById.type = "hidden";
    editModelById.name = "id";
    editModelById.id = "editModelById";
    editModelById.value = model.id;

    const editBtn = document.createElement("button");
    editBtn.type = "submit";
    editBtn.name = "edit";
    editBtn.classList.add("btn", "btn-secondary");
    editBtn.innerText = "Edit";
    editBtn.onclick = function () {
        editModel(model.id, model.name);
    };


    editingForm.appendChild(hiddenIdInput2);
    editingForm.appendChild(editBtn);
    floatStartSpan2.appendChild(editingForm);

    const floatEndSpan = document.createElement("span");
    floatEndSpan.classList.add("float-end");

    const deleteModelById = document.createElement("input");
    deleteModelById.type = "hidden";
    deleteModelById.name = "id";
    deleteModelById.id = "deleteModelById";
    deleteModelById.value = model.id;

    const deleteBtn = document.createElement("button");
    deleteBtn.name = "deleteBtn";
    deleteBtn.classList.add("btn", "btn-secondary");
    deleteBtn.innerText = "Delete";
    deleteBtn.onclick = function () {
        deleteModel(model.id);
    };

    floatEndSpan.appendChild(deleteModelById);
    floatEndSpan.appendChild(deleteBtn);

    cardFooter.appendChild(floatStartSpan);
    cardFooter.appendChild(floatStartSpan2);
    cardFooter.appendChild(floatEndSpan);

    card.appendChild(cardBody);
    card.appendChild(cardFooter);
    col.appendChild(card);

    document.getElementById("modelCard").appendChild(col);
}

function loadBookingTable(booking) {
    // console.log(booking);
    let table = document.createElement("table");
    let thead = document.createElement("thead");
    let trHead = document.createElement("tr");
    let th1 = document.createElement("th");
    let th2 = document.createElement("th");
    let th3 = document.createElement("th");
    let th4 = document.createElement("th");
    let th5 = document.createElement("th");
    let th6 = document.createElement("th");
    th1.innerHTML = "Model Name";
    th2.innerHTML = "Client Name";
    th3.innerHTML = "Booking Status";
    th4.innerHTML = "Date";
    th5.innerHTML = "Confirm";
    th6.innerHTML = "Delete";
    trHead.appendChild(th1);
    trHead.appendChild(th2);
    trHead.appendChild(th3);
    trHead.appendChild(th4);
    trHead.appendChild(th5);
    trHead.appendChild(th6);
    thead.appendChild(trHead);
    table.appendChild(thead);


    let tr = document.createElement("tr");
    let td1 = document.createElement("td");
    let td2 = document.createElement("td");
    let td3 = document.createElement("td");
    let td4 = document.createElement("td");
    let td5 = document.createElement("td");
    let td6 = document.createElement("td");
    let btnConfirm = document.createElement("button");
    let btnDelete = document.createElement("button");

    btnConfirm.innerHTML = "Confirm";
    btnConfirm.className = "button1";
    btnConfirm.name = "confirmBooking";
    btnDelete.innerHTML = "Delete";
    btnDelete.className = "button2";
    btnDelete.name = "deleteBooking";
    td5.appendChild(btnConfirm);
    td6.appendChild(btnDelete);
    td1.innerHTML = booking.model_name;
    td2.innerHTML = booking.client_name;
    td3.innerHTML = booking.booking_status;
    td4.innerHTML = booking.booking_date;
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);
    tr.appendChild(td6);
    table.appendChild(tr);
    btnDelete.onclick = function () {
        deleteBooking(booking.booking_id);
    };
    document.getElementById("modelTable").appendChild(table);
}
