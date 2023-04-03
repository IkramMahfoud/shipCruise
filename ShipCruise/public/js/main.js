function setPrice()
{
    var selectChambre = document.getElementById("chambre");
    var selected = selectChambre.options[selectChambre.selectedIndex];
    var price = selected.getAttribute('data-price');
    // console.log(selectRef);
    var priceInput = document.getElementById("price");
    priceInput.value = price;
}





document.getElementById("addport").addEventListener("click", () =>
{
    var htmlForm = `
    <div id="AllForms">
    <p class="fw-light  text-black text-center py-2">New Port</p>

    <div class="input-group mb-3">
      <input name="name[]" type="text" class="form-control" placeholder="nom du port" aria-describedby="basic-addon2" required>
      <span class="input-group-text" id="basic-addon2">Name</span>
    </div>

    <div class="input-group mb-3">
      <input name="place[]" type="text" class="form-control" placeholder="pays" aria-describedby="basic-addon2" required>
      <span class="input-group-text" id="basic-addon2">Pays</span>
    </div>


    <div>
        <input type="submit" class="btn btn-primary" style="width: 94px;height: 34px;font-size: 13px;" value="submit">
    </div>
    `

    var Form = document.createElement('div');
    Form.innerHTML = htmlForm;

    document.getElementById("AllForms").append(Form);
});





document.getElementById("addnavire").addEventListener("click", () =>
{
    var htmlForm = `
    <div id="AllForms">
    <p class="fw-light  text-black text-center py-2">New Navire</p>

    <div class="input-group mb-3">
      <input name="name[]" type="text" class="form-control" placeholder="nom du navire" aria-describedby="basic-addon2" required>
      <span class="input-group-text" id="basic-addon2">Name</span>
    </div>

    <div class="input-group mb-3">
      <input name="number[]" type="text" class="form-control" placeholder="room's number" aria-describedby="basic-addon2" required>
      <span class="input-group-text" id="basic-addon2">room</span>
    </div>

    <div class="input-group mb-3">
      <input name="place[]" type="text" class="form-control" placeholder="place's number" aria-describedby="basic-addon2" required>
      <span class="input-group-text" id="basic-addon2">places</span>
    </div>
    <div>
        <input type="submit" class="btn btn-primary" style="width: 94px;height: 34px;font-size: 13px;" value="submit">
    </div>
    `

    var Form = document.createElement('div');
    Form.innerHTML = htmlForm;

    document.getElementById("AllForms").append(Form);
});





document.getElementById("addcruise").addEventListener("click", () =>
{
    image

    var htmlForm = `
    <div id="AllForms">
    <p class="fw-light  text-black text-center py-2">New Cruise</p>

    <div class="input-group mb-3">
      <input name="nombr_nuit[]" type="text" class="form-control" placeholder="nights number" aria-describedby="basic-addon2" required>
      <span class="input-group-text" id="basic-addon2">nights</span>
    </div>

    <div class="input-group mb-3">
      <input name="type_chambre[]" type="text" class="form-control" placeholder="room's type" aria-describedby="basic-addon2" required>
      <span class="input-group-text" id="basic-addon2">Navire</span>
    </div>

    <div class="input-group mb-3">
      <input name="depart_port[]" type="text" class="form-control" placeholder="first station" aria-describedby="basic-addon2" required>
      <span class="input-group-text" id="basic-addon2">port du depart</span>
    </div>

    <div class="input-group mb-3">
      <input name="iténairair_croisr[]" type="text" class="form-control" placeholder="second station" aria-describedby="basic-addon2" required>
      <span class="input-group-text" id="basic-addon2">deusiem port</span>
    </div>

    <div class="input-group mb-3">
      <input name="port_arrive[]" type="text" class="form-control" placeholder="last station" aria-describedby="basic-addon2" required>
      <span class="input-group-text" id="basic-addon2">port d'arrive</span>
    </div>

    <div class="input-group mb-3">
      <input name="date_depart[]" type="text" class="form-control" placeholder="date_depart" aria-describedby="basic-addon2" required>
      <span class="input-group-text" id="basic-addon2">date_depart</span>
    </div>

    <div class="input-group mb-3">
      <input name="description_croisire[]" type="text" class="form-control" placeholder="description" aria-describedby="basic-addon2" required>
      <span class="input-group-text" id="basic-addon2">description</span>
    </div>


    <div>
        <input type="submit" class="btn btn-primary" style="width: 94px;height: 34px;font-size: 13px;" value="submit">
    </div>
    `

    var Form = document.createElement('div');
    Form.innerHTML = htmlForm;

    document.getElementById("AllForms").append(Form);
});
