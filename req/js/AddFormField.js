var DefaultName = "zutat[]";
var DefaultNameIncrementNumber = 0;

function AddFormField(id, type, name, value, tag) {
    if (!document.getElementById && document.createElement) {
        return;
    }
    var inhere = document.getElementById(id);
    var formfield = document.createElement("input");
    var br = document.createElement("br");
    if (name.length < 1) {
        DefaultNameIncrementNumber++;
        name = String(DefaultName);
    }
    formfield.name = name;
    formfield.type = type;
    formfield.value = value;
    if (tag.length > 0) {
        var thetag = document.createElement(tag);
        thetag.appendChild(formfield);
        inhere.appendChild(thetag);
        inhere.appendChild(br);
    } else {
        inhere.appendChild(formfield);
    }
} // function AddFormField()