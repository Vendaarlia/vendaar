export function renderComponents(){

const headings = document.querySelectorAll("#project-body h3")

headings.forEach(h=>{

const title = h.textContent.toLowerCase()

if(title.includes("btn-primer")){

const preview = document.createElement("div")

preview.className = "component-preview"

preview.innerHTML = `

<button class="btn-lg">button lg</button>
<button class="btn-md">button md</button>
<button class="btn-sm">button sm</button>

`

h.after(preview)

}

})

}