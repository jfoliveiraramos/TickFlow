
const tagsList = document.getElementById("tag-creator");
const input = document.getElementById("tag-input");

let tags = [];

function remove(element, tag){
    console.log(tag);
}

function addListItem(){
    tagsList.querySelectorAll("li").forEach(li => li.remove()); 
    tags.forEach(tag =>{
        let li = `<li>${tag}<button type="button" onclick="remove(this, ${tag})"> remove </button></li>`;
        input.insertAdjacentHTML('beforebegin', li);
    })
}

function addTag(e){

    if (e.code == "Space"){
        console.log(e.target.value);
        let tag = e.target.value.replace(/\s+/g, ' ');
        tag.trim();

        if (tag.length > 1 && !tags.includes(tag)){
            tags.push(tag);
        }
        addListItem();
        e.target.value = "";
    } 
}

tagsList.addEventListener("keyup", addTag);
