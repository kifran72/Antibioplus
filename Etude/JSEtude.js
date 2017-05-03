function addmol(elmt, value)
{
    var tr = document.createElement('tr');
    elmt.appendChild(tr);
     
    var td = document.createElement('td');
    tr.appendChild(td);
    var tdText = document.createTextNode(value);
    td.appendChild(tdText);
    
    
    var input = document.createElement("input");
    input.setAttribute("type", "hidden");
    input.setAttribute("name", "mol[]");
    input.setAttribute("value", value);
    document.getElementById("kanard").appendChild(input);
}
function addbac(elmt, value)
{
    var tr = document.createElement('tr');
    elmt.appendChild(tr);
     
    var td = document.createElement('td');
    tr.appendChild(td);
    var tdText = document.createTextNode(value);
    td.appendChild(tdText);
    var input = document.createElement("input");
    input.setAttribute("type", "hidden");
    input.setAttribute("name", "bac[]");
    input.setAttribute("value", value);
    document.getElementById("kanard").appendChild(input);
}
function addant(elmt, valueant, valueeq)
{
    var tr = document.createElement('tr');
    elmt.appendChild(tr);
     
    var td = document.createElement('td');
    tr.appendChild(td);
    var tdText = document.createTextNode(valueant);
    td.appendChild(tdText);
     
    var td2 = document.createElement('td');
    tr.appendChild(td2);
    var tdText2 = document.createTextNode(valueeq);
    td2.appendChild(tdText2);
    
    var input = document.createElement("input");
    input.setAttribute("type", "hidden");
    input.setAttribute("name", "ant[]");
    input.setAttribute("value", valueant);
    document.getElementById("kanard").appendChild(input);
    
    
    var input2 = document.createElement("input");
    input2.setAttribute("type", "hidden");
    input2.setAttribute("name", "ant[]");
    input2.setAttribute("value", valueeq);
    document.getElementById("kanard").appendChild(input2);
}