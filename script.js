var countOfFields = 0;
var curFieldNameId = 0;
var maxFieldLimit = 10;
function deleteField(a) {
  var contDiv = a.parentNode;
  contDiv.parentNode.removeChild(contDiv);
  countOfFields--;
  return false;
}
function addField() {
  if (countOfFields >= maxFieldLimit) {
    alert("Число полей достигло своего максимума = " + maxFieldLimit);
    return false;
  }
  countOfFields++;
  curFieldNameId++;
  console.log(curFieldNameId);
  var div = document.createElement("div");
  div.classList.add("subtasks_list");
  div.innerHTML = `<input class="input" name="subtitle_${countOfFields}" type="text" placeholder="Название подзадачи"/> <input class="input_hours" type="number" value="1" name="hours_${countOfFields}" /> <a onclick="return deleteField(this)" class="remove_button" href="#">Remove</a>`;
  document.getElementById("subtasks").appendChild(div);
  return false;
}
